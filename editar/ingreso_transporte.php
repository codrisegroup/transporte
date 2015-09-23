<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Ingreso de Transporte</title>
<?php include('../header.php'); ?>
<?php 
$ID=$_REQUEST[id];
/*REALIZAMOS LA CONSULTA PARA OBTENER LOS DATOS DEL REPORTE*/
$link=Conectarse();
$sql="SELECT  idreporte_transporte,proveedor_idproveedor,
p.ruc,p.razonsocial,transporte_idtransporte,t.nombre,
fecha_reporte,maeprov_idmaeprov,CONCAT(mp.alias,' / ',mp.codigo) AS amaeprov,
CONCAT(mc.alias, '/ ' ,mc.codigo) AS amaecli,
maecli_idmaecli,r.estado,r.costo_reporte,r.centcos_reporte,r.ot_reporte,r.documento_reporte,
r.guia_reporte,r.comentario_reporte,(ac.area) AS DESC_CENCOS
 FROM reporte_transporte AS r INNER JOIN proveedor AS p ON
r.proveedor_idproveedor=p.idproveedor INNER JOIN transporte AS t ON
r.transporte_idtransporte=t.idtransporte INNER JOIN maeprov AS mp ON
r.maeprov_idmaeprov=mp.idmaeprov INNER JOIN maecli AS mc ON
r.maecli_idmaecli=mc.idmaecli INNER JOIN area_cc AS  ac  ON 
r.centcos_reporte=ac.centro_costo
WHERE r.estado='00' AND 
idreporte_transporte=$ID";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$IDTRANSPORTISTA=$row[proveedor_idproveedor];
$TRANSPORTISTA=$row[razonsocial];
$IDUNIDAD=$row[transporte_idtransporte];
$UNIDAD=$row[nombre];
$FECHA=$row[fecha_reporte];
$IDDISTRITOS=$row[distritos_iddistritos];
$DISTRITOS=$row[descripcion];
$IDPROVEEDOR=$row[maeprov_idmaeprov];
$PROVEEDOR=$row[amaeprov];
$IDCLIENTE=$row[maecli_idmaecli];
$CLIENTE=$row[amaecli];
$DIRECCION=$row[direccion_reporte];
$COSTO=$row[costo_reporte];
$CENCOS=$row[centcos_reporte];
$OT=$row[ot_reporte];
$DOCUMENTO=$row[documento_reporte];
$GUIA=$row[guia_reporte];
$COMENTARIO=$row[comentario_reporte];
$DESC_CENCOS=$row[DESC_CENCOS];
} while ($row =mysql_fetch_array($result));
}else { 
echo "error";
} 

 ?>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header text-success">Actualizar Registro</h1>
<div class="row clearfix">
<div class="col-md-9 column">
<form class="form-horizontal" role="form" method="GET"
action="../actualizar/ingreso_transporte.php" 
autocomplete="Off">
<input type="hidden" value="<?php echo $ID; ?>" name="id">
<div class="form-group">
<label  class="col-sm-4 control-label text-success">TRANSPORTISTA</label>
<div class="col-sm-8">
<select name="transportista" class="form-control"required>
<option value="<?php echo $IDTRANSPORTISTA; ?>">
<?php echo $TRANSPORTISTA; ?></option>
<?php
$link=Conectarse();
$Sql="SELECT idproveedor,ruc,razonsocial 
FROM proveedor WHERE idproveedor NOT LIKE '$IDTRANSPORTISTA'
AND estado='00';";
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
<label  class="col-sm-4 control-label text-success">FECHA DE SERVICIO</label>
<div class="col-sm-8">
<input type="date" name="fecha"  value="<?php echo $FECHA; ?>" 
class="form-control" required />
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label text-success">TIPO DE UNIDAD</label>
<div class="col-sm-8">
<select name="unidad" class="form-control"required>
<option value="<?php echo $IDUNIDAD; ?>"><?php echo $UNIDAD; ?></option>
<?php
$Sql="SELECT idtransporte,nombre,descripcion
 FROM transporte WHERE idtransporte NOT LIKE '$IDUNIDAD'
 AND estado='00';";
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
<label  class="col-sm-4 control-label text-success">PROVEEDOR</label>
<div class="col-sm-8">
<select name="proveedor" class="form-control">
<option value="<?php echo $IDPROVEEDOR; ?>"><?php echo $PROVEEDOR; ?></option>
<?php
$Sql="SELECT idmaeprov,CONCAT(alias,' / ',codigo)AS fullname FROM maeprov
WHERE idmaeprov NOT LIKE '$IDPROVEEDOR'
ORDER BY alias";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['idmaeprov']?>"><?php echo $row['fullname']?></option>
<?php }?>
</select>
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label text-success">CLIENTE</label>
<div class="col-sm-8">
<select name="cliente" class="form-control">
<option value="<?php echo $IDCLIENTE; ?>"><?php echo $CLIENTE; ?></option>
<?php
$Sql="SELECT idmaecli,CONCAT(alias,' / ',codigo)AS fullname FROM maecli
WHERE idmaecli NOT LIKE '$IDCLIENTE'
ORDER BY alias";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['idmaecli']?>"><?php echo $row['fullname']?></option>
<?php }?>
</select>
</div>
</div>

<div class="form-group">
<label  class="col-sm-4 control-label text-success">COSTO </label>
<div class="col-sm-8">
<input type="number" class="form-control" name="costo"
value="<?php echo $COSTO; ?>" 
step="any"  min='0'/>
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label text-success">CENTRO DE COSTO</label>
<div class="col-sm-8">
<select name="centrocosto" class="form-control"required>
<option value="<?php echo $CENCOS; ?>"><?php echo $CENCOS.' / '.$DESC_CENCOS; ?></option>
<?php
$Sql="SELECT centro_costo,area FROM area_cc 
WHERE centro_costo NOT LIKE '$CENCOS' ORDER BY area;";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['centro_costo']?>"><?php echo $row['area'].' / '.$row[centro_costo]?></option>
<?php }?>
</select>
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label text-success">ORDEN DE TRABAJO</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="ot" 
value="<?php echo $OT; ?>" 
onchange="conMayusculas(this);">
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label text-success">OC-OS</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="documento" 
value="<?php echo $DOCUMENTO; ?>" 
onchange="conMayusculas(this);" >
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label text-success">GUIA DE REMISIÓN TRANSPORTISTA</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="guia"
value="<?php echo $GUIA; ?>" 
 onchange="conMayusculas(this);">
</div>
</div>
<div class="form-group">
<label  class="col-sm-4 control-label text-success">COMENTARIO</label>
<div class="col-sm-8">
<textarea name="comentario" id="" cols="30" rows="5"
class="form-control" onchange="conMayusculas(this);">
<?php echo $COMENTARIO; ?></textarea>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-4 col-sm-8">
<button type="submit" class="btn btn-success btn-lg">Actualizar</button>
</div>
</div>
</form>
</div>


</div>
</div>
</body>
</html>