<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();
$nombre=$_REQUEST['nombre'];

$Sql="INSERT INTO distritos(descripcion,fecha_creacion)
VALUES('$nombre',now())";

$result=mysql_query($Sql);

if (!$result) {	echo "error"; }
else
{
	header('Location: /transporte/pages/distritos');
}

 ?>