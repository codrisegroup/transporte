<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Actualizar Centro de Costo</title>
<?php include('../header.php'); ?>
</head>
<?php 
$ID=$_REQUEST[id];
/*REALIZAMOS LA CONSULTA PARA OBTENER LOS DATOS DEL REPORTE*/
$link=Conectarse();
$sql="SELECT centro_costo,area FROM area_cc WHERE idarea_cc=$ID";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$CENTROCOSTO=$row[centro_costo];
$AREA=$row[area];
} while ($row =mysql_fetch_array($result));
}else { 
echo "error";
} 

?>
<body>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header text-success">Actualizar Centro de Costo</h1>
<h5 class="text-right">
<button class="btn btn-danger"href="#modal-container-620223" role="button"
data-toggle="modal" id="modal-620223">
<i class="glyphicon glyphicon-trash"></i>
ELIMINAR</button>
</h5>

<div class="row clearfix">
<div class="col-md-8 column">
<form action="../actualizar/centro-costo.php" method="POST" 
autocomplete="Off">
<input type="hidden" name="id" value="<?php echo $ID; ?>">
<div class="form-group">
<label>CENTRO DE COSTO</label>
<input type="text" name="centrocosto" class="form-control" 
value="<?php echo $CENTROCOSTO; ?>" onchange="conMayusculas(this);">
</div>	
<div class="form-group">
<label>ÁREA</label>
<input type="text" name="area" class="form-control"
value="<?php echo $AREA; ?>" onchange="conMayusculas(this);">
</div>	
<div class="form-group">
<button class="btn btn-success">ACTUALIZAR</button>
</div>
</form>
</div>
</div>

</div>
</body>

<div class="modal fade" id="modal-container-620223" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title" id="myModalLabel">
ELIMINAR  CLIENTE
</h4>
</div>
<div class="modal-body text-danger">
¿ESTA SEGURO DE ELIMINAR EL CLIENTE?
</div>
<div class="modal-footer">
<a href="../eliminar/centro-costos?id=<?php echo $ID; ?>" class="btn btn-danger">ELIMINAR</a>


<button type="button" class="btn btn-default" data-dismiss="modal">
CERRAR
</button> 

</div>
</div>

</div>

</div>




</html>