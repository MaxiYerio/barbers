<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $consultaEliminar = "DELETE FROM productos WHERE id = $id";
    $resultadoEliminar = mysqli_query($conexion, $consultaEliminar);

    if ($resultadoEliminar) {
        header("location: tabla.php");
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
