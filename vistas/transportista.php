<div class="table-responsive">
<table class="table table-bordered table-condensed">
<thead>
<tr class="active">	
<th>ID</th>
<th>RUC</th>
<th>RAZÓN SOCIAL</th>
<th>CONTACTO</th>
<th>DIRECCIÓN</th>
<th>TELEFONO</th>
<th><a href=""><i class="glyphicon glyphicon-edit text-primary"></i></th>
<th><a href=""><i class="glyphicon glyphicon-trash text-danger"></i></th>
</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT idproveedor,ruc,razonsocial,contacto,
direccion,telefono FROM proveedor WHERE estado='00' 
order by razonsocial";  
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>
<tbody>
<tr>
<td><?php echo $row[idproveedor]; ?></td>
<td><?php echo $row[ruc]; ?></td>
<td><?php echo $row[razonsocial]; ?></td>
<td><?php echo $row[contacto]; ?></td>
<td><?php echo $row[direccion]; ?></td>
<td><?php echo $row[telefono]; ?></td>
<th>
<a href="../editar/transportista?id=<?php echo $row[idproveedor];?>&
ruc=<?php echo $row[ruc];?>&razon=<?php echo $row[razonsocial]; ?>&
contacto=<?php echo $row[contacto];?>&direccion=<?php echo $row[direccion] ?>&
telefono=<?php echo $row[telefono] ?>">
<i class="glyphicon glyphicon-edit text-primary"></i></th>
<th>
<a href="../eliminar/transportista?id=<?php echo $row[idproveedor]; ?>">
<i class="glyphicon glyphicon-trash text-danger"></i></th>
</tr>
<?php } ?>
</tbody>
</table>
</div>
