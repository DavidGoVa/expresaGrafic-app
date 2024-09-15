<?php
include('conexion.php');

$busqueda = $_GET['busqueda'];

$sqlEP = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%'";
$resultEP = $conexion->query($sqlEP);

if ($resultEP->num_rows > 0) {
    // Salida de datos de cada fila
    while ($row = $resultEP->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        echo "<form action='actualizarProducto.php' method='post'><input type='text' name='nombreActualizado' value='".$row['nombre']."'>";
        echo "</td>";
        echo "<td>";
        echo "<input type='number' name='precioActualizado' value='".$row['precioU']."'>";
        echo "</td>";
        echo "<td>";
        echo "<input type='text' name='categoriaActualizado' value='".$row['categoria']."'>";
        echo "</td>";
        echo "<td>";
        echo "<input type='text' name='subcategoriaActualizado' value='".$row['subcategoria']."'>";
        echo "</td>";
        echo "<td>";
        echo "<input class='btn btn-primary' type='submit' value='Actualizar'></form>";
        echo "</td>";
        echo "<td>";
        echo "<form action='eliminarProducto.php' method='post'>";
        echo "<input type='hidden' name='idEliminar' value='".$row['id_producto']."'>";
        echo "<input type='submit' value='Eliminar' class='btn btn-danger'></form>";
        echo "</td>";
        echo "</tr>";
        }
} else {
    echo "No hay productos con estas caracteristicas";
}

$conexion->close();
