<?php
include "conexion.inc.php";
$usuario=$_GET["usuario"];
$contrasenia=$_GET["contrasenia"];
$sql = "SELECT usuario,rol from usuarios where usuario='".$usuario."' and sha2('".$contrasenia."',224)=contrasenia_hash;";
$consulta=mysqli_query($con, $sql);
$resultado=mysqli_fetch_array($consulta);
if($resultado) {
    session_start();
	$_SESSION["usuario"]=$resultado['usuario'];
	$_SESSION["rol"]=$resultado['rol'];
	header("Location: bentrada.php");
} else {
    header("Location: index.php");
}
?>