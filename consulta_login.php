<?php
$admin = $_POST['admin'];
$pass = $_POST['pass'];

$usuario_bd = 'seba';
$passwd_bd = 'seba123';
try {
    $conn = new PDO('mysql:host=localhost;dbname=pagina;charset=utf8', $usuario_bd, $passwd_bd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
//    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

$stmt = $conn->prepare("SELECT name,password FROM members WHERE name = :admin");
$stmt->bindParam(":admin",$admin);
$stmt->execute();
$row = $stmt->fetch();

if($admin == $row['name'] && $pass == $row['password']){
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