<?php 		
	require("conexion.php");

	if($conn){
		$id = $_POST['id_articulo'];
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];
		$texto = $_POST['texto'];
		$publicado = $_POST['publicado'];
	}	
	
	if($publicado == true){
		$disponible = 1;
	}else{
		$disponible = 0;
	}

	$id_articulo = intval($id);

	$sentencia = $conn->prepare("UPDATE articulo SET titulo = :titulo, descripcion = :descripcion, texto=:texto, disponible=:disponible WHERE id_articulo = :id_articulo");
	$sentencia->bindParam(":titulo",$titulo);
	$sentencia->bindParam(":descripcion",$descripcion);
	$sentencia->bindParam(":texto",$texto);
	$sentencia->bindParam(":disponible",$disponible);
	$sentencia->bindParam(":id_articulo",$id_articulo);
	$sentencia->execute();

	$conn = null;
	header("location:updateArticulo.php");