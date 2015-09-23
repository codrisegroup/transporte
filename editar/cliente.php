<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Actualizar Cliente</title>
<?php include('../header.php'); ?>
</head>
<?php 
$ID=$_REQUEST[id];
/*REALIZAMOS LA CONSULTA PARA OBTENER LOS DATOS DEL REPORTE*/
$link=Conectarse();
$sql="SELECT m.idmaecli,m.codigo,m.ruc,m.alias,m.nombre,m.direccion,
m.telefono,m.representante,m.distritos_iddistritos,
d.descripcion FROM maecli as m INNER JOIN distritos as d 
ON m.distritos_iddistritos=d.iddistritos WHERE idmaecli=$ID";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$CODIGO=$row[codigo];
$RUC=$row[ruc];
$ALIAS=$row[alias];
$NOMBRE=$row[nombre];
$DIRECCION=$row[direccion];
$TELEFONO=$row[telefono];
$REPRESENTANTE=$row[representante];
$IDDISTRITOS=$row[distritos_iddistritos];
$DISTRITOS=$row[descripcion];

} while ($row =mysql_fetch_array($result));
}else { 
echo "error";
} 

?>
<body>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header text-success">Actualizar Cliente</h1>
<h5 class="text-right">
<button class="btn btn-danger"href="#modal-container-620223" role="button"
data-toggle="modal" id="modal-620223">
<i class="glyphicon glyphicon-trash"></i>
ELIMINAR</button>
</h5>

<div class="row clearfix">
<div class="col-md-8 column">
<form action="../actualizar/cliente.php" method="POST" 
autocomplete="Off">
<input type="hidden" name="id" value="<?php echo $ID; ?>">
<div class="form-group">
<label>Código</label>
<input type="text" name="codigo" class="form-control" 
value="<?php echo $CODIGO; ?>">
</div>	
<div class="form-group">
<label>Ruc</label>
<input type="text" name="ruc" class="form-control"
value="<?php echo $RUC; ?>">
</div>	
<div class="form-group">
<label>Alias</label>
<input type="text" name="alias" class="form-control"
value="<?php echo $ALIAS; ?>">
</div>	
<div class="form-group">
<label>Nombre</label>
<input type="text" name="nombre" class="form-control"
value="<?php echo $NOMBRE; ?>">
</div>	
<div class="form-group">
<label>direccion</label>
<input type="text" name="direccion" class="form-control"
value="<?php echo $DIRECCION; ?>">
</div>
<div class="form-group">
<label>Telefono</label>
<input type="text" name="telefono" class="form-control"
value="<?php echo $TELEFONO; ?>">
</div>
<div class="form-group">
<label>Representante</label>
<input type="text" name="representante" class="form-control"
value="<?php echo $REPRESENTANTE; ?>">
</div>
<div class="form-group">
<label>Distrito</label>
<select name="distrito" class="form-control"required>
<option value="<?php echo $IDDISTRITOS; ?>"><?php echo $DISTRITOS; ?></option>
<?php
$link=Conectarse();
$Sql="SELECT iddistritos,descripcion FROM distritos
WHERE descripcion!='' AND iddistritos NOT like '$IDDISTRITOS'  ORDER BY descripcion;";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['iddistritos']?>"><?php echo $row['descripcion']?></option>
<?php }?>
</select>
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
<a href="../eliminar/cliente?id=<?php echo $ID; ?>" class="btn btn-danger">ELIMINAR</a>


<button type="button" class="btn btn-default" data-dismiss="modal">
CERRAR
</button> 

</div>
</div>

</div>

</div>




</html>