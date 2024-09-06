<?php

$base_de_datos = "adt_p1_jgome329";
$usuarioBD = "root";
$contrasenaBD = "";
$hostBD = "localhost";

$conexion = new mysqli($hostBD, $usuarioBD, $contrasenaBD, $base_de_datos);
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}