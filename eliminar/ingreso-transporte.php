<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();
$ID=$_REQUEST['id'];
$Sql="UPDATE reporte_transporte set estado='06' WHERE 
idreporte_transporte='$ID'";

$result=mysql_query($Sql);

if (!$result) {echo "error";}
else
{

header('Location: /transporte/consulta/registro');
}



 ?>