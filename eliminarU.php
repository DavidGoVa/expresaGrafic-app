<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include ("conexion.php");

    $idel = isset($_POST['idel']) ? trim($_POST['idel']) : "noc";
    
    try {
        
        $eli = $conexion->prepare("DELETE FROM usuarios WHERE global_id = ?");
        $eli->bind_param("s", $idel);
       $eli->execute();
        header("location:privilegiosUsers.php");
    }catch(PDOException $e) {
        echo  $e->getMessage();
}
}
