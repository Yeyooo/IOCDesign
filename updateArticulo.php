<?php 
	
	require("conexion.php");

	$consulta_datos = $conn->prepare("SELECT titulo FROM articulo");
?>
<!DOCTYPE html >
<html lang="ES-es">
<head>
	<title>Actualizar Artículo</title>
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

img{
	width: 200px;
	height: 200px;
}
</style>
<script>

function cargarDatos(id){
	cargarID(id);
	cargarTitulo(id);
	cargarDescripcion(id);
	cargarTexto(id);
	cargarImagen(id);
	cargarDisponible(id);
}

function cargarID(id){
	document.articulos.id_articulo.value = id;
}

function cargarTitulo(id){
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  	xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    	document.getElementById("Titulo").value=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","mostrar_tituloArticulo.php?id="+id,true);
	xmlhttp.send();	
}

function cargarDescripcion(id){
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  	xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    	document.getElementById("Descripcion").value=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","mostrar_descripcionArticulo.php?id="+id,true);
	xmlhttp.send();
}

function cargarTexto(id){
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  	xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    	document.getElementById("Texto").value=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","mostrar_textoArticulo.php?id="+id,true);
	xmlhttp.send();
}

function cargarImagen(id){
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  	xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    	document.getElementById("Imagen").innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","mostrar_imagenArticulo.php?id="+id,true);
	xmlhttp.send();
}

function cargarDisponible(id){
	var xmlhttp;
	var disponible;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  	xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    	var estado;
	    	estado = xmlhttp.responseText;
	    	if(estado=="true"){
	    		disponible = true;
	    	}else{
	    		disponible = false;
	    	}
	    	document.articulos.publicado.checked=disponible;
	    }
	  }
	xmlhttp.open("GET","mostrar_disponibleArticulo.php?id="+id,true);
	xmlhttp.send();
}

</script>
<body>
	<br/>
	<br/>
	<h1>IOC Design</h1>
	<br/>
	<br/>
	<h2>Actualizando Artículos</h2>
	<div>
		<form name="articulos" action="actualizar_articulo.php" method="post">
			<?php 
				$consulta_datos->execute();
				$index = 1;
				echo "<select name=\"titulos\">";
				while($row = $consulta_datos->fetch()){
					echo "<option onclick = 'cargarDatos(".$index.")'>".$row['titulo']."</option>";	
					$index = $index + 1;	
				}
				echo "</select>";
				$conn = null;
			?>
			<br/>
			<br/>
			ID Artículo: <input type="text" name="id_articulo"><br/><br/>
			Título: <input id="Titulo" type="text" name="titulo"><br/><br/>
			Descripción: <br/><textarea id ="Descripcion" rows = "5" cols = "70" name = "descripcion"></textarea><br/><br/>
			Texto: <br/><textarea id="Texto" rows = "20" cols = "70" name = "texto"></textarea><br/><br/>
         	Imagen: <p id="Imagen"></p><input type = "file" name = "foto"/> <br/><br/>
         	Publicado: <input id="Disponible" type="checkbox" name="publicado">Sí <br/><br/>
         	<input type = "submit" name = "submit" value = "Actualizar" />				 	
		</form>
	</div>
</body>
</html>