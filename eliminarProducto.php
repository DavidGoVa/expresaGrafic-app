<?php
include('conexion.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // Obtener los datos del formulario
    $id_prod = $_POST['id_prod'];
    $sqlDelDets = "DELETE FROM productos WHERE id_producto = '$id_prod'";

    if($conexion->query($sqlDelDets) === TRUE){
        echo "se hizo";
        //header('location:registrarProductos.php');
    }else{
        http_response_code(500); // Código de error para AJAX
        echo "error";
    }
    

}

