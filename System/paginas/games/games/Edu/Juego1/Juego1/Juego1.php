<!doctype html>
<html class="fondoobscuro">
<head>
<meta charset="UTF-8">
<title>Arrastra Foto</title>
<link rel="icon" type="image/ico" href="../../../../../../../Documents_and_settings/visible/logo.ico" />
 <script type="text/javascript" src="../../../../../../../System32/jquery/$definicion/js/jquery-1.9.1.min.js" ></script>
 <script type="text/javascript" src="../../../../../../../System32/jquery/$definicion/js/jquery-ui.js" ></script>
 <link href="../../../../../../../System32/css/personalizacion.css" rel="stylesheet"/>
<script>
$(document).ready(inicio);
var cuadros_array = new Array();
cuadros_array.push({img:"Bach", num:1});
cuadros_array.push({img:"Beethoven", num:2});
cuadros_array.push({img:"Chopin", num:3});
cuadros_array.push({img:"Kosrsakov", num:4});
cuadros_array.push({img:"Schubert", num:5});
cuadros_array.push({img:"Tchaikovsky", num:6});
//
var fotos_array = new Array();
fotos_array.push({img:"Bach.PNG", num:1});
fotos_array.push({img:"Beethoven.PNG", num:2});
fotos_array.push({img:"Chopin.PNG", num:3});
fotos_array.push({img:"Kosrsakov.PNG", num:4});
fotos_array.push({img:"Schubert.PNG", num:5});
fotos_array.push({img:"Tchaikovsky.PNG", num:6});
//
var fotos_pos= new Array();
	var score = 0;
function inicio(){
$("#avanza").hide();
	$("#jugar").hide();
	$("#verifica").show();
	//
	$("#avanza").click(AvanzarNivel);
	//
	$(".foto").draggable({
		cursor: "move"
	});
	//
	$(".foto").each(function(i){
		l = fotos_array.length;
		r = Math.floor(Math.random()*l);
		$(this).html("<img src='animales/"+fotos_array[r].img+"' width='120px' height='120px'/>");
		$(this).attr("data-num",fotos_array[r].num);
		fotos_array.splice(r,1);
		//
		var t= $(this).offset().top;
		var l= $(this).offset().left;
		//
		fotos_pos[i]={
				'top':t,
				'left':l,
				'position': 'absolute',
				'r': r,
				'i': i
				};
	});
	//
	$(".marco").each(function(i){
		l = cuadros_array.length;
		r = Math.floor(Math.random()*l);
		$(this).html("<p>"+cuadros_array[r].img+"<p/>");
		$(this).attr("data-num",cuadros_array[r].num);
		cuadros_array.splice(r,1);
	});
	//
	$(".marco").droppable({
		hoverClass: "ui-state-active",
		drop: function( event, ui ) {
		$( this ).addClass( "ui-state-highlight" );
		}
	});
	//
	$("#verifica").on('click',onVerifica);
	$("#jugar").on('click',onJugar);
	$('.foto').on('mousedown', onMouseDown);
	$('.foto').on('mouseup', onMouseUp);
	$('.marco').on('drop', onDropado);
}
function onJugar(){
	location.reload(true);
}
function onVerifica(){
	$("#jugar").show();
	$("#verifica").hide();
	$(".marco").each(function(i){
		var r = $(this).attr('data-num');
		var f = $(this).attr('data-cuadro');
		if(r==f){
			$("#res"+i).html('<p class="verde">Bien</p> ');
			score++
			verificaSiPasa();
		} else {
			$("#res"+i).html('<p class="rojo">Mal</p>');
		}
	});
	
}
function verificaSiPasa(){
	if (score==6) {
$("#jugar").show();
$("#verifica").hide();
$("#avanza").show();
	}
}
function onMouseDown()
{
	$item=$(this);
	$item.css("z-index","1");
}
function onMouseUp()
{
	//alert("Soltado");
	var r = $(this).attr('data-num');
	//$item.css("z-index","99");
}
function onDropado()
{
	//var t= $(this).offset().top;
	//var l= $(this).offset().left;
	$(this).attr('data-cuadro', $item.attr('data-num'));
	//$item.css("top",t);
	//$item.css("left",l);
	//$item.css("z-index","1");
}
function AvanzarNivel(){
	location.href="../../Juego3/Juego3/Juego3.php";
}
</script>
<style>



html{

	cursor: default;
}
#juego{
	width:800px;
	margin:0 auto;
	text-align:center;	
}
.foto{
	width:120px;
	height:120px;
	float: left;
	margin: 5px;
}
.marco{
	width:120px;
	height:105px;
	background-color:#ccc;
	float: left;
	margin: 5px;
	text-align:center;
	padding-top: 15px;
}
.res{
	width:120px;
	float: left;
	margin: 5px;
}
.rojo{
	color: red;
}
.verde{
	color: green;
}
</style>
</head>

<body>
<div id="juego">
<table width="800" border="0">
  <tr>
    <td>
    <div class="foto" data-num=""></div>
    <div class="foto" data-num=""></div>
    <div class="foto" data-num=""></div>
    <div class="foto" data-num=""></div>
    <div class="foto" data-num=""></div>
    <div class="foto" data-num=""></div>
</td>
  </tr>
  <tr>
    <td>
    <div class="marco" data-cuadro="" data-num=""></div>
    <div class="marco" data-cuadro="" data-num=""></div>
    <div class="marco" data-cuadro="" data-num=""></div>
    <div class="marco" data-cuadro="" data-num=""></div>
    <div class="marco" data-cuadro="" data-num=""></div>
    <div class="marco" data-cuadro="" data-num=""></div>
    </td>
  </tr>
  <tr>
    <td>
    <div class="res" id="res0"></div>
    <div class="res" id="res1"></div>
    <div class="res" id="res2"></div>
   	<div class="res" id="res3"></div>
    <div class="res" id="res4"></div>
    <div class="res" id="res5"></div>
    </td>
  </tr>
</table>
<input value="Verificar" type="button" class="button" id="verifica" name="verifica" class="button">
<input value="Volver a jugar" type="button" class="button" id="jugar" name="jugar" class="button">
<input value="Siguiente Nivel" type="button" class="button" id="avanza" name="verifica">

</div>
</body>
</html>
