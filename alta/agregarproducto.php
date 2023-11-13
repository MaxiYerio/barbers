<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="stylecrud.css">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

	<title>Document</title>
</head>

<body class="fondoalta">
	<!--from del agregegador de productos-->
	<div class="cuadroform">
		<h2>Agregar Productos</h2>

		<form action="validarDatos.php" method="POST">
			<div class="usuario">
				<input type="text" name="nombre" required>
				<label>Nombre del producto</label>
			</div>

			<div class="usuario">
				<input type="number" name="precio" required>
				<label>Precio </label>
			</div>

			<div class="usuario">
				<label>Descripción:</label>
				<br>
				<br>
				<textarea name="descripcion" rows="5"></textarea>
			</div>
			<div class="usuario">
				<div class="SubirArchivo" id="src-file">
					<input type="file" name="imagen" aria-label="Foto">
				</div>

			</div>

			<div>
				<button class='entrar' type='button' onclick='cancelaragregar()'>Cancelar</button>

				<input class="entrar" type="submit" value="Aceptar">
			</div>
		</form>
	</div>

	
	<script>
		//al darle cancerla en el agregar producto te lleva a la tienda
		function cancelaragregar() {
			window.location.href = '../ComercioComprador/Tienda.php';
		}

		$(document).ready(function() {
			$('form').submit(function(event) {
				event.preventDefault();

				var formData = new FormData(this);

				$.ajax({
					type: 'POST',
					url: 'validarDatos.php',
					data: formData,
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						// te lleva a la tienda despues de agregar un producto a la tabla
						window.location.href = '../ComercioComprador/Tienda.php';
					},
					//por si hay algun error al agregar un producto 
					error: function() {
						alert('Error al agregar el producto.');
					}
				});
			});
		});
	</script>

</body>

</html>