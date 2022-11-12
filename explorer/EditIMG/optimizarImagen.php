<?php
	if(isset($_GET["foto"])==false){
		header("location:../../personalizar.php");
		exit;
	}
	$foto = $_GET["foto"];
	$porcien = $_GET["op"];
	$nombre = $_GET["nombre"];
	
	$archivo = "../../../../Documents_and_settings/fondos/otras/".$foto;
	
	$info = getimagesize($archivo);
	$ancho = $info[0];
	$alto = $info[1];
	$tipo = $info["mime"];
	
	$nuevoAncho = $ancho * ($porcien / 100);
	$nuevoAlto = $alto * ($porcien / 100);
	
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
	
	$lienzo = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	
	imagecopyresampled($lienzo, $imagen, 0,0, 0,0, 
	$nuevoAncho, $nuevoAlto, $ancho, $alto);
	
	imagejpeg($lienzo, "../../../../Documents_and_settings/fondos/otras/".$nombre, 80);
	
	header("location:../../personalizar.php");


?>
