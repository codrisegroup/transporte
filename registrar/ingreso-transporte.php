<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();

 $TRANSPORTISTA=$_REQUEST[transportista];
 $FECHA=$_REQUEST[fecha];
 $UNIDAD=$_REQUEST[unidad];
 $PROVEEDOR=$_REQUEST[proveedor]; 
 $CLIENTE=$_REQUEST[cliente];
 $COSTO=$_REQUEST[costo];
 $CENTRO_COSTO=$_REQUEST[centrocosto];
 $OT=$_REQUEST[ot];
 $DOCUMENTO=$_REQUEST[documento];
 $GUIA=$_REQUEST[guia];
 $COMENTARIO=$_REQUEST[comentario];

$Sql="INSERT INTO reporte_transporte(proveedor_idproveedor,
	transporte_idtransporte,fecha_reporte,
	maeprov_idmaeprov,maecli_idmaecli,costo_reporte,
	centcos_reporte,ot_reporte,documento_reporte,guia_reporte,
	comentario_reporte)
VALUES('$TRANSPORTISTA','$UNIDAD','$FECHA','$PROVEEDOR',
	'$CLIENTE','$COSTO','$CENTRO_COSTO','$OT','$DOCUMENTO',
	'$GUIA','$COMENTARIO')";
$result=mysql_query($Sql);

if (!$result) {echo "error";}
else{
header('Location: /transporte/consulta/registro');

 }
?>