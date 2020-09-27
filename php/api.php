<?php
	if ($_POST['mensaje']=="inicial") {
		$datos=json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon/'));
		echo json_encode($datos);
	}else if ($_POST['mensaje']=="buscar_poke") {
		$nombre = $_POST['nombre'];
		$datos=json_decode(file_get_contents("https://pokeapi.co/api/v2/pokemon/".$nombre.""));
		echo json_encode($datos);
	}else if ($_POST['mensaje']=="cambio"){
		$url = $_POST['url'];
		$datos=json_decode(file_get_contents($url));
		echo json_encode($datos);
	}
?>