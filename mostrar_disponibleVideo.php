<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT disponible FROM video WHERE id_video = :id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	while($datos = $consulta->fetch()){
		$disponible_video = $datos['disponible'];
	}

	if($disponible_video == 1){
		echo "true";
	}else echo "false";
?>