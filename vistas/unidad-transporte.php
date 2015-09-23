<div class="table-responsive">
<table class="table table-bordered table-condensed">
<thead>
<tr class="active">	
<th>ID</th>
<th>NOMBRE</th>
<th>DESCRIPCIÓN</th>
<th><a href=""><i class="glyphicon glyphicon-edit text-primary"></i></th>
<th><a href=""><i class="glyphicon glyphicon-trash text-danger"></i></th>
</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT idtransporte,nombre,descripcion FROM transporte
WHERE estado='00' ORDER BY nombre";  
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>
<tbody>
<tr>
<td><?php echo $row[idtransporte]; ?></td>
<td><?php echo $row[nombre]; ?></td>
<td><?php echo $row[descripcion]; ?></td>
<th>
<a href="../editar/unidad-transporte?id=<?php echo $row[idtransporte];?>&
nombre=<?php echo $row[nombre];?>&descripcion=<?php echo $row[descripcion]; ?>">
<i class="glyphicon glyphicon-edit text-primary"></i></th>
<th>
<a href="../eliminar/unidad-transporte?id=<?php echo $row[idtransporte]; ?>">
<i class="glyphicon glyphicon-trash text-danger"></i></th>
</tr>
<?php } ?>
</tbody>
</table>
</div>
