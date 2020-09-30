<?php 
	session_start();
	if (!isset($_SESSION['nombre']) && !isset($_SESSION['correo'])) {
		header("Location: index.php");
		die();
	}else if(empty($_SESSION['nombre']) && empty($_SESSION['correo'])){
	    	header("Location: index.php");
		die();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prueba api</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/mis_estilos.css">
</head>
<body>
	<nav class="container-fluid">
		<div class="row">
			<div class="col">
				<h1><strong>POKEDEX</strong></h1>
			</div>
			<div class="col centrar mt-3">
				<p class="float-right sesion"><strong><?php echo $_SESSION['correo']; ?></strong><br><a href="php/cerrar_sesion.php">Salir</a></p>
			</div>
		</div>
	</nav>
	<!-- CONTENIDO BUSCAR -->
	<div class="container mt-4">
		<div class="input-group mb-3">
		  	<input type="text" class="form-control" placeholder="Nombre del pokemon" id="buscar_pokemon" aria-label="Recipient's username" aria-describedby="basic-addon2">
		  	<div class="input-group-append">
		    	<button class="boton_buscar">Buscar</button>
		  	</div>
		</div>
		<div class="alert alert-danger centrar" id="mensaje_no_encontrado" role="alert">
		</div>
	</div>
	<!-- FIN CONTENIDO BUSCAR -->
	<!-- GIF CARGANDO -->
	<div class="container mt-3 cargando">
		<div class="row">
			<div class="col centrar">
				<div class="spinner-border text-danger" role="status">
				  	<span class="sr-only">Loading...</span>
				</div>
			</div>
		</div>
	</div>
	<!-- FIN GIF CARGANDO -->
	<!-- INICIO CONTENIDO MENU POKEMON-->
	<div class="container menu_pokemon mt-3">
		<div class="row justify-content-center">
			<h2 class="name_pokemon"></h2>
		</div>
		<div class="row">
			<div class="col-6 ">
				<div class="centrar habilidades_poke mt-2">
				</div>
			</div>
			<div class="col-6">
				<div class="centrar imagen_poke">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col centrar">
				<button class="paginador" onclick="mostrarMenu()">Ver lista</button>
			</div>
		</div>
	</div>
	<!-- FIN CONTENIDO MENU POKEMON-->
	<!-- CONTENIDO ITEMS -->
	<div class="container-fluid mt-3 contenido_items ocultar">
	</div>
	<!-- FIN CONTENIDO ITEMS -->
	<!-- CONTENIDO PAGINADOR -->
	<div class="container mt-3 ocultar">
		<div class="centrar">
			<button class="paginador atras">Atras</button>
			<button class="paginador adelante">Siguiente</button>
		</div>
	</div>
	<!-- FIN CONTENIDO PAGINADOR -->
	<script src="js/jquery-3.5.1.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/js_api.js"></script>
</body>
</html>
