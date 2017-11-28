<?php
	require("conexion.php");

	if($conn){
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];
		$texto = $_POST['texto'];
		$imagen = basename($_FILES['foto']['name']);
	}


	$stmt = $conn->prepare("INSERT INTO imagen VALUES(DEFAULT,:imagen)");
	$stmt->bindParam(":imagen",$imagen);

	if($stmt->execute()){
		$uploaddir = '/usr/share/nginx/html/IOCDesign-Github/Articulos/';
		$uploadfile = $uploaddir.basename($_FILES['foto']['name']);
		if(move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)){
		}
	}
	$stmt2 = $conn->prepare("SELECT MAX(id_imagen) id FROM imagen");
	$stmt2->execute();
	while($row = $stmt2->fetch()){
		echo " ".$row['id']; 
		$id_imagen = $row['id'];
	}
	


	$consulta = $conn->prepare("INSERT INTO articulo VALUES(DEFAULT,:titulo,:descripcion,:texto,:id_imagen,1)");
	$consulta->bindParam(":titulo",$titulo);
	$consulta->bindParam(":descripcion",$descripcion);
	$consulta->bindParam(":texto",$texto);
	$consulta->bindParam(":id_imagen",$id_imagen);
					
	$consulta->execute();

	$conn = null;
	header("location:administrador.php");
 ?>