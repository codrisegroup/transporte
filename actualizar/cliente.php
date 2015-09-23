<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();

$ID=$_REQUEST[id];
$CODIGO=$_REQUEST[codigo];
$RUC=$_REQUEST[ruc];
$ALIAS=$_REQUEST[alias];
$NOMBRE=$_REQUEST[nombre];
$DIRECCION=$_REQUEST[direccion];
$TELEFONO=$_REQUEST[telefono];
$REPRESENTANTE=$_REQUEST[representante];
$DISTRITO=$_REQUEST[distrito];
$SQL="UPDATE maecli set codigo='$CODIGO',
ruc='$RUC',alias='$ALIAS',nombre='$NOMBRE',
direccion='$DIRECCION',telefono='$TELEFONO',
representante='$REPRESENTANTE',
distritos_iddistritos='$DISTRITO' WHERE idmaecli='$ID'";

$result=mysql_query($SQL);

if (!$result) {echo "error";}
else
{
header('Location: /transporte/consulta/cliente');

}




 ?>