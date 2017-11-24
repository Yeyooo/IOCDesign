<?php
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
    $query = $db->query("SELECT *FROM articulo");
    
    if($query->num_rows > 0){
        $fila = $query->fetch_assoc();
         echo"
            <label>nombre</label>
            <input type=\"text\" name=\"nombre\" id=\"nombre\" class=\"form-control\" size=\"40\" maxlength=\"40\">
            <label>email</label>
            <input type=\"text\" name=\"email\" id=\"email\" class=\"form-control\" size=\"40\" maxlength=\"40\">
            <label>telefono</label>
            <input type=\"text\" name=\"telefono\" id=\"telefono\" class=\"form-control\" size=\"12\" maxlength=\"12\">
            <label>mensaje</label>
            <textarea class=\"form-control\" rows=\"3\"></textarea>
            ";
    }else{
        echo 'Content not found....';
    }

?>