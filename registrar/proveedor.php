<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();

 $CODIGO=$_REQUEST[codigo]; 
 $RUC=$_REQUEST[ruc];
 $ALIAS=$_REQUEST[alias];
 $NOMBRE=$_REQUEST[nombre];
 $DIRECCION=$_REQUEST[direccion];
 $TELEFONO=$_REQUEST[telefono];
 $REPRESENTANTE=$_REQUEST[representante];
 $DISTRITO=$_REQUEST[distrito];


$SQL="INSERT INTO maeprov(codigo,ruc,alias,nombre,direccion,
	telefono,representante,distritos_iddistritos)
VALUES('$CODIGO','$RUC','$ALIAS','$NOMBRE','$DIRECCION',
	'$TELEFONO','$REPRESENTANTE','$DISTRITO')";

$result=mysql_query($SQL);


if (!$result) {	echo "error";}
else
{


header('Location: /transporte/consulta/proveedor');
}




 ?>