<?php
include('conexion.php');


$sqlClientesRegistrados = "SELECT * FROM clientes WHERE tipo_cliente = 'normal'";
$resultClientesRegistrados = $conexion->query($sqlClientesRegistrados);

if ($resultClientesRegistrados->num_rows > 0) {
    // Salida de datos de cada fila
    while ($row = $resultClientesRegistrados->fetch_assoc()) {
        echo "<option value='".$row['nombre']."'>".$row['nombre']."</option>";
    }
} else {
    echo "No hay productos con estas caracteristicas";
}

$conexion->close();
