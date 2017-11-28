<?php 
	
	require("conexion.php");

	$consulta_datos = $conn->prepare("SELECT titulo FROM video");
?>
<!DOCTYPE html >
<html lang="ES-es">
<head>
	<title>Actualizar Vídeo</title>
	<meta charset="utf-8">
</head>
<style>
p {
	color:black; width:80%; margin-left:20px;
}

div{
	border: 2px solid black;
	padding: 40px 40px 40px 40px;
	width: 500px;
	margin: 10px 100px 100px 400px;
}

h1{
	text-align: center;
	color: black;
    font-family: Georgia;
    font-weight: 600;
    text-transform: uppercase;
}

h2{
	text-align: center;
	color: black;
	padding-left: 20px;
    font-family: Georgia;
}

</style>
<script>
var x = 0;

function habilitar(value){
	if(value == 1){
		document.videos.fecha.disabled = false;
		document.videos.lugar.disabled = false;
	}
	else{
		document.videos.fecha.disabled = true;
		document.videos.lugar.disabled = true;
	}
}

function cargarDatos(value){



}

</script>
<body>
	<br/>
	<br/>
	<h1>IOC Design</h1>
	<br/>
	<br/>
	<h2>Actualizando Vídeos</h2>
	<div>
		<form name="videos" action="actualizar_video.php" method="post">
			<?php 
				$consulta_datos->execute();
				$index = 1;
				echo "<select name=\"titulos\">";
				while($row = $consulta_datos->fetch()){
					echo "<option onclick = 'cargarDatos(".$index.")'>".$row['titulo']."</option>";		
				}
				echo "</select>";
				$conn = null;
			?>
			<br/>
			<br/>
			Título: <input type="text" name="titulo"><br/><br/>
			Descripción: <br/><textarea rows = "5" cols = "70" name = "descripcion"></textarea><br/><br/>
         	Categoría: <select name = "categoria">
            <option value = "Workshop" onclick="habilitar(1)">Workshop</option>
            <option value = "Tutorial" onclick="habilitar(0)" selected>Tutorial</option>
         	</select><br/><br/>
         	Fecha: <input type="date" name="fecha" disabled><br/><br/>
         	Lugar: <input type="text" name="lugar" disabled><br/><br/>
         	URL Vídeo: <input type="text" name="url"><br/><br/>
         	Publicado: <input type="checkbox" name="publicado" value="si">Sí <br/><br/>
         	<input type = "submit" name = "submit" value = "Actualizar" />			 	
		</form>
	</div>
</body>
</html>