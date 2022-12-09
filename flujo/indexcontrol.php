<?php
$usuario=$_GET["usuario"];
$contrasenia=$_GET["contrasenia"];
if ($usuario=='moises' and $contrasenia=='123456')
{
	session_start();
	$_SESSION["usuario"]=$usuario;
	$_SESSION["rol"]='alumno';
	echo "2";
	header("Location: bentrada.php");
	exit;
}
if ($usuario=='maria' and $contrasenia=='123456')
{
	session_start();
	$_SESSION["usuario"]=$usuario;
	$_SESSION["rol"]='kardex';
	header("Location: bentrada.php");
	exit;
}
header("Location: index.php");
?>