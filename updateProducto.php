<?php 
	
	require("conexion.php");

	$consulta_datos = $conn->prepare("SELECT nombre FROM producto");
?>
<!DOCTYPE html >
<html lang="ES-es">
<head>
	<title>Actualizar Producto</title>
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
	cargarNombre(id);
	cargarDescripcion(id);
	cargarCategoria(id);
	cargarImagen(id);
	cargarPrecio(id);
	cargarDisponible(id);
}

function cargarID(id){
	document.productos.id_producto.value = id;
}

function cargarNombre(id){
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
	    	document.getElementById("Nombre").value=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","mostrar_nombreProducto.php?id="+id,true);
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
	xmlhttp.open("GET","mostrar_descripcionProducto.php?id="+id,true);
	xmlhttp.send();
}

function cargarCategoria(id){
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
	    	document.getElementById("Categoria").value=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","mostrar_categoriaProducto.php?id="+id,true);
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
	xmlhttp.open("GET","mostrar_imagenProducto.php?id="+id,true);
	xmlhttp.send();
}

function cargarPrecio(id){
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
	    	document.productos.precio.value=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","mostrar_precioProducto.php?id="+id,true);
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
	    	document.productos.publicado.checked=disponible;
	    }
	  }
	xmlhttp.open("GET","mostrar_disponibleProducto.php?id="+id,true);
	xmlhttp.send();
}

</script>
<body>
	<br/>
	<br/>
	<h1>IOC Design</h1>
	<br/>
	<br/>
	<h2>Actualizando Productos</h2>
	<div>
		<form name="productos" action="actualizar_producto.php" method="post">
			<?php 
				$consulta_datos->execute();
				$index = 1;
				echo "<select name=\"nombres\">";
				while($row = $consulta_datos->fetch()){
					echo "<option onclick = 'cargarDatos(".$index.")'>".$row['nombre']."</option>";	
					$index = $index + 1;	
				}
				echo "</select>";
				$conn = null;
			?>
			<br/>
			<br/>
			ID Producto: <input type="text" name="id_producto"><br/><br/>
			Nombre Producto: <input id="Nombre" type="text" name="nombre"><br/><br/>
			Descripción: <br/><textarea id ="Descripcion" rows = "5" cols = "70" name = "descripcion"></textarea><br/><br/>
         	Categoría: <input id="Categoria" type="text" name="categoria" disabled><br/><br/>
         	Imagen: <p id="Imagen"></p><input type = "file" name = "foto"/> <br/><br/>
         	Precio: <input id="Precio" type="text" name="precio"><br/><br/>
         	Publicado: <input id="Disponible" type="checkbox" name="publicado">Sí <br/><br/>
         	<input type = "submit" name = "submit" value = "Actualizar" />				 	
		</form>
	</div>
</body>
</html>