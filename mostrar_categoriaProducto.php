<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT id_categoria FROM producto WHERE id_producto = :id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	while($datos = $consulta->fetch()){
		$id_categoria = $datos['id_categoria'];
	}

	$consulta2 = $conn->prepare("SELECT nombre FROM categoria WHERE id_categoria = :id_categoria");
	$consulta2->bindParam(":id_categoria",$id_categoria);
	$consulta2->execute();

	while($dato = $consulta2->fetch()){
		$categoria = $dato['nombre'];
	}

	echo $categoria;
?>