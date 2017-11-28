<?php
	require("conexion.php");

	if($conn){
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$categoria = $_POST['categoria'];
		$imagen = basename($_FILES['foto']['name']);
		$precio = $_POST['precio'];
	}

	//Seleccionamos la categoria (id_categoria)
	$stmt4 = $conn->prepare("SELECT id_categoria FROM categoria WHERE nombre = :categoria");
	$stmt4->bindParam(":categoria",$categoria);
	$stmt4->execute();
	while($row = $stmt4->fetch()){
		$id_categoria = $row['id_categoria'];
	}
	
	//Insertamos imagen del producto
	$stmt = $conn->prepare("INSERT INTO imagen VALUES(DEFAULT,:imagen)");
	$stmt->bindParam(":imagen",$imagen);

	if($stmt->execute()){
		$uploaddir = '/usr/share/nginx/html/IOCDesign-Github/Productos/';
		$uploadfile = $uploaddir.basename($_FILES['foto']['name']);
		if(move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)){
		}
	}
	//Al ser id autoincremental es necesario seleccionar el maximo, ya que asi se obtiene el ultimo insertado
	$stmt2 = $conn->prepare("SELECT MAX(id_imagen) id FROM imagen");
	$stmt2->execute();
	while($row = $stmt2->fetch()){
		$id_imagen = $row['id'];
	}
	
	$consulta = $conn->prepare("INSERT INTO producto VALUES(DEFAULT,:nombre,:descripcion,:precio,:id_categoria,:id_imagen,1)");
	$consulta->bindParam(":nombre",$nombre);
	$consulta->bindParam(":descripcion",$descripcion);
	$consulta->bindParam(":precio",$precio);
	$consulta->bindParam(":id_categoria",$id_categoria);
	$consulta->bindParam(":id_imagen",$id_imagen);			
	$consulta->execute();

	$conn = null;
	header("location:administrador.php");
 ?>