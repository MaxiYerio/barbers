<?php
$usuario = $_POST['correo'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION["users"] = $usuario;

include("conexion.php");

$consulta = "SELECT * FROM usuarios WHERE correo_electronico = '$usuario' AND contrasena = '$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) 
{
    // El inicio de sesión es correcto, puedes redirigir al usuario a la página de inicio
    header("location: ./home/home.php");
} else 
{
    // Mostrar el mensaje de error en la misma página
    $_SESSION['mensaje_error'] = "Datos incorrectos";
    include("index.php");
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
