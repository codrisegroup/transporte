<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();

$CODIGO=$_REQUEST[codigo];
$REQUERIMIENTO=$_REQUEST[requerimiento];
$SQL="UPDATE reporte_cab set requerimiento='$REQUERIMIENTO'
WHERE codigo_reporte='$CODIGO'";

$result=mysql_query($SQL);

if (!$result) {echo "error";}
else
{
header('Location: /transporte/pages/detalle-reporte?codigo='.urlencode($CODIGO));

}




 ?>
 ?>