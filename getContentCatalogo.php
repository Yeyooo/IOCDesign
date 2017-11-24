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
        $query = $db->query("SELECT p.id_producto,c.nombre AS categoria, p.nombre, url, descripcion, precio FROM producto p, imagen i, categoria c WHERE p.id_categoria= c.id_categoria AND p.id_producto= $id AND p.id_imagen = i.id_imagen");
        
        if($query->num_rows > 0){
            $fila = $query->fetch_assoc();
            echo"<div class=\"table\">
                    <table>
                      <tr>
                        <h3 class=\"text-center\" id=\"nombreProducto\"><b>".$fila['nombre']."</b></h3> 
                      </tr>
                      <tr>
                        <center>
                        <img src='Productos/".$fila['nombre'].".jpg' id=img_modal width='450' height='450'>  
                        </center>
                      </tr>
                      <tr>
                        <tr>
                          <td>
                            <label id=\"labelCategoria\"><b> Categoria:</b> ".$fila['categoria']."</label>
                          </td>
                          <td>
                            <label id=\"labelPrecio\"><b> Precio:</b> $ ".$fila['precio']."</label>
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