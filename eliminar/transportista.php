<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();
$ID=$_REQUEST['id'];
$Sql="UPDATE proveedor set estado='06' WHERE idproveedor='$ID'";

$result=mysql_query($Sql);

if (!$result) {echo "error";}
else
{

header('Location: /transporte/pages/transportista');
}



 ?>