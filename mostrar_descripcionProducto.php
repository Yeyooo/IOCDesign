<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT descripcion FROM producto WHERE id_producto = :id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	while($datos = $consulta->fetch()){
		$descripcion_producto = $datos['descripcion'];
	}

	echo $descripcion_producto;
?>