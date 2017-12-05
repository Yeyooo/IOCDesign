<?php 		
	require("conexion.php");

	if($conn){
		$id = $_POST['id_producto'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];
		$publicado = $_POST['publicado'];
		$imagen = basename($_FILES['foto']['name']);
	}	
	
	if($publicado == true){
		$disponible = 1;
	}else{
		$disponible = 0;
	}

	$id_producto = intval($id);

	$sentencia = $conn->prepare("UPDATE producto SET nombre = :nombre, descripcion = :descripcion, precio=:precio, disponible=:disponible WHERE id_producto = :id_producto");
	$sentencia->bindParam(":nombre",$nombre);
	$sentencia->bindParam(":descripcion",$descripcion);
	$sentencia->bindParam(":precio",$precio);
	$sentencia->bindParam(":disponible",$disponible);
	$sentencia->bindParam(":id_producto",$id_producto);
	$sentencia->execute();

	$id_anterior = $conn->prepare("SELECT id_imagen FROM producto WHERE id_producto = :id_producto");
	$id_anterior->bindParam(":id_producto",$id_producto);
	$id_anterior->execute();

	while($row = $id_anterior->fetch()){
		$id_imagen = $row['id_imagen'];
	}

	if($imagen != ""){
		$sentencia = $conn->prepare("UPDATE imagen SET url = :imagen WHERE id_imagen = :id_imagen");
		$sentencia->bindParam(":imagen",$imagen);
		$sentencia->bindParam(":id_imagen",$id_imagen);
		if($sentencia->execute()){
			$uploaddir = '/usr/share/nginx/html/IOCDesign-Github/Productos/';
			$uploadfile = $uploaddir.basename($_FILES['foto']['name']);
			if(move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)){
			}
		}
	}

	$conn = null;
	header("location:updateProducto.php");
 ?>