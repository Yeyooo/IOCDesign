<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT titulo FROM video WHERE id_video = :id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	while($datos = $consulta->fetch()){
		$titulo_video = $datos['titulo'];
	}

	echo $titulo_video;
?>