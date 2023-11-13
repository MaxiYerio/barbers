<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $consultaActualizar = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio=$precio WHERE id=$id";
    $resultadoActualizar = mysqli_query($conexion, $consultaActualizar);

    if ($resultadoActualizar) {
        header("location: tabla.php");
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
