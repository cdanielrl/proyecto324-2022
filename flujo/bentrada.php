<?php
include "conexion.inc.php";
include "header.inc.php";
session_start();
$usuario=$_SESSION["usuario"];
$rol=$_SESSION["rol"];
$sql="select * from flujotramite ";
$sql.="where usuario='".$usuario."' and fechafin is null";
$resultado=mysqli_query($con, $sql);
?>
<table>
<tr>
	<td>Flujo</td>
	<td>Proceso</td>
	<td>No.tramite</td>
	<td>fecha Inicial</td>
	<td>fecha Final</td>
	<td>Ir</td>
</tr>
<?php 
while ($fila=mysqli_fetch_array($resultado))
{
  echo "<tr>";
  echo "<td>".$fila["flujo"]."</td>";
  echo "<td>".$fila["proceso"]."</td>";
  echo "<td>".$fila["nro_tramite"]."</td>";
  echo "<td>".$fila["fechaini"]."</td>";
  echo "<td>".$fila["fechafin"]."</td>";
  $sql2="select pantalla from flujo where flujo='".$fila["flujo"]."' and proceso='".$fila["proceso"]."';";
  $resultado2=mysqli_query($con, $sql2);
  $fila2=mysqli_fetch_array($resultado2);
  echo "<td><a href='flujo.php?flujo=".$fila["flujo"]."&proceso=".$fila["proceso"]."&pantalla=".$fila2["pantalla"]."'>Ir</td>";
  echo "</tr>";
}
?>
</table>
<?php 
include $rol.".menu.inc.php";
?>
<a href="logoutcontrol.php">Salir</a>
<?php 
include "footer.inc.php";
?>