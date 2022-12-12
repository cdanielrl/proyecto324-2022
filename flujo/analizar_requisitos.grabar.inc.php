<?php
include "conexion.inc.php";
$id=$_GET["id"];
$sql="select * from flujotramite ";
$sql.="where usuario='".$usuario."' and nro_tramite=".$id.   ";";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$flujo=$fila["flujo"];
$proceso=$fila["proceso"];
$nro_tramite=$fila["nro_tramite"];
$fecha_ini=$fila["fecha_ini"];
$usuario=$fila["usuario"];

$sql="UPDATE flujotramite SET fechafin=now() WHERE nro_tramite=".$id;
$resultado=mysqli_query($con, $sql);

$id++;

$sql="select flujotramite";
$sql.="from flujo ";
$sql.="where flujo='".$flujo."' and ";
$sql.="proceso='".$proceso."'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$proceso_siguiente=$fila["proceso_siguiente"];
$sql="INSERT INTO solicitante (flujo, proceso, nro_tramite, fechaini,  usuario) ";
$sql.="VALUES (".$flujo.",'".$proceso_siguiente."','".$nro_tramite."',now(),".$usuario.") ";
$resultadofi=mysqli_query($con, $sql);
?>