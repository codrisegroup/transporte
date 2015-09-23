<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>LISTA DE TRANSPORTE</title>
<?php include('../header-reporte.php'); ?>
<?php $CODIGO=$_REQUEST[codigo];?>
<?php 
/*REALIZAMOS LA CONSULTA PARA OBTENER EL CORRELATIVO DEL ULTIMO REGISTO*/
$link=Conectarse();
$sql="SELECT p.razonsocial,r.fecha_creacion,r.fecha_inicio,r.fecha_fin
 FROM reporte_cab as r INNER JOIN 
proveedor as p ON r.proveedor_idproveedor=p.idproveedor
 WHERE r.codigo_reporte='$CODIGO';";
$result =mysql_query($sql,$link);
if ($row=mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
 $FECHA=date("d-m-Y", strtotime($row[fecha_creacion]));
 $TRANSPORTISTA=$row[razonsocial];
 $FECHAINICIO=date("d-m-Y", strtotime($row[fecha_inicio]));
 $FECHAFIN=date("d-m-Y", strtotime($row[fecha_fin]));
} while ($row =mysql_fetch_array($result));
}else { 
echo "";
} 

/*REALIZAMOS LA CONSULTA PARA OBTENER EL COSTO*/
$link=Conectarse();
$sql="SELECT SUM(costo) AS costo FROM reporte_det 
WHERE codigo_reporte='$CODIGO'
GROUP BY codigo_reporte";
$result =mysql_query($sql,$link);
if ($row=mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
 $COSTO=$row[costo]*1.18;
} while ($row =mysql_fetch_array($result));
}else { 
echo "";
} 
 ?>
</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<p><strong>OVERPRIME MANUFACTURING S.A.C</strong></p>
<p>REPORTE DE SERVICIOS DE TRANSPORTE REALIZADO POR EL PROVEEDOR:
<strong><?php echo $TRANSPORTISTA; ?></strong></p>
<p>PERIODO:<strong>Del <?php echo $FECHAINICIO.' al '.$FECHAFIN; ?></strong></p>
<p>FECHA DE EMISIÓN:<strong><?php echo $FECHA; ?></strong></p>
<p>REQUERIMIENTO:</p>
<p>NÚMERO DE REPORTE: <strong><?php echo $CODIGO; ?></strong></p>
<p>COSTO TOTAL EN NUEVOS SOLES (INCLUYE I.G.V.):<strong>S/. <?php echo $COSTO; ?></strong></p>
</div>
</div>

<div class="row clearfix">
<div class="col-md-12 column">
<table class="table table-bordered table-condensed">
<thead>
<tr class="success">	
<th>FECHA</th>
<th>ÁREA</th>
<th>C.C.</th>
<th>PROV/ CLI</th>
<th>DISTRITO</th>
<th>DIRECCIÓN</th>
<th>TIPO</th>
<th>COSTO</th>
<th>G/R</th>
<th>OC-OS</th>
<th>O/T</th>
<th>COMENTARIO</th>
</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT * FROM reporte_det
WHERE codigo_reporte='$CODIGO'";  
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>

<tbody>
<tr>
<td><?php echo date("d/m/Y", strtotime($row[fecha])); ?></td>
<td><?php echo $row[area]; ?></td>
<td><?php echo $row[centro_costo]; ?></td>
<td><?php echo $row[proveedor_cliente]; ?></td>
<td><?php echo $row[distrito]; ?></td>
<td><?php echo $row[direccion]; ?></td>
<td><?php echo $row[tipo_unidad]; ?></td>
<td><?php echo round($row[costo]*1.18,2); ?></td>
<td><?php echo $row[guia]; ?></td>
<td><?php echo $row[oc_os]; ?></td>
<td><?php echo $row[ot]; ?></td>
<td><?php echo $row[comentario]; ?>
</td>
</tr>
<?php 

}
?>
</tbody>
</table>
</div>
</div>


<div class="row clearfix">
<div class="col-md-6 column">
<table class="table table-bordered table-condensed">
<thead>
<tr class="success">	
<th>ÁREA</th>
<th>CENTRO DE COSTO</th>
<th>COSTO S/.</th>
<th>PORCENTAJE %</th>

</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT area,centro_costo,sum(costo) as costo
FROM reporte_det WHERE codigo_reporte='$CODIGO'
GROUP BY centro_costo;
";  
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>

<tbody>
<tr>
<td><?php echo $row[area]; ?></td>
<td><?php echo $row[centro_costo]; ?></td>
<td><?php echo 'S/. '.round($row[costo]*1.18,2); ?></td>
<td><?php echo round((($row[costo]*1.18)*100)/$COSTO,2); ?></td>
</td>
</tr>
<?php 

}
?>
</tbody>
</table>
</div>
</div>


</div>
</body>
</html>