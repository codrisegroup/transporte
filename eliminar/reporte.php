<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();
$CODIGO=$_REQUEST['codigo'];


$Sql="DELETE FROM  reporte_cab WHERE codigo_reporte='$CODIGO'";
$Sql1="DELETE FROM  reporte_det WHERE codigo_reporte='$CODIGO'";
$Sql2="UPDATE reporte_transporte set estado='00'
WHERE numero_reporte='$CODIGO'";
$result=mysql_query($Sql);
if (!$result) {echo "error";}
else
{
$result1=mysql_query($Sql1);
$result2=mysql_query($Sql2);
header('Location: /transporte/consulta/registro');
}



 ?>