<?php
$sql="SELECT * FROM academico.alumno ";
$sql.="WHERE id=100";
$resultadofi=mysqli_query($con, $sql);
$filafi=mysqli_fetch_array($resultadofi);
$id=$filafi["id"];
$nombrecompleto=$filafi["nombrecompleto"];
$promedio=$filafi["promedio"];
?>