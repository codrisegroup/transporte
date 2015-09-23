<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();
$RUC=$_REQUEST['ruc'];
$RAZONSOCIAL=$_REQUEST['razonsocial'];
$CONTACTO=$_REQUEST['contacto'];
$DIRECCION=$_REQUEST['direccion'];
$TELEFONO=$_REQUEST['telefono'];

$Sql="INSERT INTO proveedor(ruc,razonsocial,contacto,
	direccion,telefono,fecha_creacion,estado)
VALUES('$RUC','$RAZONSOCIAL','$CONTACTO',
	'$DIRECCION','$TELEFONO',now(),'00')";

$result=mysql_query($Sql);

if (!$result) {echo "error";}
else
{

header('Location: /transporte/pages/transportista');
}



 ?>