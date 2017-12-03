<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT texto FROM articulo WHERE id_articulo = :id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	while($datos = $consulta->fetch()){
		$texto_articulo = $datos['texto'];
	}

	echo $texto_articulo;
?>