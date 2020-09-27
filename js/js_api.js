$(document).ready(function() {
	$(".menu_pokemon").hide();
	generarLista();
	$(".adelante").click(function(event) {
		var url = $(this).attr('link');
		pasarPagina(url);
	});
	$(".atras").click(function(event) {
		var url = $(this).attr('link');
		pasarPagina(url);
	});
});
//Generar lista inicialmente
function generarLista(){
	$(".contenido_items").slideUp(500);
	$(".cargando").show();
	$.ajax({
		url: 'php/api.php',
		type: 'post',
		dataType: 'json',
		data: {mensaje: 'inicial'},
	})
	.done(function(data) {
		CargarItems(data);
		VerificarAtrasAdelante(data);
		$(".items_poke").click(function(event) {
			var nombre = $(this).children().first().html();
			buscarPokemon(nombre);
		});
		$(".cargando").hide();
		$(".contenido_items").slideDown(500);
	})
	.fail(function(data) {
		console.log("Entro aqui");
		console.log(data);
	});
}
//////////////////////
//Buscar pokemon
function buscarPokemon(nombre){
	$(".ocultar").slideUp(500);
	$(".cargando").show();
	$(".habilidades_poke").children().remove();
	$(".imagen_poke").children().remove();
	$.ajax({
		url: 'php/api.php',
		type: 'post',
		dataType: 'json',
		data: {mensaje: 'buscar_poke', nombre : nombre},
	})
	.done(function(data) {
		$(".name_pokemon").html(nombre);
		texto="<ul>";
		for (var i = 0; i < data.abilities.length; i++) {
			texto+="<li>"+data.abilities[i]['ability']['name']+"</li>";
		}
		texto+="</ul>";
		$(".habilidades_poke").append(texto);
		texto = "<img src='"+data.sprites.front_default+"'>";
		$(".imagen_poke").append(texto);
		$(".cargando").hide();
		$(".menu_pokemon").slideDown(500);
	})
	.fail(function(data) {
		console.log("Entro aqui");
		console.log(data);
	});
}
//////////////////////
//Mostrar menu listado
function mostrarMenu(){
	$(".menu_pokemon").slideUp(500);
	$(".ocultar").slideDown(500);
}
//Generar lista al pasar pagina
function pasarPagina(url){
	$(".contenido_items").slideUp(500);
	$(".cargando").show();
	$.ajax({
		url: 'php/api.php',
		type: 'post',
		dataType: 'json',
		data: {mensaje: 'cambio',url:url},
	})
	.done(function(data) {
		console.log(data);
		CargarItems(data);
		VerificarAtrasAdelante(data);
		$(".items_poke").click(function(event) {
			var nombre = $(this).children().first().html();
			buscarPokemon(nombre);
		});
		$(".cargando").hide();
		$(".contenido_items").slideDown(500);
	})
	.fail(function(data) {
		console.log("Entro aqui");
		console.log(data);
	});
}
//////////////////////
//Crear interfaz items 
function CargarItems(data){
	$(".contenido_items").children().remove();
	var texto = "<div class='row'>";
	for (var i = 0; i < data.results.length; i++) {
		texto+="	<div class='col m-1 items_poke p-4'><strong>"+data.results[i]['name']+"</strong></div>";
		if (i==3 || i==7 || i==11 || i==15) {
			texto+= "</div>";
			texto+= "<div class='row'>";
		}else if (i==19) {
			texto+= "</div>";
		}
	}
	$(".contenido_items").append(texto);
}
//////////////////////
//Verificar si es posible ire atras o delante
function VerificarAtrasAdelante(data){
	if (data.next!=null) {
		$(".adelante").removeAttr('disabled');
		$(".adelante").attr('link', data.next);
	}else{
		$(".adelante").attr('disabled', true);
	}
	if (data.previous!=null) {
		$(".atras").removeAttr('disabled');
		$(".atras").attr('link', data.previous);
	}else{
		$(".atras").attr('disabled', true);
	}
}
/////////////////////