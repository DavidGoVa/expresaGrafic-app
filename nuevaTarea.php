<?php
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['tituloTarea'];
    $desc = $_POST['descripcionTarea'];
    $prioridad = $_POST['prioridad'];

    // Asignar valor numérico a la prioridad
    if($prioridad == "alta"){
        $pr = 1;
    } else if($prioridad == "media"){
        $pr = 2;
    } else if($prioridad == "baja"){
        $pr = 3;
    }

    // Insertar los datos en la base de datos con el valor numérico de la prioridad
    $sql = "INSERT INTO tareas (titulo, descripcion, prioridad) VALUES ('$titulo', '$desc', '$pr')";

    if ($conexion->query($sql) === TRUE) {
        echo "success"; // Respuesta para AJAX
    } else {
        http_response_code(500); // Código de error para AJAX
        echo "error";
    }

    $conexion->close();
}
?>
