<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

  <title>Tienda Jazmín</title>


  <!--todos los css-->



  <!-- Font awesome link CSS -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <!-- bootstrap Home css -->
  <link rel="stylesheet" href="../home/css/bootstrap.min.css">
  <!-- style Home css -->
  <link rel="stylesheet" href="../home/css/estilos.css">
  <!-- Responsive Home-->
  <link rel="stylesheet" href="../home/css/responsive.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body class="comerciocomprador">
  <!--header de la tienda-->
  <div class="header_top fixed-top  navbar-expand-lg ">

    <div class="container">

      <div class="row">

        <div class="col-sm-5">

          <div class="contact_main">

            <div class="contact_left">
              <div class="featured-item1"><a href="#">
                  <img src="../home/images/closesing.png">
                  Cerrar Sesion
                </a>
              </div>
            </div>

            <div class="contact_right">
              <div class="featured-item1" id="Inicio">
                <a href="../home/home.php">
                  <i class="fa-solid fa-house" style="color: #c4a40c;"></i>
                  Inicio
                </a>
              </div>
            </div>

          </div>
        </div>
        <div class="col-sm-2">

          <div class="logo"><a href="index.html">
              <img src="../home/images/logo.png"></a>
          </div>
          <div class="contact_select">

            <div class="menu-button" id="menuButton">
              <i class="fas fa-bars"></i>
            </div>

            <div class="menu-content" id="menuContent">
              <a href="#"> <img src="../home/images/closesing.png">
                Cerrar Sesión</a>
              <a href="../home/home.php"> <i class="fa-solid fa-house" style="color: #c4a40c;"></i>
                Inicio</a>
              <a href="../alta/agregarproducto.php"> <img src="../home/images/egregar.png">
                Agregar Producto</a>
              <a href="../alta/tabla.php"><img src="../home/images/usuario.png">Administrar</a>
            </div>

          </div>
        </div>

        <div class="col-sm-5">
          <div class="contact_main">
            <div class="contact_left">

              <div class="featured-item1">
                <a href="../alta/agregarproducto.php">
                  <img src="../home/images/egregar.png">
                  Agregar Producto
                </a>
              </div>
            </div>

            <div class="contact_right">
              <div class="featured-item1"><a href="../alta/tabla.php"><img src="../home/images/usuario.png">
                  Administrar
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!--no se que poner acá xD-->

  <div class="banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="caption">
            <p class="titular">Compra o Vende productos Con Nosotros</p>
            <div class="line-dec"></div>
            <p class="titular">Productos de Barbería de Alta Calidad Para Lo Que Necesites
            </p>
            <div class="main-button">
              <p class=" titular">Si necesitas un corte visita nuestra pagina</p>
              <a href="#">Ir</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include('../alta/conexion.php');

  // analiza si la conexión se conecto
  if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
  }

  $consultaProductos = "SELECT * FROM productos";
  $resultado = mysqli_query($conexion, $consultaProductos);

  //se muestran las card de los productos
  if ($resultado) {
    echo '<div class="featured-items">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-12">';
    echo '<div class="section-heading">';
    echo '<div class="line-dec"></div>';
    echo '<h1 class="text-white titular">Productos Disponibles</h1>';
    echo '</div>';
    echo '</div>';
    echo '<div class="col-md-12">';
    echo '<div class="owl-carousel owl-theme">';

    while ($producto = mysqli_fetch_assoc($resultado)) {
      echo '<div class="featured-item">';
      // muestra la imagen subida en la tabla o base de datos
      echo '<img src="data:' . $producto['imagen_tipo'] . ';base64,' . base64_encode($producto['imagen']) . '" alt="' . $producto['nombre'] . '" style="width: 230px; height: 250px;">';
      echo '<h4>' . $producto['nombre'] . '</h4>';
      echo '<h6>$' . $producto['precio'] . '</h6>';
      echo '</div>';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    mysqli_free_result($resultado);
  } else {
    echo "Error en la consulta: " . mysqli_error($conexion);
  }

  // Cierra la conexión de la base de datos 
  mysqli_close($conexion);
  ?>
  <!-- Featured Starts Here -->
  <br>


  <!--Todos los script-->



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="../home/js/jquery.min.js"></script>
  <script src="../home/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function() {
      const menuButton = $('#menuButton');
      const menuContent = $('#menuContent');

      menuContent.hide();

      menuButton.on('click', function() {
        if (menuContent.is(':visible')) {
          menuContent.hide();
          menuButton.removeClass('active');
        } else {
          menuContent.show();
          menuButton.addClass('active');
        }
      });
    });
  </script>
</body>

</html>