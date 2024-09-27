<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('conexion.php');

    // Verificar si las claves existen antes de intentar acceder a ellas
    $nombre = $conexion->real_escape_string($_POST['nombre'] ?? '');
    $precio = $conexion->real_escape_string($_POST['precio'] ?? '');
    $categoria = isset($_POST['categoriaSelect']) ? $conexion->real_escape_string($_POST['categoriaSelect']) : null;
    $subcategoria = isset($_POST['subcategoriaSelect']) ? $conexion->real_escape_string($_POST['subcategoriaSelect']) : null;
    $categoriaLibre = $conexion->real_escape_string($_POST['categoria'] ?? '');
    $subcategoriaLibre = $conexion->real_escape_string($_POST['subcategoria'] ?? '');

    // Condicionales para asignar correctamente las categorías y subcategorías
    if (!empty($categoriaLibre)) {
        if (!empty($subcategoriaLibre)) {
            $sqlCrearProd = "INSERT INTO productos (nombre, precioU, categoria, subcategoria) VALUES ('$nombre', '$precio', '$categoriaLibre', '$subcategoriaLibre')";
        } else {
            $sqlCrearProd = "INSERT INTO productos (nombre, precioU, categoria, subcategoria) VALUES ('$nombre', '$precio', '$categoriaLibre', '$subcategoria')";
        }
    } else {
        if (!empty($subcategoriaLibre)) {
            $sqlCrearProd = "INSERT INTO productos (nombre, precioU, categoria, subcategoria) VALUES ('$nombre', '$precio', '$categoria', '$subcategoriaLibre')";
        } else {
            $sqlCrearProd = "INSERT INTO productos (nombre, precioU, categoria, subcategoria) VALUES ('$nombre', '$precio', '$categoria', '$subcategoria')";
        }
    }

    // Ejecutar la consulta
    if ($conexion->query($sqlCrearProd) === TRUE) {
        header("location: registrarProductos.php");
        exit();
    } else {
        echo "<script>alert('Error en el sistema, intenta más tarde');</script>";
    }
}
