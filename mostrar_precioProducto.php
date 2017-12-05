<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT precio FROM producto WHERE id_producto = :id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	while($datos = $consulta->fetch()){
		$precio_producto = $datos['precio'];
	}

	echo $precio_producto;
?>