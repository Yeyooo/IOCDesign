<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT descripcion FROM articulo WHERE id_articulo = :id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	while($datos = $consulta->fetch()){
		$descripcion_articulo = $datos['descripcion'];
	}

	echo $descripcion_articulo;
?>