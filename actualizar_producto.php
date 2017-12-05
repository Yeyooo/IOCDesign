<?php 		
	require("conexion.php");

	if($conn){
		$id = $_POST['id_producto'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];
		$publicado = $_POST['publicado'];
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

	$conn = null;
	header("location:updateProducto.php");
 ?>