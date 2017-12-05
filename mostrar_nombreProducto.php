<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT nombre FROM producto WHERE id_producto = :id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	while($datos = $consulta->fetch()){
		$nombre_producto = $datos['nombre'];
	}

	echo $nombre_producto;
?>