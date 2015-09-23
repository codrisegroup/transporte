<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>LISTA DE TRANSPORTE</title>

<style type="text/css">
th,td,p{
font-size: 11px;

}
i {
	font-size: 10px;
	text-align: center;
}

</style>

<?php include('../header-reporte.php'); ?>
<?php $CODIGO=$_REQUEST[codigo];?>
<?php 
/*REALIZAMOS LA CONSULTA PARA OBTENER EL CORRELATIVO DEL ULTIMO REGISTO*/
$link=Conectarse();
$sql="SELECT p.razonsocial,r.fecha_creacion,r.fecha_inicio,r.fecha_fin,
r.requerimiento
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
 $REQUERIMIENTO=$row[requerimiento];
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
<p><strong>COMERCIAL DRILLING SERVICES SAC</strong></p>
<p>REPORTE DE SERVICIOS DE TRANSPORTE REALIZADO POR EL PROVEEDOR:
<strong><?php echo $TRANSPORTISTA; ?></strong></p>
<p>PERIODO:<strong>Del <?php echo $FECHAINICIO.' al '.$FECHAFIN; ?></strong></p>
<p>FECHA DE EMISIÓN:<strong><?php echo $FECHA; ?></strong></p>
<p>
REQUERIMIENTO:
<form action="../actualizar/actualizar-requerimiento.php"
method="POST" autocomplete="Off">
<input type="hidden" name="codigo" value="<?php echo $CODIGO; ?>">
<input type="text"  class="inptreporte"name="requerimiento" required value="<?php echo $REQUERIMIENTO; ?>">
 <button type="submit" class="btnreporte">Actualizar</button>
 </form>
 </p> 
<p>NÚMERO DE REPORTE: <strong><?php echo $CODIGO; ?></strong></p>
<p>COSTO TOTAL EN NUEVOS SOLES (INCLUYE I.G.V.):<strong>S/. <?php echo $COSTO; ?></strong></p>
</div>
</div>

<div class="row clearfix">
<div class="col-md-12 column">
<table class="table table-bordered table-condensed">
<thead>
<tr class="success">
<th>ITEM</th>	
<th>FECHA</th>
<th>ÁREA</th>
<th>C.C.</th>
<th>PROV/ CLI</th>
<th>DIRECCIÓN</th>
<th>DISTRITO</th>
<th>TIPO</th>
<th>COSTO</th>
<th>G/R</th>
<th>OC-OS</th>
<th>O/T</th>
<th>COMENTARIO</th>
<th><i class="glyphicon glyphicon-edit" ></i></th>
</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT * FROM reporte_det
WHERE codigo_reporte='$CODIGO' order by item";  
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>

<tbody>
<tr>
<?php 
$txta                      ='modal-containera-';
$txtxa                     ='#modal-containera-';
$txta                      .=$j;
$txtxa                     =$txtxa.=$j;

$txt                       ='modal-container-';
$txtx                      ='#modal-container-';
$txt                       .=$i;
$txtx                      =$txtx.=$i;


?>
<td><?php echo $row[item]; ?></td>
<td><?php echo date("d/m/Y", strtotime($row[fecha])); ?></td>
<td><?php echo $row[area]; ?></td>
<td><?php echo $row[centro_costo]; ?></td>
<td><?php echo $row[proveedor_cliente]; ?></td>
<td><?php echo $row[distrito]; ?></td>
<td><?php echo $row[direccion]; ?></td>
<td><?php echo $row[tipo_unidad]; ?></td>
<td><?php echo round($row[costo],2); ?></td>
<td><?php echo $row[guia]; ?></td>
<td><?php echo $row[oc_os]; ?></td>
<td><?php echo $row[ot]; ?></td>
<td><?php echo $row[comentario]; ?></td>
<td class="text-primary">
<a id="modal-899574" href='<?php echo $txtx;?>'
role="button" class="btn" data-toggle="modal">
<i class="glyphicon glyphicon-edit text-primary">	</i></a>
</td>

<!-- INICIO MODAL ACTUALIZAR -->
<div class="modal fade" id="<?php echo $txt; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title" id="myModalLabel">
ACTUALIZAR INFORMACIÓN
</h4>
</div>
<div class="modal-body">
<div class="form-group">
<form action="../actualizar/detalle-reporte.php" method="POST" 
autocomplete="Off">
<input type="hidden" name="id" value="<?php echo $row[idreporte_cab] ?>">
<input type="hidden" name="codigo" value="<?php echo $CODIGO; ?>">
<div class="form-group">
<label>ITEM</label>
<input type="number" name="item"class="form-control" 
value="<?php echo $row[item]; ?>"   min="1"
required>
</div>
<label>DIRECCIÓN</label>
<input type="text" name="direccion"class="form-control" 
value="<?php echo $row[direccion]; ?>" onchange="conMayusculas(this);"
required>
</div>
<div class="form-group">
<label>DISTRITO</label>
<input type="text" name="distrito"class="form-control" 
value="<?php echo $row[distrito]; ?>" onchange="conMayusculas(this);"
required>
</div>
<div class="form-group">
<label>COMENTARIO</label>
<textarea name="comentario" id="" cols="30" rows="5" class="form-control" 
onchange="conMayusculas(this);" required> 
<?php echo $row[comentario]; ?>
</textarea>
</div>
</div>
<div class="modal-footer">
 <button type="submit" class="btn btn-primary">Actualizar</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</form>
</div>
</div>

</div>

</div>		

<!-- fin modal Actualizar -->
</tr>
<?php 
$i                         =$i+1;
$j                         =$j+1;  
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