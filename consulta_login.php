<?php
$admin = $_POST['admin'];
$pass = $_POST['pass'];

require("conexion.php");

$stmt = $conn->prepare("SELECT correo,password FROM usuario_admin WHERE correo = :admin");
$stmt->bindParam(":admin",$admin);
$stmt->execute();
$row = $stmt->fetch();

if($admin == $row['correo'] && $pass == $row['password']){
	//asume un sólo usuario con el id dado
	session_start();
	header("location:administrador.php");

}else{
?>
	<!-- Este es un comentario en HTML                                -->
	<!-- Declaración de tipod e documento                             -->
	<!DOCTYPE html>
	<!-- Inicio del código HTML                                       --> 
	<html>

	<!-- Inicio del encabezado HTML                                   --> 
	<head>
	<title> Acceso Denegado </title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<style>
	p {color:black; width:80%; margin-left:20px;}
	</style>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>

	<!-- Inicio del contenido HTML                                   --> 
	<body>

		<p class=importante> Usuario no encontrado </p>
		<p> <a href="login.php">Intentar nuevamente. </a> </p>
	</body>
	</html>

<?php
}
$conn = null;
?>