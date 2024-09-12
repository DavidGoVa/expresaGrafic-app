<?php
include('conexion.php');

$categoria = $_GET['categoria'];

$sqlClientesRegistrados = "SELECT DISTINCT subcategoria FROM productos WHERE categoria = '$categoria'";
$resultClientesRegistrados = $conexion->query($sqlClientesRegistrados);

if ($resultClientesRegistrados->num_rows > 0) {
    // Salida de datos de cada fila
    while ($row = $resultClientesRegistrados->fetch_assoc()) {
        echo "<option value='".$row['subcategoria']."'>".$row['subcategoria']."</option>";
    }
} else {
    echo "No hay productos con estas caracteristicas";
}

$conexion->close();
