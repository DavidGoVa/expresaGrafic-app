<?php

session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    include ("conexion.php");

    

    $glID = (isset($_POST['glID'])) ? htmlspecialchars($_POST['glID']) : null;
    $pw = (isset($_POST['pw'])) ? $_POST['pw'] : "notrae ";
    

    try{

        $pdo = new PDO('mysql:host=' . $hostBD . ';dbname=' . $base_de_datos, $usuarioBD, $contrasenaBD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM usuarios WHERE global_id = :glID";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(['glID' => $glID]);

        $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);
        //print_r($usuarios);

        $login = false;

        if(isset($usuario)){
           
           if(password_verify($pw, $usuario['password'])){
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                $_SESSION['usuario_paterno'] = $usuario['ap_paterno'];
                $_SESSION['usuario_materno'] = $usuario['ap_materno'];
                $_SESSION['usuario_globalID'] = $usuario['global_id'];
                $_SESSION['usuario_rol'] = $usuario['rol'];
                $_SESSION['usuario_area'] = $usuario['areaT'];
                $_SESSION['estado']=$usuario['estado'];
                $glidcone = $_SESSION['usuario_globalID'];
                $login = true;
                if($login == true){
                  date_default_timezone_set('America/Mexico_City');
                  $ultimacon = date('Y-M-D G:i:s');
                   $actualizarUs = $conexion->prepare("UPDATE usuarios SET estado='Conectado' WHERE global_id = ?");
                   $actualizarUs->bind_param("s", $glidcone);
                    $actualizarUs->execute();
                   
                   if($_SESSION['usuario_rol']==1){
                    header("location:index.php");
                   }else if($_SESSION['usuario_rol']==2){
                    header("location:indexUsuario.php");
                   }else{
                    echo "algo anda mal";
                   }
                   
                }
                
            }else{
                echo "Contraseña equivocada";
            }
        }else{
            echo "no esta lleno";
        }
            
        

    }catch(PDOException $ex){
        echo "Error: " . $ex->getMessage();
    }
}
