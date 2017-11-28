<?php
	require('conexion.php'); 
	$init = $_GET['inicio'];
	$pageSize = $_GET['page_size'];
    $categoria = $_GET['categoria'];
	if($categoria > 0){
	    //total de paginas a mostrar
	    //$total_pages = ceil($cantidad_productos/$tamano_pagina);          
	    //$sentencia = productos($conn,$init,$tamano_pagina);
	    $consulta_productos = "SELECT p.id_producto AS id,c.nombre AS categoria, p.nombre, url, descripcion, precio FROM producto p, imagen i, categoria c WHERE p.id_categoria= c.id_categoria AND p.id_imagen = i.id_imagen AND c.id_categoria = :categoria";
		$stm = $conn->prepare($consulta_productos);
		//$stm->bindParam(':init', $init);
		$stm->bindParam(':categoria',$categoria);
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
	                                      <img src='Productos/".$fila['nombre'].".jpg' width=\"300\" height=\"300\" >
	                                </button>
	                                <p><b>".$fila['nombre']."</b></p>
	                                <p>Categoria: ".$fila['categoria']."</p>
	                              </td>";

	        $contador = $contador + 1;
	        if ($contador==3){
	           $contador = 0;
	        echo "</tr>";
	        }
	    }
	}
	else{
		$consulta_productos = "SELECT p.id_producto AS id,c.nombre AS categoria, p.nombre, url, descripcion, precio FROM producto p, imagen i, categoria c WHERE p.id_categoria= c.id_categoria AND p.id_imagen = i.id_imagen";
		$stm = $conn->prepare($consulta_productos);
		$stm->execute();
		$contador = 0;
		while($fila = $stm->fetch()){
	    	if ($contador==0){
	            echo "<tr>";
	        }
	        echo "<td style='text-align:center';>
	             <button type=\"button\" id=\"buttonCatalogo\" class=\"btn btn-secondary openBtn\" data-target=\"#catalogoModal\"data-toggle=\"modal\" data-container=\"body\"  data-placement=\"bottom\"  data-linkid=\"".$fila['id']."\">
	                                      <img src='Productos/".$fila['nombre'].".jpg' width=\"300\" height=\"300\" >
	                                </button>
	                                <p><b>".$fila['nombre']."</b></p>
	                                <p>Categoria: ".$fila['categoria']."</p>
	                              </td>";

	        $contador = $contador + 1;
	        if ($contador==3){
	           $contador = 0;
	        echo "</tr>";
	        }
	    }
	}
    $conn = null;

?>
