<?php
$flujo = $_GET["flujo"];
$proceso = $_GET["proceso"];
include "conexion.inc.php";
$sql="select * from flujo ";
$sql.="where flujo='".$flujo."' and ";
$sql.="proceso='".$proceso."'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$pantalla=$fila["pantalla"];
$tipo=$fila["tipo"];
include $pantalla.".datos.inc.php";
?>

<form method="GET" action="motor.php">
	<?php 
	include $pantalla.".inc.php";
	?>
	<input type="hidden" value="<?php echo $pantalla;?>" name="pantalla"/>
	<input type="hidden" value="<?php echo $flujo;?>" name="flujo"/>
	<input type="hidden" value="<?php echo $proceso;?>" name="proceso"/>
	<input type="hidden" value="<?php echo $tipo;?>" name="tipo"/>
	<br/>
	<?php
	if ($tipo=="C")
	{
	?>
	<input type="submit" value="Si" name="Si"/>
	<input type="submit" value="No" name="No"/>
	<?php
	}
	else
	{
	?>
	<input type="submit" value="Anterior" name="Anterior"/>
	<input type="submit" value="Siguiente" name="Siguiente"/>
	<?php
	}
	?>
</form>
