<?php
include('conexion.php');


$sqlClientesRegistrados = "SELECT DISTINCT categoria FROM productos";
$resultClientesRegistrados = $conexion->query($sqlClientesRegistrados);

if ($resultClientesRegistrados->num_rows > 0) {
    // Salida de datos de cada fila
    while ($row = $resultClientesRegistrados->fetch_assoc()) {
        echo "<option value='".$row['categoria']."'>".$row['categoria']."</option>";
    }
} else {
    echo "No hay productos con estas caracteristicas";
}

$conexion->close();
