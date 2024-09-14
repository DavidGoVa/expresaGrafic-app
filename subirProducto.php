<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('conexion.php');

    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $precio = $conexion->real_escape_string($_POST['precio']);
    $categoria = $conexion->real_escape_string($_POST['categoria']);
    $subcategoria = $conexion->real_escape_string($_POST['subcategoria']);
    

    $sqlCrearProd = "INSERT INTO productos (nombre, precioU, categoria, subcategoria) VALUES ('$nombre', '$precio', '$categoria', '$subcategoria')";
    if($conexion->query($sqlCrearProd)=== TRUE){
        echo "si se hizo";
        exit();
    }else{
        echo "<script>alert('Error en el sistema, intenta más tarde');</script>";
    }
}
