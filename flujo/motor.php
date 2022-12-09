<?php
$flujo = $_GET["flujo"];
$proceso = $_GET["proceso"];
$pantalla = $_GET["pantalla"];
include "conexion.inc.php";
include $pantalla.".grabar.inc.php";

if (isset($_GET["Siguiente"]))
{
	$sql="select flujo, proceso, proceso_siguiente as procesoselect, tipo, rol, pantalla ";
	$sql.="from flujo ";
	$sql.="where flujo='".$flujo."' and ";
	$sql.="proceso='".$proceso."'";
}
if (isset($_GET["Anterior"]))
{
	$sql="select flujo, proceso as procesoselect, proceso_siguiente, tipo, rol, pantalla ";
	$sql.="from flujo ";
	$sql.="where flujo='".$flujo."' and ";
	$sql.="proceso_siguiente='".$proceso."'";
}

if (isset($_GET["Si"]))
{
	$sql="select flujo, procesoSI as procesoselect ";
	$sql.="from flujocondicion ";
	$sql.="where flujo='".$flujo."' and ";
	$sql.="proceso='".$proceso."'";
}
if (isset($_GET["No"]))
{
	$sql="select flujo, procesoNO as procesoselect ";
	$sql.="from flujocondicion ";
	$sql.="where flujo='".$flujo."' and ";
	$sql.="proceso='".$proceso."'";
}

$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$proceso = $fila["procesoselect"];
$parametros="?flujo=".$flujo;
$parametros.="&proceso=".$proceso;
header("Location: flujo.php".$parametros);
?>