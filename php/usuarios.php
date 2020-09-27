<?php  
	if ($_POST['mensaje']=="registro_usuario") {
		include "conexion.php";
		$nombre = $_POST['dato1'];
		$email = $_POST['dato3'];
		$pass = md5($_POST['dato2']);
		$consulta = $conexion->prepare("INSERT INTO usuario VALUES (?,?,?)");
		if ($consulta->execute(["$email","$pass","$nombre"])) {
			$mensaje = "OK##CONSULTA";
		}else{
			$mensaje = "ERROR#CONSULTA";
		}
		echo json_encode($mensaje);
	}else if($_POST['mensaje']=="inicio_sesion"){
		include "conexion.php";
		$email = $_POST['dato1'];
		$pass = md5($_POST['dato2']);
		$consulta = $conexion->prepare("SELECT nombre_completo,correo FROM usuario WHERE correo = ? AND password = ?");
		$consulta->execute(["$email","$pass"]);
		if ($consulta->rowCount()!=0) {
			$datos=$consulta->fetchAll()[0];
			session_start();
			$_SESSION['nombre']=$datos[0];
			$_SESSION['correo']=$datos[1];
			$mensaje="USUARIO##ENCONTRADO";
		}else{
			$mensaje="USUARIO##NO##ENCONTRADO";
		}
		echo json_encode($mensaje);
	}
?>