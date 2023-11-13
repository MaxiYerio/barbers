<?php
//conexion con la base de datos 
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
//para identificar las imagenes y donden se van a guardar
$nombreImagen = $_FILES['imagen']['name'];
$tipoImagen = $_FILES['imagen']['type'];
$datosImagen = file_get_contents($_FILES['imagen']['tmp_name']);
$rutaImagen = './alta/img/' . $nombreImagen;

move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen);

include('conexion.php');

//para insertar productos 
$consultaDB = "INSERT INTO productos (nombre, descripcion, precio, imagen_tipo, imagen) VALUES ('$nombre', '$descripcion', $precio, '$tipoImagen', ?)";
$stmt = mysqli_prepare($conexion, $consultaDB);
mysqli_stmt_bind_param($stmt, "s", $datosImagen);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

$consultaProductos = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $consultaProductos);

$productos = [];
while ($fila = mysqli_fetch_assoc($resultado)) {
    $productos[] = $fila;
}

mysqli_close($conexion);

echo json_encode($productos);

header("location: ../ComercioComprador/Tienda.php");

?>
