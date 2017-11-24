<!-- Este es un comentario en HTML                                -->
<!-- Declaración de tipod e documento                             -->
<!DOCTYPE html>
<!-- Inicio del código HTML                                       --> 
<html lang="ES-es">

<!-- Inicio del encabezado HTML                                   --> 
<head>
<title> Login </title>
<link rel="stylesheet" type="text/css" href="main.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<!-- Inicio del contenido HTML                                   --> 
<body background="images/06.jpg">
<center>
<h1> LOGIN ADMINISTRADOR </h1>

<form name="nombre_usuario" action="consulta_login.php" method="post">
Administrador: <input type="text" name="admin">
Contraseña: <input type="password" name="pass">
<input type="submit" value="Ingresar">
</form>
</center>
</body>
</html>