<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Unidad de Transporte</title>
<?php include('../header.php'); ?>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header text-primary">Ingreso de Unidad de Transporte</h1>

<div class="row clearfix">
<div class="col-md-12 column">
<form class="form-horizontal" role="form" 
method="POST" action="../registrar/unidad-transporte.php" 
autocomplete="Off">
<div class="form-group">
<label class="col-sm-2 control-label">NOMBRE</label>
<div class="col-sm-8">
<input type="text"  name="nombre"class="form-control" 
onchange="conMayusculas(this);"  required autofocus/>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">DESCRIPCIÓN</label>
<div class="col-sm-8">
<input type="text" name="descripcion"class="form-control"
onchange="conMayusculas(this);" required=/>
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
<?php include('../vistas/unidad-transporte.php') ?>
</div>
</div>
</div>




</body>
</html>