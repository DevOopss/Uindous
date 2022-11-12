<?php
	if(isset($_GET["foto"])==false){
		header("location:../../SOS/BSapp.php?error=No se ha indicado el archivo que se debe modificar.&app=Explorer");
		exit;
	}
	$foto = $_GET["foto"];
	$filtro = $_GET["op"];
	$nombre = $_GET["nombre"];
$imagen=$foto;
	$direccion = $_GET["direccion"];
	
	$archivo = $foto;
	
	$info = getimagesize($archivo);
	$ancho = $info[0];
	$alto = $info[1];
	$tipo = $info["mime"];
	
	switch($tipo){
		case "image/jpg":
		case "image/jpeg":
			$imagen = imagecreatefromjpeg($archivo);
			break;
		case "image/png":
			$imagen = imagecreatefrompng($archivo);
			break;	
		case "image/gif":
			$imagen = imagecreatefromgif($archivo);
			break;
	}
	
	if($filtro=="negativo") {
		imagefilter($imagen, IMG_FILTER_NEGATE);
	}
	if($filtro=="grises") {
		imagefilter($imagen, IMG_FILTER_GRAYSCALE);
	}
	if($filtro=="brillo") {
		imagefilter($imagen, IMG_FILTER_BRIGHTNESS, 20);
	}
	if($filtro=="contraste") {
		imagefilter($imagen, IMG_FILTER_CONTRAST, 20);
	}
	
	$lienzo = imagecreatetruecolor($ancho, $alto);
	
	imagecopy($lienzo, $imagen, 0,0, 0,0, $ancho, $alto);
	
	imagejpeg($lienzo, $direccion.$nombre, 80);
	
	//header("location:".$direccion.$nombre);


?>
