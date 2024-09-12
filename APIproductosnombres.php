<?php
include('conexion.php');

$subcategoria = $_GET['subcategoria'];

$sqlClientesRegistrados = "SELECT * FROM productos WHERE subcategoria = '$subcategoria'";
$resultClientesRegistrados = $conexion->query($sqlClientesRegistrados);

if ($resultClientesRegistrados->num_rows > 0) {
    // Salida de datos de cada fila
    while ($row = $resultClientesRegistrados->fetch_assoc()) {
        echo "<option value='".$row['nombre']."' data-precio='".$row['precioU']."'>".$row['nombre']."</option>";
    }
} else {
    echo "No hay productos con estas caracteristicas";
}

$conexion->close();
