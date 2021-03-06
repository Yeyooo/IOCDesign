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
  
function videos($conn,$init,$page_size){
	$consulta_videos = "SELECT * FROM tutorial t, video v, video_es_parte_de_tutorial vt WHERE t.id_tutorial = vt.id_tutorial and vt.id_video = v.id_video LIMIT :init, :size";
	//$consulta_videos = "SELECT id_video,titulo, url FROM video LIMIT :init, :size;";
	$stm = $conn->prepare($consulta_videos);
	$stm->bindParam(':init', $init, PDO::PARAM_INT);
	$stm->bindParam(':size', $page_size, PDO::PARAM_INT);
	$stm->execute();
	return $stm;
	}

function cantidadVideos($conn){
	$consulta_videos = "SELECT * FROM video";
	$stm = $conn->prepare($consulta_videos);
	$stm->execute();
	$cantidad_videos = $stm->rowCount();
	return $cantidad_videos;
	} 
?>

<!doctype html>
<html lang="ES-es">
  <head>
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
      <h1>IOC Design</h1>

      <div id="header">
      <nav id="nav">
              <ul> <li><a href="index.php"><img src="Iconos/home.png" height="25" width="25">Home</a></li>
                <li><a href="catalogo.php"><img src="Iconos/catalogo.png">Catálogo</a></li>
                <li><a href="articulo.php"><img src="Iconos/articulos.png">Artículos</a></li>
                <li><a href="videos.php"><img src="Iconos/video.png">Videos</a></li>
                <li class="current"><a href="tutoriales.php"><img src="Iconos/video.png">Tutoriales</a></li>
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
       
        </div>

      </nav>

      <h2>Tutoriales</h2>

      <br/>
      <br/>
          <?php 
                $cantidad_videos = cantidadVideos($conn);
				$tamano_pagina = 9; //cantidad de productos a mostrar
				if(isset($_GET['pages'])){
					$page = $_GET['pages'];
					$init = ($page-1)*$tamano_pagina;				
				}else{
					$init = 0;
					$page = 1;				
				}
				//total de paginas a mostrar
				$total_pages = ceil($cantidad_videos/$tamano_pagina);					
				$sentencia = videos($conn,$init,$tamano_pagina);
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
                          echo "<td style='text-align:center';>";
                               
                          echo "  <img class=\"btn btn-secondary openBtn\" src=\"\" data-youtube-id=\"".$fila['url']."\" id=\"video".$fila['id_video']."\" width=\"300\" height=\"300\" data-target=\"#videoModal\" data-toggle=\"modal\" data-container=\"body\" data-linkid=\"".$fila['id_video']."\">";
                          echo "<script> $(\"#video".$fila['id_video']."\").youtubeCoverPhoto({useMaxRes: false});</script>";
                          echo "<p><b>".$fila['titulo']."</b></p>";
                          //echo "<p>Lugar: ".$fila['lugar']."</p>";
                          //echo "<p>Fecha: ".$fila['fecha']."</p>";
                          //echo "<p>Estado: .... </p>";
                          echo "</td>";
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

  
    <div>
	<center>
		<table>
		<?php
			echo "<tr>";			
				if($total_pages > 1){
					if($page != 1){
						echo '<a href=" '. 'videos.php?pages='.($page - 1).'"> Anterior </a>';
					}
					for($i=1;$i<=$total_pages;$i++){
						if($page == $i){
							echo "$page";
						}
						else{
							echo '<a href=" '. 'videos.php?pages='.($i).'"> '. $i .' </a>';
						}
					}
					if($page != $total_pages){
						echo '<a href=" '. 'videos.php?pages='.($page + 1).'"> Siguiente </a>';
					}
				}			
			echo "</tr>";

		?>
		</table>
	</center>
	</div>
	  
	  
	  
      <br/>
      <br/>
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
              <div>
                  <p><img src="Iconos/fb.png" width="50" height="50"></p>
                  <p><img src="Iconos/tw.png" width="50" height="50"></p>
                  <p><img src="Iconos/linkedin.png" width="50" height="50"></p>
              </div>
          </footer>
      </footer>
      
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
 
    <script>
        $(document).ready(function(){
          //$('[data-toggle="popover"]').popover();
          $('.openBtn').on('click',function(){
            if(this.id=="buttonContacto"){
              var cadena = 'getContentContacto.php';
              $('.modal-body').load(cadena,function(){
                $('#contactoModal').modal({show:true});
              });
            }else{
              var cadena = 'getContentTutorial.php?id=' + this.dataset.linkid ;
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