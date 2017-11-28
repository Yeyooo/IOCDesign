<?php
	require('conexion.php'); 
	$init = $_GET['inicio'];
	$pageSize = $_GET['page_size'];
	$tiempo = $_GET['tiempo'];
    $sentencia->execute();
    $contador = 0;
    //SI EL ES ASCDENTE
    if($tiempo == 1){
    	//Aqui va la consulta 
	    while($fila = $sentencia->fetch()){
	       if ($contador==0){
	            echo "<tr>";
	        }
	    	echo "<td style='text-align:center';>";          
	        echo "  <img class=\"btn btn-secondary openBtn\" src=\"\" data-youtube-id=\"".$fila['url']."\" id=\"video".$fila['id_video']."\" width=\"300\" height=\"300\" data-target=\"#videoModal\" data-toggle=\"modal\" data-container=\"body\" data-linkid=\"".$fila['id_video']."\">";
	        echo "<script> $(\"#video".$fila['id_video']."\").youtubeCoverPhoto({useMaxRes: false});</script>";
	        echo "<p><b>".$fila['titulo']."</b></p>";
	        echo "<p>Lugar: ".$fila['lugar']."</p>";
	        echo "<p>Fecha: ".$fila['fecha']."</p>";
	        echo "<p>Estado: .... </p>";
	        echo "</td>";
	        $contador = $contador + 1;
	        if ($contador==3){
	            $contador = 0;
	       		echo "</tr>";
	      	}
	    }
	}
    //SI ES DESCENDENTE
    else{
    	//Aqui la consulta con nombre $sentencia
    	 while($fila = $sentencia->fetch()){
	       if ($contador==0){
	            echo "<tr>";
	        }
	    	echo "<td style='text-align:center';>";          
	        echo "  <img class=\"btn btn-secondary openBtn\" src=\"\" data-youtube-id=\"".$fila['url']."\" id=\"video".$fila['id_video']."\" width=\"300\" height=\"300\" data-target=\"#videoModal\" data-toggle=\"modal\" data-container=\"body\" data-linkid=\"".$fila['id_video']."\">";
	        echo "<script> $(\"#video".$fila['id_video']."\").youtubeCoverPhoto({useMaxRes: false});</script>";
	        echo "<p><b>".$fila['titulo']."</b></p>";
	        echo "<p>Lugar: ".$fila['lugar']."</p>";
	        echo "<p>Fecha: ".$fila['fecha']."</p>";
	        echo "<p>Estado: .... </p>";
	        echo "</td>";
	        $contador = $contador + 1;
	        if ($contador==3){
	            $contador = 0;
	       		echo "</tr>";
	      	}
	    }
	}
?>