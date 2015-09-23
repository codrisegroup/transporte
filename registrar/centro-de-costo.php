<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();

 $CENTROCOSTO=$_REQUEST[centrocosto]; 
 $AREA=$_REQUEST[area];

$SQL="INSERT INTO area_cc(centro_costo,area)
VALUES('$CENTROCOSTO','$AREA')";

$result=mysql_query($SQL);


if (!$result) {	echo "error";}
else
{


header('Location: /transporte/consulta/centro-costo');
}




 ?>