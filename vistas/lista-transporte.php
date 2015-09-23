
<div class="table-responsive">
<table class="table table-bordered table-condensed">
<thead>
<tr class="success">	
<th>ID</th>
<th>TRANSPORTISTA</th>
<th>TRANSPORTE</th>
<th>FECHA</th>
<th>PROVEEDOR</th>
<th>CLIENTE</th>
<th><i class="glyphicon glyphicon-edit text-primary"></i></th>
<th><i class="glyphicon glyphicon-trash text-danger"></i></th>
</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT  idreporte_transporte,proveedor_idproveedor,
p.ruc,p.razonsocial,
transporte_idtransporte,t.nombre,
fecha_reporte,maeprov_idmaeprov,mp.alias AS amaeprov,mc.alias AS amaecli,maecli_idmaecli,r.estado
 FROM reporte_transporte AS r INNER JOIN proveedor AS p ON
r.proveedor_idproveedor=p.idproveedor INNER JOIN transporte AS t ON
r.transporte_idtransporte=t.idtransporte  INNER JOIN maeprov AS mp ON
r.maeprov_idmaeprov=mp.idmaeprov INNER JOIN maecli AS mc ON
r.maecli_idmaecli=mc.idmaecli WHERE r.estado='00'";  
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>

<tbody>
<tr>
<td><?php echo $row[idreporte_transporte]; ?></td>
<td><?php echo $row[razonsocial]; ?></td>
<td><?php echo $row[nombre]; ?></td>
<td><?php echo date("d-m-Y", strtotime($row[fecha_reporte])); ?></td>
<td><?php echo $row[amaeprov]; ?></td>
<td><?php echo $row[amaecli]; ?></td>
<td><a href="../editar/ingreso_transporte?id=<?php echo $row[idreporte_transporte]; ?>">
<i class="glyphicon glyphicon-edit"></i></a>
</td>
<td><a href="../eliminar/ingreso-transporte?id=<?php echo $row[idreporte_transporte]; ?>">
<i class="glyphicon glyphicon-trash text-danger"></i></a>
</td>
</tr>
<?php 

}
 ?>
</tbody>
</table>
</div>
