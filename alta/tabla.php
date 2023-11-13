<?php
include('conexion.php');

$consultaProductos = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $consultaProductos);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Tabla</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./stylecrud.css">
    <link rel="stylesheet" href="../ComercioComprador/assets/css/style.css">
    <link rel="stylesheet" href="../ComercioComprador/assets/css/fontawesome.css">
</head>

<body class="fondotabla">
    <div class="contenedor">

        <div class="tablaproducto">
            <h4 class="titulo">Tabla De Productos</h4>
            <div class="main-button titular">
                <div class="botones">
                    <a href="./agregarproducto.php">Agregar Producto</a>
                    <a href="../ComercioComprador/Tienda.php">Tienda</a>
                    <a href="../home/home.php">Inicio</a>
                </div>
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultado) {
                            if (mysqli_num_rows($resultado) > 0) {
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    echo "<tr>";
                                    //tabla de los productos que se van a agregar
                                    echo "<td>" . $fila['id'] . "</td>";
                                    echo "<td>" . $fila['nombre'] . "</td>";
                                    echo "<td>" . $fila['descripcion'] . "</td>";
                                    echo "<td>$" . $fila['precio'] . "</td>";

                                    // Muestra la imagen de la tabla agregada
                                    echo "<td><img src='data:" . $fila['imagen_tipo'] . ";base64," . base64_encode($fila['imagen']) . "' alt='Imagen del producto' class='img-thumbnail'></td>";
                                    echo "<td>";

                                    //editar
                                    echo "<a href='editar.php?id=" . $fila['id'] . "'>Editar</a>";
                                    echo " | ";

                                    //eliminar
                                    echo "<a href='eliminar.php?id=" . $fila['id'] . "'>Eliminar</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No se encontraron productos.</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>Error en la consulta: " . mysqli_error($conexion) . "</td></tr>";
                        }

                        mysqli_close($conexion);
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>
