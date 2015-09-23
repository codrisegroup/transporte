<script type="text/javascript" language="javascript"
src="listado/proveedor.js"></script>


<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="proveedor">
<?php require_once('../../bd/conexionMYSQL.php');
$link=  Conectarse();
$listado=  mysql_query("SELECT p.idmaeprov,p.codigo,p.ruc,p.alias,
	p.nombre,p.direccion,p.telefono,p.representante,d.descripcion as 
	nombredistritos FROM maeprov as p 
	INNER JOIN distritos as d ON 
	p.distritos_iddistritos=d.iddistritos  WHERE 
	p.alias!=''
	ORDER BY idmaeprov",$link);
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
<th>DISTRITO</th>
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
<td><?php echo $reg[idmaeprov]; ?></td>
<td><?php echo $reg[codigo]; ?></td>
<td><?php echo $reg[ruc]; ?></td>
<td><?php echo $reg[alias]; ?></td>
<td><?php echo $reg[nombre]; ?></td>
<td><?php echo $reg[direccion]; ?></td>
<td><?php echo $reg[representante]; ?></td>
<td><?php echo $reg[telefono]; ?></td>
<td><?php echo $reg[nombredistritos]; ?></td>
<td><a href="../editar/proveedor?id=<?php echo $reg[idmaeprov]; ?>" class="btn btn-primary">
<i class="glyphicon glyphicon-edit"></i></a></td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
