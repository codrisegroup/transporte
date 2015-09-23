<script type="text/javascript" language="javascript"
src="listado/cliente.js"></script>


<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="cliente">
<?php require_once('../../bd/conexionMYSQL.php');
$link=  Conectarse();
$listado=  mysql_query("SELECT m.idmaecli,m.codigo,m.ruc,m.alias,
	m.nombre,m.direccion,m.telefono,m.representante,d.descripcion as 
	nombredistritos FROM maecli as m 
	INNER JOIN distritos as d ON 
	m.distritos_iddistritos=d.iddistritos  WHERE 
	m.alias!=''
	ORDER BY idmaecli",$link);
?>
<thead>
<tr>
<th>ID</th>
<th>CODIGO</th>
<th>RUC</th>
<th>ALIAS</th>
<th>RAZON SOCIAL</th>
<th>DIRECCION</th>
<th>REPRESENTANTE</th>
<th>TELEFONO</th>
<TH>DISTRITO</TH>
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
<td><?php echo $reg[idmaecli]; ?></td>
<td><?php echo $reg[codigo]; ?></td>
<td><?php echo $reg[ruc]; ?></td>
<td><?php echo $reg[alias]; ?></td>
<td><?php echo $reg[nombre]; ?></td>
<td><?php echo $reg[direccion]; ?></td>
<td><?php echo $reg[representante]; ?></td>
<td><?php echo $reg[telefono]; ?></td>
<td><?php echo $reg[nombredistritos]; ?></td>
<td><a href="../editar/cliente?id=<?php echo $reg[idmaecli]; ?>" class="btn btn-primary">
<i class="glyphicon glyphicon-edit"></i></a></td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
