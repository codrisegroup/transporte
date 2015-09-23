<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();
echo $ID=$_REQUEST[id];
$SQL="DELETE FROM area_cc WHERE idarea_cc='$ID'";

$result=mysql_query($SQL);

if (!$result) {	echo "error";}

else

{

header('Location: /transporte/consulta/centro-costo');

}	


 ?>