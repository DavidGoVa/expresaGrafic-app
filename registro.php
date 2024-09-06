<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include ("conexion.php");

    $nombre = (isset($_POST['nombre'])) ? ucwords(strtolower(trim($_POST['nombre']))) : null;
    $paterno = (isset($_POST['ap_paterno'])) ? ucwords(strtolower(trim($_POST['ap_paterno']))) : null;
    $materno = (isset($_POST['ap_materno'])) ? ucwords(strtolower(trim($_POST['ap_materno']))) : null;
    $email = (isset($_POST['email'])) ? trim($_POST['email']) : null;
    $areaT = (isset($_POST['areaT'])) ? $_POST['areaT'] : null;
    $global_id = (isset($_POST['global_id'])) ? trim($_POST['global_id']) : null;
    $password = (isset($_POST['password'])) ? $_POST['password'] : null;
    $confirmarpassword = (isset($_POST['confirmarpassword'])) ? $_POST['confirmarpassword'] : null;


    if ($areaT != null) {

        if ($password == $confirmarpassword) {
            $nuevopass = password_hash($password, PASSWORD_DEFAULT);
            try {

                $pdo = new PDO('mysql:host=' . $hostBD . ';dbname=' . $base_de_datos, $usuarioBD, $contrasenaBD);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO `usuarios` (`nombre`, `ap_paterno`, `ap_materno`, `global_id`, `password`, `areaT`, `correo`)
            VALUES (:nombre, :ap_paterno, :ap_materno, :global_id, :password, :areaT, :correo);";

                $resultado = $pdo->prepare($sql);
                $resultado->execute(
                    array(
                        ':nombre' => $nombre,
                        ':ap_paterno' => $paterno,
                        ':ap_materno' => $materno,
                        ':global_id' => $global_id,
                        ':password' => $nuevopass,
                        ':areaT' => $areaT,
                        ':correo' => $email
                    )
                );
                
                header("Location:login.html");

            } catch (PDOException $e) {
                echo "Hubo un error de conexion" . $e->getMessage();
            }
        } else {
            header("location: register.html");
        }
    } else {
        echo "selecciona un area";
    }


}