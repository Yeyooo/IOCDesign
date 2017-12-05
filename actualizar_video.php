<?php 		
	require("conexion.php");

	if($conn){
		$id = $_POST['id_video'];
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];
		$publicado = $_POST['publicado'];
	}	
	
	if($publicado == true){
		$disponible = 1;
	}else{
		$disponible = 0;
	}

	$id_video = intval($id);

	$sentencia = $conn->prepare("UPDATE video SET titulo = :titulo, descripcion = :descripcion, disponible=:disponible WHERE id_video = :id_video");
	$sentencia->bindParam(":titulo",$titulo);
	$sentencia->bindParam(":descripcion",$descripcion);
	$sentencia->bindParam(":disponible",$disponible);
	$sentencia->bindParam(":id_video",$id_video);
	$sentencia->execute();
	
	$conn = null;
	header("location:updateVideo.php");
?>