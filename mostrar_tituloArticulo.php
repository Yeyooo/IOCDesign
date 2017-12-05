<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT titulo FROM articulo WHERE id_articulo = :id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	while($datos = $consulta->fetch()){
		$titulo_articulo = $datos['titulo'];
	}

	echo $titulo_articulo;
?>