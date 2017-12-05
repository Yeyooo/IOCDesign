<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT url FROM imagen WHERE id_imagen=:id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	while($datos = $consulta->fetch()){
		$imagen_producto = $datos['url'];
	}

	echo "<p id=\"Imagen\"><img src='Productos/".$imagen_producto."'</p>";
?>