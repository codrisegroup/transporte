<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();
$NOMBRE=$_REQUEST['nombre'];
$DESCRIPCION=$_REQUEST['descripcion'];

$Sql="INSERT INTO transporte(nombre,descripcion,fecha_creacion,estado)
VALUES('$NOMBRE','$DESCRIPCION',now(),'00')";

$result=mysql_query($Sql);

if (!$result) {echo "error";}
else
{

header('Location: /transporte/pages/unidad-transporte');
}



 ?>