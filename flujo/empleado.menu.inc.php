Empleado de la Entidad Financiera<br>
Registrar nuevo solicitante<br>
<form method="GET" action="motor.php">
    <input type="hidden" id="flujo" name="flujo" value="prestamo">
    <input type="hidden" id="proceso" name="proceso" value="ingresar_datos">
    <input type="hidden" id="pantalla" name="pantalla" value="datos">
    <input type="hidden" id="Siguiente" name="Siguiente" value="siguiente">
<?php include "datos.inc.php"; ?>
    <input type="submit" value="Grabar" name="grabar"/>
</form>