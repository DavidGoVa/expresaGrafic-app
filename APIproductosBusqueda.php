<?php
include('conexion.php');

$busqueda = $_GET['nombreBusqueda'];

$sqlProductosBuscados = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%'";
$resultPbusqueda = $conexion->query($sqlProductosBuscados);

if ($resultPbusqueda->num_rows > 0) {
    // Salida de datos de cada fila
    while ($row = $resultPbusqueda->fetch_assoc()) {
        echo "<option value='".$row['nombre']."' data-precio='".$row['precioU']."'>".$row['nombre']."</option>";
    }
} else {
    echo "No hay productos con estas caracteristicas";
}

$conexion->close();
