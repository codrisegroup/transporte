<?php 
include('../bd/conexionMYSQL.php');
$link=Conectarse();
 $ID=$_REQUEST[id]; 
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

$Sql="UPDATE reporte_transporte set 
proveedor_idproveedor='$TRANSPORTISTA',
transporte_idtransporte='$UNIDAD',
fecha_reporte='$FECHA',
maeprov_idmaeprov='$PROVEEDOR',
maecli_idmaecli='$CLIENTE',
costo_reporte='$COSTO',
centcos_reporte='$CENTRO_COSTO',
ot_reporte='$OT',
documento_reporte='$DOCUMENTO',
guia_reporte='$GUIA',
comentario_reporte='$COMENTARIO' WHERE
idreporte_transporte='$ID'";
$result=mysql_query($Sql);

if (!$result) {echo "error";}
else{
header('Location: /transporte/consulta/registro');

 }
?>