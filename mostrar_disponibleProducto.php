<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT disponible FROM producto WHERE id_producto = :id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	while($datos = $consulta->fetch()){
		$disponible_producto = $datos['disponible'];
	}

	if($disponible_producto == 1){
		echo "true";
	}else echo "false";
?>