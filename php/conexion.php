<?php 
	try{
		$conexion = new PDO("mysql:host=localhost;dbname=api_pokemon","root",""); 
	}catch(PDOException $error){		
		// Ocurrio un error y no se pudo realizar las instrucciones de la base de datos
		$datos['estatus'] = 'ERROR##CONEXION##BASEDATOS';
		$datos['mensaje'] = $error->getMessage();
		echo json_encode($datos);
		die();
	}
?>