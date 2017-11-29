<?php
	
	$id = $_GET['id'];

	require("conexion.php");

	$consulta = $conn->prepare("SELECT titulo FROM video WHERE :id");
	$consulta->bindParam(":id",$id);
	$consulta->execute();

	$datos = $consulta->fetch();

	echo "Título: <input id=\"Titulo\" type=\"text\" name=\"titulo\" value='".$datos['titulo']."'><br/><br/>";
?>