<?php
$id=$_GET["id"];
$nombrecompleto=$_GET["nombrecompleto"];
$promedio=$_GET["promedio"];
$sql="UPDATE academico.alumno ";
$sql.="SET nombrecompleto='".$nombrecompleto."', ";
$sql.="promedio=".$promedio." ";
$sql.="WHERE id=".$id;
$resultadofi=mysqli_query($con, $sql);
?>