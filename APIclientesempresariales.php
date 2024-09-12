<?php
include('conexion.php');


$sqlClientesRegistrados = "SELECT * FROM clientes WHERE tipo_cliente = 'empresa'";
$resultClientesRegistrados = $conexion->query($sqlClientesRegistrados);

if ($resultClientesRegistrados->num_rows > 0) {
    // Salida de datos de cada fila
    while ($row = $resultClientesRegistrados->fetch_assoc()) {
        echo "<option value='".$row['nombre']."' data-domicilio='".$row['domicilio']."' data-telefono='".$row['numero_telefonico']."' data-mail='".$row['mail']."' data-rfc='".$row['rfc']."' data-regimen='".$row['regimen_fiscal']."' >".$row['nombre']."</option>";
    }
} else {
    echo "No hay productos con estas caracteristicas";
}

$conexion->close();
