<?php 		
	require("conexion.php");

	if($conn){
		$id = $_POST['id_articulo'];
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];
		$texto = $_POST['texto'];
		$publicado = $_POST['publicado'];
		$imagen = basename($_FILES['foto']['name']);
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

	$id_anterior = $conn->prepare("SELECT id_imagen FROM articulo WHERE id_articulo = :id_articulo");
	$id_anterior->bindParam(":id_articulo",$id_articulo);
	$id_anterior->execute();

	while($row = $id_anterior->fetch()){
		$id_imagen = $row['id_imagen'];
	}

	if($imagen != ""){
		$sentencia = $conn->prepare("UPDATE imagen SET url = :imagen WHERE id_imagen = :id_imagen");
		$sentencia->bindParam(":imagen",$imagen);
		$sentencia->bindParam(":id_imagen",$id_imagen);
		if($sentencia->execute()){
			$uploaddir = '/usr/share/nginx/html/IOCDesign-Github/Articulos/';
			$uploadfile = $uploaddir.basename($_FILES['foto']['name']);
			if(move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)){
			}
		}		
	}
	
	$conn = null;
	header("location:updateArticulo.php");
?>