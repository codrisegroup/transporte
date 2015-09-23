<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Eliminar Reporte</title>
	<?php include('../header.php') ?>
	<?php echo $CODIGO=$_REQUEST[codigo]; ?>

</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header text-danger">
<b>ELIMINAR REPORTE</b></h1>
<div class="row clearfix">
<div class="col-md-12 column">
<div class="jumbotron">
<center>
<h2>DESEA ELIMINAR  EL REPORTE 
<b class="text-success"><?php echo $CODIGO; ?></b></h2>
<form action="../eliminar/reporte.php" method="POST">
<input type="hidden"  name="codigo" value="<?php echo $CODIGO; ?>">
<button class="btn btn-success btn-lg" type="submit">CONFIRMAR</button>
</form>
</center>
</div>
</div>	
</div>
</div>
</body>
</html>