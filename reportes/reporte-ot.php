<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>REPORTE X OT</title>
<?php include('../header.php'); ?>
<?php 
$FECHAINICIO=$_REQUEST[fechainicio];
$FECHAFIN=$_REQUEST[fechafin];
$TRANSPORTISTA=$_REQUEST[transportista];
$OT=$_REQUEST[ot];
?>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="row clearfix">
<div class="col-md-2 column">
<form action="reporte-ot" method="POST">
<div class="form-group">
<label>FECHA INICIO</label>
<input type="date" name="fechainicio"  value="<?php echo $FECHAINICIO; ?>" class="form-control" />
</div>
</div>
<div class="col-md-2 column">
<div class="form-group">
<label>FECHA FIN</label>
<input type="date" name="fechafin"  value="<?php echo $FECHAFIN; ?>" class="form-control" />
</div>
</div>
<div class="col-md-2 column">
<div class="form-group">
<label>TRANSPORTISTA</label>
<select name="transportista" class="form-control"required>
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$Sql="SELECT idproveedor,razonsocial FROM  proveedor
WHERE estado='00';";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['idproveedor']?>">
<?php echo $row['razonsocial']?></option>
<?php }?>
</select>
</div>
</div>
<div class="col-md-2 column">
<div class="form-group">
<label>OT</label>
<select name="ot" class="form-control"required>
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$Sql="SELECT ot_reporte from reporte_transporte  where estado='00'
group by ot_reporte
";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['ot_reporte']?>">
<?php echo $row['ot_reporte']?></option>
<?php }?>
</select>
</div>
</div>
<div class="col-md-2 column">
<div class="form-group">
<br>
<button class="btn btn-success">CONSULTAR</button>
</form>
</div>
</div>

<div class="col-md-2 column">
<br>
<form action="../actualizar/reporte-ot.php" method="POST">
<input type="hidden" name="transportista" value="<?php echo $TRANSPORTISTA ?>">
<input type="hidden" name="fechainicio" value="<?php echo $FECHAINICIO ?>">
<input type="hidden" name="fechafin" value="<?php echo $FECHAFIN ?>">
<input type="hidden" name="ot" value="<?php echo $OT?>">
<a id="modal-902039" href="#modal-container-902039" 
role="button" class="btn btn-primary" data-toggle="modal">Transferir</a>
			
<div class="modal fade" id="modal-container-902039" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title text-primary" id="myModalLabel">
CONFIRMACIÓN
</h4>
</div>
<div class="modal-body text-primary">
¿ESTA SEGURO DE TRANSFERIR?
</div>
<div class="modal-footer ">


<button type="submit" class="btn btn-primary">
SI
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button> 
</div>
</div>

</div>

</div>
</form>
</div>
</div>

<div class="row clearfix">
<div class="col-md-12 column">
<div class="table-responsive">
<table class="table table-bordered table-condensed">
<thead>
<tr class="success">	
<th>ID</th>
<th>TRANSPORTISTA</th>
<th>TRANSPORTE</th>
<th>PROVEEDOR / CLIENTE</th>
<th>DIRECCIÓN</th>
<th>COSTO</th>
<th>CC</th>
<th>OT</th>
<th>FECHA</th>
<th><i class="glyphicon glyphicon-edit text-primary"></i></th>
</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT  idreporte_transporte,proveedor_idproveedor,
p.ruc,p.razonsocial,transporte_idtransporte,t.nombre,
fecha_reporte,maeprov_idmaeprov,mp.alias AS amaeprov,
mc.alias AS amaecli,mc.direccion as dirmaecli,mp.direccion as dirmaeprov,
maecli_idmaecli,r.estado,
r.costo_reporte,r.centcos_reporte,r.ot_reporte,r.documento_reporte,
r.guia_reporte,r.comentario_reporte
FROM reporte_transporte AS r INNER JOIN proveedor AS p ON
r.proveedor_idproveedor=p.idproveedor INNER JOIN transporte AS t ON
r.transporte_idtransporte=t.idtransporte INNER JOIN maeprov AS mp ON
r.maeprov_idmaeprov=mp.idmaeprov INNER JOIN maecli AS mc ON
r.maecli_idmaecli=mc.idmaecli   WHERE r.estado='00'
AND fecha_reporte BETWEEN '$FECHAINICIO' 
AND '$FECHAFIN' AND proveedor_idproveedor='$TRANSPORTISTA'";  
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>

<tbody>
<tr>
<td><?php echo $row[idreporte_transporte]; ?></td>
<td><?php echo $row[razonsocial]; ?></td>
<td><?php echo $row[nombre]; ?></td>
<td><?php echo $row[amaeprov].$row[amaecli]; ?></td>
<td><?php echo $row[dirmaeprov].$row[dirmaecli]; ?></td>
<td><?php echo $row[costo_reporte]; ?></td>
<td><?php echo $row[centcos_reporte]; ?></td>
<td><?php echo $row[ot_reporte]; ?></td>
<td><?php echo date("d-m-Y", strtotime($row[fecha_reporte])); ?></td>
<td><a href="../editar/ingreso_transporte?id=<?php echo $row[idreporte_transporte]; ?>">
<i class="glyphicon glyphicon-edit"></i></a>
</tr>
<?php 

}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>