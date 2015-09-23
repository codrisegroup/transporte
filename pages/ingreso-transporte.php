<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Ingreso de Transporte</title>
<?php include('../header.php'); ?>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header text-primary">Ingreso Reporte de Transporte</h1>
<div class="row clearfix">


<div class="col-md-9 column">
<form class="form-horizontal" role="form" method="POST"
action="../registrar/ingreso-transporte.php" 
autocomplete="Off">
<div class="form-group">
<label  class="col-sm-4 control-label">TRANSPORTISTA</label>
<div class="col-sm-8">
<select name="transportista" class="form-control"required>
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$Sql="SELECT idproveedor,ruc,razonsocial FROM proveedor
WHERE estado='00';";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['idproveedor']?>">
<?php echo $row['ruc'].' / '.$row['razonsocial']?></option>
<?php }?>
</select>
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label">FECHA DE SERVICIO</label>
<div class="col-sm-8">
<input type="date" name="fecha" class="form-control" required />
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label">TIPO DE UNIDAD</label>
<div class="col-sm-8">
<select name="unidad" class="form-control"required>
<option value="">[SELECCIONAR]</option>
<?php
$Sql="SELECT idtransporte,nombre,descripcion FROM transporte
WHERE estado='00' ORDER BY nombre DESC;	";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['idtransporte']?>">
<?php echo $row['nombre']?></option>
<?php }?>
</select>
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label">PROVEEDOR</label>
<div class="col-sm-8">
<select name="proveedor" class="form-control">
<option value="">[SELECCIONAR]</option>
<?php
$Sql="SELECT idmaeprov,CONCAT(alias,' / ',codigo)AS fullname FROM maeprov
ORDER BY alias;";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['idmaeprov']?>"><?php echo $row['fullname']?></option>
<?php }?>
</select>

</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label">CLIENTE</label>
<div class="col-sm-8">
<select name="cliente" class="form-control">
<option value="0">[SELECCIONAR]</option>
<?php
$Sql="SELECT idmaecli,CONCAT(alias,' / ',codigo)AS fullname FROM maecli
ORDER BY alias;";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['idmaecli']?>"><?php echo $row['fullname']?></option>
<?php }?>
</select>
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label">COSTO </label>
<div class="col-sm-8">
<input type="number" class="form-control" name="costo"  
step="any"  min='0.00001'/>
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label">CENTRO DE COSTO</label>
<div class="col-sm-8">
<select name="centrocosto" class="form-control"required>
<option value="">[SELECCIONAR]</option>
<?php
$Sql="SELECT centro_costo,area FROM area_cc ORDER BY area;";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['centro_costo']?>"><?php echo $row['area'].' / '.$row[centro_costo]?></option>
<?php }?>
</select>
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label">ORDEN DE TRABAJO</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="ot" 
onchange="conMayusculas(this);">
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label">OC-OS</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="documento" 
onchange="conMayusculas(this);" >
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label">GUIA DE REMISIÓN TRANSPORTISTA</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="guia" onchange="conMayusculas(this);">
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label">COMENTARIO</label>
<div class="col-sm-8">
<textarea name="comentario" id="" cols="30" rows="5" 
class="form-control" onchange="conMayusculas(this);"></textarea>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-4 col-sm-8">
<button type="submit" class="btn btn-primary btn-lg">Grabar</button>
</div>
</div>
</form>
</div>


</div>
</div>
</body>
</html>