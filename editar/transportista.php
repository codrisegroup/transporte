<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>TRANSPORTISTA</title>
<?php include('../header.php'); ?>
<?php 
//variables;
$ID=$_REQUEST['id'];
$RUC=$_REQUEST['ruc'];
$RAZONSOCIAL=$_REQUEST['razon'];
$CONTACTO=$_REQUEST['contacto'];
$DIRECCION=$_REQUEST['direccion'];
$TELEFONO=$_REQUEST['telefono'];

 ?>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header text-success">Actualizar Proveedor de Transporte</h1>

<div class="row clearfix">

<div class="col-md-12 column">
<form class="form-horizontal" role="form" method="POST"
action="../actualizar/transportista.php" autocomplete='Off'>
<input type="hidden" name='id'value="<?php echo $ID; ?>">
<div class="form-group">
<label class="col-sm-2 control-label">RUC</label>
<div class="col-sm-8">
<input type="text" name="ruc" class="form-control" maxlength="11" 
required onchange="conMayusculas(this);"
value="<?php echo $RUC; ?>" />
</div>
</div>
<div class="form-group">
<label  class="col-sm-2 control-label">RAZÓN SOCIAL</label>
<div class="col-sm-8">
<input type="text" name="razonsocial" class="form-control"
 required onchange="conMayusculas(this);"
 value="<?php echo $RAZONSOCIAL; ?>" />
</div>
</div>
<div class="form-group">
<label  class="col-sm-2 control-label">CONTACTO</label>
<div class="col-sm-8">
<input type="text" name="contacto" class="form-control"
 required onchange="conMayusculas(this);" 
 value="<?php echo $CONTACTO; ?>"/>
</div>
</div>
<div class="form-group">
<label  class="col-sm-2 control-label">DIRECCIÓN</label>
<div class="col-sm-8">
<input type="text" name="direccion" class="form-control" 
 required onchange="conMayusculas(this);" 
 value="<?php echo $DIRECCION; ?>"/>
</div>
</div>
<div class="form-group">
<label  class="col-sm-2 control-label">TELEFONO</label>
<div class="col-sm-8">
<input type="text"  name="telefono" class="form-control" 
required onchange="conMayusculas(this);" 
value="<?php echo $TELEFONO; ?>"/>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-success btn-lg">Actualizar</button>
</div>
</div>
</form>
</div>

</div>
<div class="row clearfix">

<div class="col-md-12 column">
<?php include('../vistas/transportista.php'); ?>
</div>
</div>


</div>
</body>
</html>