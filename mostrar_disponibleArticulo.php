<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT disponible FROM articulo WHERE id_articulo = :id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	while($datos = $consulta->fetch()){
		$disponible_articulo = $datos['disponible'];
	}

	if($disponible_articulo == 1){
		echo "true";
	}else echo "false";
?>