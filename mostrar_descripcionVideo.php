<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT descripcion FROM video WHERE id_video = :id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	while($datos = $consulta->fetch()){
		$descripcion_video = $datos['descripcion'];
	}

	echo $descripcion_video;
?>