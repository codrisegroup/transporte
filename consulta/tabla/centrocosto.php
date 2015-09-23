<script type="text/javascript" language="javascript"
src="listado/centrocosto.js"></script>


<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="centrocosto">
<?php require_once('../../bd/conexionMYSQL.php');
$link=  Conectarse();
$listado=  mysql_query("SELECT * FROM area_cc ORDER BY idarea_cc",$link);
?>
<thead>
<tr>
<th>ID</th>
<th>CENTRO DE COSTO</th>
<th>ÁREA</th>
<th><a href="#" class="btn btn-primary">
<i class="glyphicon glyphicon-edit"></i></a></th>
</tr>
</thead>
<tbody>
<?php


while($reg= mysql_fetch_array($listado))
{
?>
<tr class="active">
<td><?php echo $reg[idarea_cc]; ?></td>
<td><?php echo $reg[centro_costo]; ?></td>
<td><?php echo $reg[area]; ?></td>
<td><a href="../editar/centro-costo?id=<?php echo $reg[idarea_cc]; ?>" class="btn btn-primary">
<i class="glyphicon glyphicon-edit"></i></a></td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
