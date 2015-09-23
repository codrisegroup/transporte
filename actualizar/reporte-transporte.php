<?php 

/*REALIZAMOS LA CONSULTA PARA OBTENER EL CORRELATIVO DEL ULTIMO REGISTO*/
include('../bd/conexionMYSQL.php');
$link=Conectarse();
$sql="SELECT substring(codigo_reporte,8) AS correlativo FROM reporte_cab 
 ORDER BY codigo_reporte DESC limit 1 ; ";
$result =mysql_query($sql,$link);
if ($row=mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$ID=$row[correlativo];

} while ($row =mysql_fetch_array($result));
}else { 
echo "";
} 

function ceros($numero, $ceros=2){
return sprintf("%0".$ceros."s", $numero ); 
}

$FECHA=date('Y'); 
$CORRELATIVO=$ID+1;
$NUMERO="CO".$FECHA.ceros($CORRELATIVO, 6);

$FECHAINICIO=$_REQUEST[fechainicio];
$FECHAFIN=$_REQUEST[fechafin];
$TRANSPORTISTA=$_REQUEST[transportista];

$Sql_cab="INSERT INTO reporte_cab(
codigo_reporte,	usuario_idusuario,proveedor_idproveedor,fecha_inicio,fecha_fin)
VALUES('$NUMERO','1','$TRANSPORTISTA','$FECHAINICIO','$FECHAFIN')";

$Sql_det="INSERT INTO reporte_det(transportista,
codigo_reporte,fecha,area,centro_costo,proveedor_cliente,distrito,
direccion,tipo_unidad,costo,guia,oc_os,ot,
comentario)
SELECT  p.razonsocial,'$NUMERO',r.fecha_reporte,a.area,r.centcos_reporte,
CONCAT(mp.nombre,mc.nombre),
CONCAT(dc.descripcion,dp.descripcion),
CONCAT(mp.direccion,mc.direccion),
t.nombre,r.costo_reporte,r.guia_reporte,r.documento_reporte,r.ot_reporte,
r.comentario_reporte
 FROM reporte_transporte AS r INNER JOIN proveedor AS p ON
r.proveedor_idproveedor=p.idproveedor INNER JOIN transporte AS t ON
r.transporte_idtransporte=t.idtransporte  INNER JOIN maeprov AS mp ON
r.maeprov_idmaeprov=mp.idmaeprov INNER JOIN maecli AS mc ON
r.maecli_idmaecli=mc.idmaecli INNER JOIN area_cc AS a ON
r.centcos_reporte=a.centro_costo INNER JOIN distritos AS dc  ON 
mc.distritos_iddistritos=dc.iddistritos  INNER JOIN distritos AS dp  ON 
mp.distritos_iddistritos=dp.iddistritos
 WHERE r.estado='00'and
r.fecha_reporte BETWEEN '$FECHAINICIO' AND '$FECHAFIN'
AND proveedor_idproveedor='$TRANSPORTISTA'";



$Sql="UPDATE reporte_transporte SET estado='01',numero_reporte='$NUMERO' WHERE 
fecha_reporte BETWEEN '$FECHAINICIO' AND '$FECHAFIN'
AND proveedor_idproveedor='$TRANSPORTISTA'";

$result_cab=mysql_query($Sql_cab);

if (!$result_cab)
 {

	echo "<script>alert('FALTARON INGRESAR ALGUNOS DATOS');

window.location='/transporte/reportes/reporte-transportistas';

	</script>";
}
else
{
	$result_det=mysql_query($Sql_det);
	$result=mysql_query($Sql);
header('Location: /transporte/consulta/cabecera');;

}


 ?>