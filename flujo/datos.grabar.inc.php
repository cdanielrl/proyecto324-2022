<?php
include "conexion.inc.php";
$id=$_GET["id"];
$nombrecompleto=$_GET["nombrecompleto"];
$ingresos=$_GET["ingresos"];
$dependiente=$_GET["dependiente"];
$montoprestamo=$_GET["montoprestamo"];
$sql="INSERT INTO solicitante (id,nombrecompleto,ingresos,dependiente,montoprestamo) ";
$sql.="VALUES (".$id.",'".$nombrecompleto."','".$ingresos."','".$dependiente."',".$montoprestamo.") ";
$sql.="ON DUPLICATE KEY UPDATE nombrecompleto='".$nombrecompleto."', ingresos=".$ingresos.", dependiente='".$dependiente."', montoprestamo=".$montoprestamo.";";
$resultadofi=mysqli_query($con, $sql);
?>