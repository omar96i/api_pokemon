$( document ).ready(function() {
  
	$('.message').click(function(){
   		$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
	});
  
	$("#crear_usuario").click(function(event) {
		event.preventDefault();
		var nombre = $("#name_registro").val();
		var password = $("#pass_registro").val();
		var email = $("#email_registro").val();
		$.ajax({
			url: 'php/usuarios.php',
			type: 'POST',
			dataType: 'json',
			data: {dato1: nombre, dato2: password, dato3: email, mensaje: "registro_usuario"},
		})
		.done(function(data) {
			if (data == "OK##CONSULTA") {
				$(".mensaje_error").html("Usuario registrado");
				$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
				$("#name_registro").val("");
				$("#pass_registro").val("");
				$("#email_registro").val("");
				$(".mensaje_error").html("");
			}else{
				$(".mensaje_error").html("Datos incorrectos");
			}
		})
		.fail(function(data) {
			console.log(data);
		})
	});
  
	$(".ingresar").click(function(event) {
		event.preventDefault();
		var email =$("#email").val();
		var pass = $("#password").val();
		$.ajax({
			url: 'php/usuarios.php',
			type: 'POST',
			dataType: 'json',
			data: {dato1: email, dato2: pass, mensaje: "inicio_sesion"},
		})
		.done(function(data) {
			if (data == "USUARIO##ENCONTRADO") {
				$(location).attr('href', 'inicio_pokedex.php');
			}else{
				$(".mensaje_error2").html("Datos incorrectos");
			}
		})
		.fail(function(data) {
			console.log("algo sale mal")
			console.log(data);
		})
	});
});
