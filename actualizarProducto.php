<?php
include('conexion.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // Obtener los datos del formulario
    $id = $_POST['id_prod'];
    $nombre = $_POST['nombreActualizado'];
    $precio = $_POST['precioActualizado'];
    $categoria = $_POST['categoriaActualizado'];
    $subcategoria = $_POST['subcategoriaActualizado'];
    
    $sqlUpdateProd = "UPDATE productos SET nombre = '$nombre', precioU = '$precio', categoria = '$categoria', subcategoria = '$subcategoria' WHERE id_producto = '$id'";}

    // Ejecutar la consulta
    if($conexion->query($sqlUpdateProd) === TRUE){
        header('location:registrarProductos.php');
    }else{
        http_response_code(500); // Código de error para AJAX
        echo "error";
    }
    


