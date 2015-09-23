<script type="text/javascript" language="javascript"
src="listado/registro.js"></script>


<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="registro">
<?php require_once('../../bd/conexionMYSQL.php');
$link=  Conectarse();
$listado=  mysql_query("SELECT  idreporte_transporte,proveedor_idproveedor,
p.ruc,p.razonsocial,
transporte_idtransporte,t.nombre,
fecha_reporte,maeprov_idmaeprov,mp.alias AS amaeprov,mc.alias AS amaecli,maecli_idmaecli,r.estado
 FROM reporte_transporte AS r INNER JOIN proveedor AS p ON
r.proveedor_idproveedor=p.idproveedor INNER JOIN transporte AS t ON
r.transporte_idtransporte=t.idtransporte  INNER JOIN maeprov AS mp ON
r.maeprov_idmaeprov=mp.idmaeprov INNER JOIN maecli AS mc ON
r.maecli_idmaecli=mc.idmaecli WHERE r.estado='00'",$link);
?>
<thead>
<tr>
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
<tbody>
<?php


while($reg= mysql_fetch_array($listado))
{
?>
<tr class="active">
<td><?php echo $reg[idreporte_transporte]; ?></td>
<td><?php echo $reg[razonsocial]; ?></td>
<td><?php echo $reg[nombre]; ?></td>
<td><?php echo date("d-m-Y", strtotime($reg[fecha_reporte])); ?></td>
<td><?php echo $reg[amaeprov]; ?></td>
<td><?php echo $reg[amaecli]; ?></td>
<td><a href="../editar/ingreso_transporte?id=<?php echo $reg[idreporte_transporte]; ?>">
<i class="glyphicon glyphicon-edit"></i></a>
</td>
<td><a href="../eliminar/ingreso-transporte?id=<?php echo $reg[idreporte_transporte]; ?>">
<i class="glyphicon glyphicon-trash text-danger"></i></a>
</td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
