<?php
include "conexion.inc.php";
$sql="SELECT * FROM financiero.solicitante ";
if(isset($_GET["id"])) {
    $id=$_GET["id"];
    $sql.=" WHERE id ='".$id."';";
}
$resultadofi=mysqli_query($con, $sql);
$filafi=mysqli_fetch_array($resultadofi);
$id=$filafi["id"];
$nombrecompleto=$filafi["nombrecompleto"];
$ingresos=$filafi["ingresos"];
$dependiente=$filafi["dependiente"];
$montoprestamo=$filafi["montoprestamo"];
?>