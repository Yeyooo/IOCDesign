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
        $query = $db->query("SELECT * FROM tutorial t, video v, video_es_parte_de_tutorial vt WHERE t.id_tutorial = vt.id_tutorial and vt.id_video = v.id_video and v.id_video= $id");
        
        if($query->num_rows > 0){
            $fila = $query->fetch_assoc();
            echo"<div class=\"table\">
                    <table>
                      <tr>
                        <h3 class=\"text-center\" id=\"nombreProducto\"><b>".$fila['titulo']."</b></h3> 
                      </tr>
                      <tr>
                        <center>
                          <iframe width=\"700\" height=\"450\" src=\"https://www.youtube.com/embed/".$fila['url']."\"  frameborder=\"0\" gesture=\"media\" allowfullscreen></iframe>
                        </center>
                      </tr>
                      <tr>
                        <tr>
                          <td>
                            <label id=\"labelCategoria\"><b> Categoria:</b> ......</label>
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
           echo $id_video; echo 'Content not found....';
        }
    }else{
        echo 'Content not found....';
    }
?>