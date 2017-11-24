<?php
    $id=$_GET['id'];
    if(!empty($id)){
        //DB details
        $dbHost = 'localhost';
        $dbUsername = 'invitado3';
        $dbPassword = 'admin';
        $dbName = 'pagina';
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        if ($db->connect_error) {
            die("Unable to connect database: " . $db->connect_error);
        }
        //get content from database
        $query = $db->query("SELECT a.id_articulo, titulo, descripcion, texto, url from articulo a, imagen i where a.id_imagen = i.id_imagen AND a.id_articulo = $id");
        
        if($query->num_rows > 0){
            $fila = $query->fetch_assoc();
            echo"<div class=\"table\">
                    <table>
                      <tr>
                        <h3 class=\"text-center\" id=\"tituloArticulo\"><b>".$fila['titulo']."</b></h3> 
                      </tr>
                      <tr>
                        <center>
                        <img src='Articulos/".$fila['url']."'  id=img_modal width='600' height='450'>  
                        </center>
                      </tr>
                      <tr>
                        <tr>
                          <td>
                            <label id=\"labelCategoria\"><b> Categoria:</b> NO SE CONSIDERA EN LA BD!!!</label>
                          </td>
                        </tr>
                        <tr>
                            <td>
                                <article id=\"articuloDescripcion\">Descripcion: ".$fila['descripcion']."</article>
                            </td>
                        </tr>
                    </table>
                </div>";
            
        }else{
            echo 'Content not found....';
        }
    }else{
        echo 'Content not found....';
    }
?>