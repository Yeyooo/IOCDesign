<?php
	require('conexion.php'); 
	$init = $_GET['inicio'];
	$pageSize = $_GET['page_size'];
    $search = $_GET['search'];


	    //total de paginas a mostrar
	    //$total_pages = ceil($cantidad_productos/$tamano_pagina);          
	    //$sentencia = productos($conn,$init,$tamano_pagina);
	    $consulta_productos = "SELECT p.id_producto AS id, url, nombre from producto p, imagen i WHERE p.id_imagen = i.id_imagen and p.nombre like '".$search."%'";
		$stm = $conn->prepare($consulta_productos);
		//$stm->bindParam(':search', $search);
		//$stm->bindParam(':init', $init);
		//$stm->bindParam(':search',$seach);
		//$stm->bindParam(':size', $pageSize);
		$stm->execute();  
	    //$sentencia->execute();
	    $contador = 0;
	    while($fila = $stm->fetch()){
	    	if ($contador==0){
	            echo "<tr>";
	        }
	        echo "<td style='text-align:center';>
	             <button type=\"button\" id=\"buttonCatalogo\" class=\"btn btn-secondary openBtn\" data-target=\"#catalogoModal\" data-toggle=\"modal\" data-container=\"body\"  data-placement=\"bottom\"  data-linkid=\"".$fila['id']."\">
	                                      <img src='Productos/".$fila['url']."' width=\"300\" height=\"300\" >
	                                </button>
	                                <p><b>".$fila['nombre']."</b></p>
	                              </td>";

	        $contador = $contador + 1;
	        if ($contador==3){
	           $contador = 0;
	        echo "</tr>";
	        }
	    }
	

?>
