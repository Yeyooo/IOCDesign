<!DOCTYPE html >
<html lang="ES-es">
<head>
	<title>Añadir Vídeo</title>
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
	/*color: #ffffff;*/
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

</script>
<body>
	<br/>
	<br/>
	<h1>IOC Design</h1>
	<br/>
	<br/>
	<h2>Agregando Vídeo</h2>
	<div>
		<form name="videos" action="agregar_video.php" method="post">
			<br/>
			Título: <input type="text" name="titulo"><br/><br/>
			Descripción: <br/><textarea rows = "5" cols = "50" name = "descripcion"></textarea><br/><br/>
         	Categoría: <select name = "categoria">
            <option value = "Workshop" onclick="habilitar(1)">Workshop</option>
            <option value = "Tutorial" onclick="habilitar(0)" selected>Tutorial</option>
         	</select><br/><br/>
         	Fecha: <input type="date" name="fecha" disabled><br/><br/>
         	Lugar: <input type="text" name="lugar" disabled><br/><br/>
         	URL Vídeo: <input type="text" name="url"><br/><br/>
         	<input type = "submit" name = "submit" value = "Publicar" />			 	
		</form>
	</div>
</body>
</html>