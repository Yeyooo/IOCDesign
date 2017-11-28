<?php
	require("conexion.php");

	if($conn){
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];
		$categoria = $_POST['categoria'];
		if($categoria == "Workshop"){
			$fecha = $_POST['fecha'];
			$lugar = $_POST['lugar'];
		}
		$url = $_POST['url'];
	}

	//Se inserta la primera consulta en la tabla video
	$stmt4 = $conn->prepare("INSERT INTO video VALUES(DEFAULT,:titulo,:descripcion,:url,1)");
	$stmt4->bindParam(":titulo",$titulo);
	$stmt4->bindParam(":descripcion",$descripcion);
	$stmt4->bindParam(":url",$url);
	$stmt4->execute();
	
	//Al ser id autoincremental es necesario seleccionar el maximo, ya que asi se obtiene el ultimo insertado
	$stmt2 = $conn->prepare("SELECT MAX(id_video) id FROM video");
	$stmt2->execute();
	while($row = $stmt2->fetch()){
		$id_video = $row['id'];
	}

	//Se determina la insercion segun la categoria seleccionada
	if($categoria == "Workshop"){
		$consulta = $conn->prepare("INSERT INTO workshop VALUES(DEFAULT,:titulo,:descripcion,:fecha,:lugar,1)");
		$consulta->bindParam(":titulo",$titulo);
		$consulta->bindParam(":descripcion",$descripcion);
		$consulta->bindParam(":fecha",$fecha);
		$consulta->bindParam(":lugar",$lugar);		
		$consulta->execute();

		$consulta_workshop = $conn->prepare("SELECT MAX(id_workshop) id FROM workshop");
		$consulta_workshop->execute();
		while ($row = $consulta_workshop->fetch()) {
			$id_workshop = $row['id'];
		}

		$consulta_workshop = $conn->prepare("INSERT INTO video_es_workshop VALUES(:id_video,:id_workshop)");
		$consulta_workshop->bindParam(":id_video",$id_video);
		$consulta_workshop->bindParam(":id_workshop",$id_workshop);
		$consulta_workshop->execute();
	}else{
		$consulta = $conn->prepare("INSERT INTO tutorial VALUES(DEFAULT,:titulo,:descripcion,1)");
		$consulta->bindParam(":titulo",$titulo);
		$consulta->bindParam(":descripcion",$descripcion);
		$consulta->execute();

		$consulta_tutorial = $conn->prepare("SELECT MAX(id_tutorial) id FROM tutorial");
		$consulta_tutorial->execute();
		while ($row = $consulta_tutorial->fetch()) {
			$id_tutorial = $row['id'];
		}

		$consulta_tutorial = $conn->prepare("INSERT INTO video_es_parte_de_tutorial VALUES(:id_video,:id_tutorial)");
		$consulta_tutorial->bindParam(":id_video",$id_video);
		$consulta_tutorial->bindParam("id_tutorial",$id_tutorial);
		$consulta_tutorial->execute();
	}
	
	$conn = null;
	header("location:administrador.php");
 ?>