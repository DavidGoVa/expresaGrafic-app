<?php 

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    include('conexion.php');
    try{
        $glidcone = $_SESSION['usuario_globalID'];
    $actualizarSa = $conexion->prepare("UPDATE usuarios SET estado='Desconectado' WHERE global_id = ?");
                   $actualizarSa->bind_param("s", $glidcone);
                    $actualizarSa->execute();
                    session_destroy();
                    header("location:login.html");
                    exit();       
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
                   
    