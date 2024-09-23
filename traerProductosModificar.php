<?php
include('conexion.php');

$sqlEP = "SELECT * FROM productos";
$resultEP = $conexion->query($sqlEP);

if ($resultEP->num_rows > 0) {
    $iterador = 1; // Inicializar el iterador fuera del bucle
    // Salida de datos de cada fila
    while ($row = $resultEP->fetch_assoc()) {
        echo "<tr>";
        echo "<td><input id='nombreInputModificar".$iterador."' value='".$row['nombre']."' oninput='actualizarDatos(\"".$iterador."\")'></td>";
        echo "<td><input id='precioInputModificar".$iterador."' value='".$row['precioU']."' oninput='actualizarDatos(\"".$iterador."\")'></td>";
        echo "<td><input id='categoriaInputModificar".$iterador."' value='".$row['categoria']."' oninput='actualizarDatos(\"".$iterador."\")'></td>";
        echo "<td><input id='subcategoriaInputModificar".$iterador."' value='".$row['subcategoria']."' oninput='actualizarDatos(\"".$iterador."\")'></td>";
        echo "<td><form action='actualizarProducto.php' method='post'>
              <input type='hidden' name='nombreActualizado' id='nombreFormulario".$iterador."'>
              <input type='hidden' name='precioActualizado' id='precioFormulario".$iterador."'>
              <input type='hidden' name='categoriaActualizado' id='categoriaFormulario".$iterador."'>
              <input type='hidden' name='subcategoriaActualizado' id='subcategoriaFormulario".$iterador."'>
              <input type='hidden' name='id_prod' value='".$row['id_producto']."'>
              <input class='btn btn-primary' type='submit' value='Actualizar'></form></td>";
        echo "<td><form action='eliminarProducto.php' method='post'>
              <input type='hidden' name='id_prod' id='id_prod' value='".$row['id_producto']."'>
              <input class='btn btn-danger' type='submit' value='Eliminar'></form></td>";
        echo "</tr>";
        $iterador++; // Incrementar el iterador en cada iteración
    }
} else {
    echo "No hay productos con estas características";
}

$conexion->close();
?>
