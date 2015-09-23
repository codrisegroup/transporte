<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>TRANSPORTISTA</title>
<?php include('../header.php'); ?>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header text-primary">Ingreso Proveedor de Transporte</h1>

<div class="row clearfix">

<div class="col-md-12 column">
<form class="form-horizontal" role="form" method="POST"
action="../registrar/transportista.php" autocomplete='Off'>
<div class="form-group">
<label class="col-sm-2 control-label">RUC</label>
<div class="col-sm-8">
<input type="text" name="ruc" class="form-control" maxlength="11" 
required onchange="conMayusculas(this);"  autofocus/>
</div>
</div>
<div class="form-group">
<label  class="col-sm-2 control-label">RAZÓN SOCIAL</label>
<div class="col-sm-8">
<input type="text" name="razonsocial" class="form-control"
 required onchange="conMayusculas(this);" />
</div>
</div>
<div class="form-group">
<label  class="col-sm-2 control-label">CONTACTO</label>
<div class="col-sm-8">
<input type="text" name="contacto" class="form-control"
 required onchange="conMayusculas(this);" />
</div>
</div>
<div class="form-group">
<label  class="col-sm-2 control-label">DIRECCIÓN</label>
<div class="col-sm-8">
<input type="text" name="direccion" class="form-control" 
 required onchange="conMayusculas(this);"/>
</div>
</div>
<div class="form-group">
<label  class="col-sm-2 control-label">TELEFONO</label>
<div class="col-sm-8">
<input type="text"  name="telefono" class="form-control" 
required onchange="conMayusculas(this);"/>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-primary btn-lg">Grabar</button>
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