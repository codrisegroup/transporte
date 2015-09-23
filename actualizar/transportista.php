<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();
$ID=$_REQUEST['id'];
$RUC=$_REQUEST['ruc'];
$RAZONSOCIAL=$_REQUEST['razonsocial'];
$CONTACTO=$_REQUEST['contacto'];
$DIRECCION=$_REQUEST['direccion'];
$TELEFONO=$_REQUEST['telefono'];

$Sql="UPDATE  proveedor SET ruc='$RUC',
razonsocial='$RAZONSOCIAL',contacto='$CONTACTO',
direccion='$DIRECCION',telefono='$TELEFONO' WHERE 
idproveedor='$ID'";

$result=mysql_query($Sql);

if (!$result) {echo "error";}
else
{

header('Location: /transporte/pages/transportista');
}



 ?>