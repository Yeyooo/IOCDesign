<!--Conexión con la base de datos-->
<?php
  $usuario = "invitado3";
  $passwd = "admin";
  try {
    $conn = new PDO("mysql:host=localhost;dbname=pagina;charset=utf8", $usuario, $passwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
  }
 function productos($conn,$init,$page_size){
	$consulta_productos = "SELECT p.id_producto AS id,c.nombre AS categoria, p.nombre, url, descripcion, precio FROM producto p, imagen i, categoria c WHERE p.id_categoria= c.id_categoria AND p.id_imagen = i.id_imagen LIMIT :init, :size";
	$stm = $conn->prepare($consulta_productos);
	$stm->bindParam(':init', $init, PDO::PARAM_INT);
	$stm->bindParam(':size', $page_size, PDO::PARAM_INT);
	$stm->execute();
	return $stm;
}

function cantidadProductos($conn){
	$consulta_productos = "SELECT * FROM producto";
	$stm = $conn->prepare($consulta_productos);
	$stm->execute();
	$cantidad_productos = $stm->rowCount();
	return $cantidad_productos;
}



?>

<!doctype html>
<html lang="ES-es">
  <head><title>IOC Design</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
    <script src="jquery.youtubecoverphoto.js"></script>
  </head>
  <body onload = "cargarCatalogo()">
    <script>
            //SCRIPT DE FB COPIEN DESPUES DE BODY EN CUALQUIER WEA
          (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11';
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

  <script type="text/javascript">
    
    function cargarCatalogo(){

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
            document.getElementById("Centro").innerHTML=xmlhttp.responseText;
          }
        }
        xmlhttp.open("GET","paginaTest.php?inicio=1&page_size=2&categoria=0");
        xmlhttp.send();
    }

    function cargarCatalogoParametrizado(categoriaEntrante){

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
            document.getElementById("Centro").innerHTML=xmlhttp.responseText;
          }
        }
        xmlhttp.open("GET","paginaTest.php?inicio=1&page_size=2&categoria="+categoriaEntrante);
        xmlhttp.send();
    }  

  </script>
      <h1>IOC Design</h1>

      <div id="header">
            <nav id="nav">
              <ul>
                <li><a href="index.php"><img src="Iconos/home.png" height="25" width="25">Home</a></li>
                <li class="current"><a href="catalogo.php"><img src="Iconos/catalogo.png">Catálogo</a></li>
                <li><a href="articulo.php"><img src="Iconos/articulos.png">Artículos</a></li>
                <li><a href="videos.php"><img src="Iconos/video.png">Videos</a></li>
                <li><a id="buttonContacto" class ="openBtn" data-target="#contactoModal" data-toggle="modal" data-container="body" data-toggle="popover"><img src="Iconos/contacto.png">Contacto</a></li>
              </ul>
            </nav>
      </div>
      <!--Barra de Búsqueda-->
      <nav class="navbar">
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorías
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <?php 
                $consulta = $conn->prepare("SELECT * FROM categoria");
                $consulta->execute();
                while($categorias = $consulta->fetch()){
                  echo "<button class = \"dropdown-item\" onclick=\"cargarCatalogoParametrizado(".$categorias['id_categoria'].")\">".$categorias['nombre']."</button>";
                }
           ?>
          </div>
        </div>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Fecha
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Categoría 1</a>
            <a class="dropdown-item" href="#">Categoría 2</a>
            <a class="dropdown-item" href="#">Categoría 3</a>
          </div>
        </div>
        </div>

      </nav>


    <h2>Catálogo</h2>

      <br/>
      <br/>
      <center>
          <div>
              <table id = "Centro">
              </table>    
          </div>

      </center>   

	<div>
	<center>
		<table>
		</table>
	</center>
	</div>
	  
      <br/>
      <br/>
      <br/>
      <br/>

      <!--CAMBIAR POR EL CONTACTO FOOTER-->
      <footer class="container-fluid">
          <h2>Contacto</h2>
          <footer class="container-fluid">
              <div class="contacto">
                <img src="images/IOC-3.jpg" width="250" height="300">
              </div>
              <div>
                <p>Ignacio Olivares Cerda</p>
                <p>Diseñador Gráfico</p>
                <p>+56972560403</p>
              </div>
              <div>
                <p><img src="Iconos/fb.png" width="50" height="50"></p>
                <p><img src="Iconos/tw.png" width="50" height="50"></p>
                <p><img src="Iconos/linkedin.png" width="50" height="50"></p>
              </div>
          </footer>
      </footer>

    <div class="modal" id="catalogoModal" tabindex="-1">
      	<div class="modal-dialog modal-lg">
        		<div class="modal-content">
      	    		<div class="modal-header">
        	    			<button class="close" data-dismiss="modal">&times;</button>
        	    			<h4 class="modal-title"></h4>	
      	    		</div>
      	    		<div class="modal-body">
                </div> 
      	    		<div class="modal-footer">
        	    			<button class="btn btn-primary" data-dismiss="modal" align="center">Close</button>
            				<a class="fb-share-button" href="http://192.168.223.5/Plantilla_proyecto/getContentCatalogo.php?id=2"
                    data-layout="button"></a>
                    <a class="twitter-share-button" href="https://twitter.com/share"
                    data-size = "large" data-text = "Holi" data-url = "www.google.cl" target= "_blank" onclick="window.open(this.href,this.target,'width=720,height=400')"> Tweet</a>
          			</div>
          		</div>
      	</div>
    </div>



    <div class="modal" id="contactoModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Contacto</h4> 
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                </div>  
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal" align="left">ENVIAR</button>
                </div>
              </div>
        </div>
    </div>  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script>
        $(document).ready(function(){
          //$('[data-toggle="popover"]').popover();
          $('.openBtn').on('click',function(){
            if (this.id=="buttonCatalogo"){
              var cadena = 'getContentCatalogo.php?id=' + this.dataset.linkid ;
              $('.modal-body').load(cadena,function(){
                $('#catalogoModal').modal({show:true});
              });
            }else if(this.id=="buttonContacto"){
              var cadena = 'getContentContacto.php';
              $('.modal-body').load(cadena,function(){
                $('#contactoModal').modal({show:true});
              });
            }
          });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<script src="js/modal.js"></script>
  </body>
</html>