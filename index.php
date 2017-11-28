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
?>
<!doctype html>
<html lang="ES-es">
  <head>
    <title>IOC Design</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
    <script src="jquery.youtubecoverphoto.js"></script>
  </head>
  <body >
  	<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11';
			  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
      <br/>
      <br/>
      <h1>IOC Design</h1>
      <br/>
      <br/>
      <div><a href="login.php"><img src="Iconos/icono-articulo.png" width="25" height="25"></a></div>

      <div id="header">
      <nav id="nav">
              <ul>
               	<li class="current"><a href="index.php"><img src="Iconos/home.png" height="25" width="25">  Home</a></li>
                <li><a href="catalogo.php"><img src="Iconos/catalogo.png">Catálogo</a></li>
                <li><a href="articulo.php"><img src="Iconos/articulos.png">Artículos</a></li>
                <li><a href="videos.php"><img src="Iconos/video.png">Workshops</a></li>
                <li><a href="tutoriales.php"><img src="Iconos/video.png">Tutoriales</a></li>
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
      </nav>


    <h2>Catálogo</h2>
			<?php 
            	$sentencia = $conn->prepare("SELECT p.id_producto AS id,c.nombre AS categoria, p.nombre AS nombre, url, descripcion, precio FROM producto p, imagen i, categoria c WHERE p.id_categoria= c.id_categoria AND p.id_imagen = i.id_imagen LIMIT 0,6");
          	?>
        <center>
			  	<div class="catalogo">
			        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			          <div class="carousel-inner">
			                <?php
					            $sentencia->execute();
					            $contador=0;
					            while($fila = $sentencia->fetch()){
					            	if($contador==0){
					            		echo "<div class=\"carousel-item active\">
			              						<img id=\"buttonCatalogo\" class=\"d-block w-100 openBtn\" src=\"Productos/".$fila['nombre'].".jpg\" data-target=\"#catalogoModal\" data-toggle=\"modal\" data-container=\"body\" data-linkid=\"".$fila['id']."\" height=\"650\">
			            					  </div>";
			            	
					            	}else{
										echo "<div class=\"carousel-item\">
						            			<img id=\"buttonCatalogo\" class=\"d-block w-100 openBtn\" src=\"Productos/".$fila['nombre'].".jpg\" data-target=\"#catalogoModal\" data-toggle=\"modal\" data-container=\"body\" data-linkid=\"".$fila['id']."\" height=\"650\">
										  	</div>";
					            	}
					            	$contador=$contador+1;
						        }
				            	$conn = null;
				           	?>    
			          </div>
			          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			            <span class="sr-only">Previous</span>
			          </a>
			          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			            <span class="carousel-control-next-icon" aria-hidden="true"></span>
			            <span class="sr-only">Next</span>
			          </a>
			        </div>
		      	</div>
		</center>
		
		      <br/>
		      <br/>
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
				?>
		        <?php 
		            $sentencia = $conn->prepare("SELECT p.id_producto AS id,c.nombre AS categoria, p.nombre, url, descripcion, precio FROM producto p, imagen i, categoria c WHERE p.id_categoria= c.id_categoria AND p.id_imagen = i.id_imagen LIMIT 0,6");
		          ?>

		<center>    
		    <div>
			    <table>
			        <?php 
			     		$sentencia->execute();
			            $contador = 0;
			            while($fila = $sentencia->fetch()){
			                if ($contador==0){
			                    echo "<tr>";
			                }
			                echo "<td>

				                	<button type=\"button\" id=\"buttonCatalogo\" class=\"btn btn-secondary openBtn\" data-target=\"#catalogoModal\" data-toggle=\"modal\" data-container=\"body\"  data-placement=\"bottom\"  data-linkid=\"".$fila['id']."\">
				                		<img src='Productos/".$fila['nombre'].".jpg' width=\"300\" height=\"300\">
				                	</button>
			                	</td>";

			                $contador = $contador + 1;
			                if ($contador==3){
			                    $contador = 0;
			                    echo "</tr>";
			                }
			            }
			            $conn = null;
			        ?>
			    </table>    
		    </div>
      </center>

      <br/>
      <br/>
     
    <h2>Workshops</h2>
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
			?>
          	<?php 
                $sentencia = $conn->prepare("SELECT v.id_video, w.titulo, v.titulo, w.descripcion, fecha, lugar, url FROM workshop w, video v, video_es_workshop vw WHERE w.id_workshop = vw.id_workshop AND vw.id_video = v.id_video");
            ?>

      	<center>
          	<div>
	            <table>
	              	<?php 
	                	$sentencia->execute();
	                	$contador = 0;
	                	while($fila = $sentencia->fetch()){
		                    if ($contador==0){
		                        echo "<tr>";
		                    }
		                    echo "<td style='text-align:center';>
		                         	<img class=\"btn btn-secondary openBtn\" src=\"\" data-youtube-id=\"".$fila['url']."\" id=\"video".$fila['id_video']."\" width=\"300\" height=\"300\" data-target=\"#videoModal\" data-toggle=\"modal\" data-linkid=\"".$fila['id_video']."\">
				                    <script> $(\"#video".$fila['id_video']."\").youtubeCoverPhoto({useMaxRes: false});</script>
				                    <p><b>".$fila['titulo']."</b></p>
				                    <p>Lugar: ".$fila['lugar']."</p>
				                    <p>Fecha: ".$fila['fecha']."</p>
				                    <p>Estado: .... </p>
		                    	</td>";
		                    $contador = $contador + 1;
		                    if ($contador==3){
		                        $contador = 0;
		                        echo "</tr>";
	                    	}
	                	}
	                	$conn = null;
	               ?>
	            </table>    
          	</div>
      	</center>   
      <br/>
      <br/>


    <h2>Articulos</h2>
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
			?>
	       	<?php 
	            $sentencia = $conn->prepare("SELECT a.id_articulo AS id, titulo, descripcion, texto, url from articulo a, imagen i where a.id_imagen = i.id_imagen LIMIT 0,3");
	        ?>
   	    <center>
   	   	    <div>
		        <table>
		            <?php 
		                $sentencia->execute();
		                $contador = 0;
		                while($fila = $sentencia->fetch()){
		                    if ($contador==0){
		                        echo "<tr>";
		                    }
		                    echo "<td style='text-align:center';>
		                            	<button type=\"button\" id=\"buttonArticulo\" class=\"btn btn-secondary openBtn\" data-target=\"#articuloModal\" data-toggle=\"modal\" data-container=\"body\"  data-placement=\"bottom\"  data-linkid=\"".$fila['id']."\">
		                                        <img src='Articulos/".$fila['url']."' width=\"300\" height=\"300\">
		                                </button>
		                                <p><b>".$fila['titulo']."</b></p>
		                            </td>";
		                    $contador = $contador + 1;
		                    if ($contador==3){
		                          $contador = 0;
		                          echo "</tr>";
		                    }
		                }
		                $conn = null;
		            ?>
		        </table>    
	      	</div>
      	</center>      
      
    <br/>
    <br/>

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
	        <div class="grow">
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
                    data-size = "large" data-text = "Holi" data-url = "www.google.cl"> Tweet</a>
		        </div>
	        </div>
	    </div>
    </div>
    <div class="modal" id="articuloModal" tabindex="-1">
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
                    data-size = "large" data-text = "Holi" data-url = "www.google.cl"> Tweet</a>
          			</div>
        		</div>
      	</div>
    </div>
  	<div class="modal" id="videoModal" tabindex="-1">
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
                    data-size = "large" data-text = "Holi" data-url = "www.google.cl"> Tweet</a>
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

    <script>
        $(document).ready(function(){
          $('.openBtn').on('click',function(){
            if (this.id=="buttonCatalogo"){
              var cadena = 'getContentCatalogo.php?id=' + this.dataset.linkid ;
              $('.modal-body').load(cadena,function(){
                $('#catalogoModal').modal({show:true});
              });
            }else if (this.id=="buttonArticulo"){
              var cadena = 'getContentArticulo.php?id=' + this.dataset.linkid ;
              $('.modal-body').load(cadena,function(){
                $('#articuloModal').modal({show:true});
              });
            }else if(this.id=="buttonContacto"){
              var cadena = 'getContentContacto.php';
              $('.modal-body').load(cadena,function(){
                $('#contactoModal').modal({show:true});
              });
            }else{
              var cadena = 'getContentVideo.php?id=' + this.dataset.linkid ;
              $('.modal-body').load(cadena,function(){
                  $('#videoModal').modal({show:true});
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