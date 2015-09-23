<?php
include('../bd/conexionMYSQL.php');
$link=Conectarse();
 $ID=$_REQUEST[id];
 $ITEM=$_REQUEST[item];
 $CODIGO=$_REQUEST[codigo];
 $DIRECCION=$_REQUEST[direccion];
  $DISTRITO=$_REQUEST[distrito];
 $COMENTARIO=$_REQUEST[comentario];

$SQL="UPDATE reporte_det  SET distrito='$DISTRITO',comentario='$COMENTARIO',
item='$ITEM',
direccion='$DIRECCION' WHERE idreporte_cab='$ID'";

$result=mysql_query($SQL);
if (!$result)
 {
	echo "error";
 }

else
{

header('Location: /transporte/pages/detalle-reporte?codigo='.urlencode($CODIGO));	
}

 ?>