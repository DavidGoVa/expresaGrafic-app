<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include ("conexion.php");

    
    try {
        if ($checado == "off") {
            $nP = 2;
        }else if($checado == "on") {
            $nP = 1;
        }
        $modi = $conexion->prepare("UPDATE usuarios SET rol=? WHERE global_id = ?");
        $modi->bind_param("ss", $nP, $usr);
       $modi->execute();
        header("location:privilegiosUsers.php");
    }catch(PDOException $e) {
        echo  $e->getMessage();
}
}
