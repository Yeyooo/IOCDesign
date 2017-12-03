<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT id_imagen FROM articulo WHERE id_articulo=:id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	while($datos = $consulta->fetch()){
		$id_imagen = $datos['id_imagen'];
	}

	$consulta2 = $conn->prepare("SELECT url FROM imagen WHERE id_imagen=:id_imagen");
	$consulta2->bindParam(":id_imagen",$id_imagen);
	$consulta2->execute();

	while($imagen = $consulta2->fetch()){
		$imagen_articulo = $imagen['url'];
	}

	echo "<p id=\"Imagen\"><img src='Articulos/".$imagen_articulo."'</p>";
?>