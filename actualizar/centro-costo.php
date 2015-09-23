<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();

$ID=$_REQUEST[id];
$CENTROCOSTO=$_REQUEST[centrocosto];
$AREA=$_REQUEST[area];

$SQL="UPDATE area_cc set centro_costo='$CENTROCOSTO',
area='$AREA'
WHERE idarea_cc='$ID'";

$result=mysql_query($SQL);

if (!$result) {echo "error";}
else
{
header('Location: /transporte/consulta/centro-costo');

}




 ?>
 ?>