<?php
include('conexion.php');

// Ejecutar la consulta
$tarea = $conexion->query("SELECT * FROM tareas ORDER BY prioridad");

if ($tarea->num_rows > 0) {
    // Salida de datos de cada fila
    while ($row = $tarea->fetch_assoc()) {
        if($row['prioridad'] == 1){
            $color = "danger";
        }else if($row['prioridad'] == 2){
            $color = "warning";
        }else{
            $color = "primary";
        }
        echo "<div class='col-xl-12 col-md-6 mb-1'>
        <div class='card border-left-".$color." shadow h-100 py-2'>
            <div class='card-body'>
                <div class='row no-gutters align-items-center'>
                    <div class='col mr-2'>
                        <div class='text-xs font-weight-bold text-primary text-uppercase mb-1'>".$row['titulo']."</div>
                        <div class='d-flex justify-content-between align-items-center'>
                            <div class='h5 mb-0 font-weight-bold text-gray-800'>".$row['descripcion']."</div><form action='workDone.php' method='post'>
                            <button type='submit' class='btn btn-success btn-sm'>✔</button></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>";

    }
} else {
    echo "0 resultados";
}

$conexion->close();
?>
