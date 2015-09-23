<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();
$ID=$_REQUEST['id'];
$Sql="UPDATE  transporte set estado='06' WHERE idtransporte='$ID'";

$result=mysql_query($Sql);

if (!$result) {echo "error";}
else
{

header('Location: /transporte/pages/unidad-transporte');
}



 ?>