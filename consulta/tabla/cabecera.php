<script type="text/javascript" language="javascript"
src="listado/cabecera.js"></script>


<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="cabecera">
<?php require_once('../../bd/conexionMYSQL.php');
$link=  Conectarse();
$listado=  mysql_query("SELECT codigo_reporte,
	DATE_FORMAT(r.fecha_creacion,'%d/%m/%Y - %H:%i:%s') AS fecha,
	p.ruc,p.razonsocial,r.fecha_inicio,r.fecha_fin
	 FROM reporte_cab as r INNER JOIN proveedor as p 
	 ON r.proveedor_idproveedor=p.idproveedor ORDER BY codigo_reporte",$link);
?>
<thead>
<tr>
<th>CÓDIGO</th>
<th>RUC</th>
<th>RAZÓN SOCIAL</th>
<th>FECHA</th>
<th>FECHA INICIO</th>
<th>FECHA FIN</th>
<th><a href="#" class="btn btn-primary">
<i class="glyphicon glyphicon-zoom-in"></i></a></th>
<th><a href="#" class="btn btn-success">EXCEL</th>
<th><a href="#" class="btn btn-warning">CC</th>
<th><a href="#" class="btn btn-warning">OT</th>
<th><a href="#" class="btn btn-danger">
<i class="glyphicon glyphicon-trash"></i>
</th>
</tr>
</thead>
<tbody>
<?php


while($reg= mysql_fetch_array($listado))
{
?>
<tr class="active">
<td><?php echo $reg[codigo_reporte]; ?></td>
<td><?php echo $reg[ruc]; ?></td>
<td><?php echo $reg[razonsocial]; ?></td>
<td><?php echo $reg[fecha]; ?></td>
<td><?php echo date("d-m-Y", strtotime($reg[fecha_inicio])); ?></td>
<td><?php echo date("d-m-Y", strtotime($reg[fecha_fin])); ?></td>
<td style="text-align: center" >
<a href="/transporte/pages/detalle-reporte?codigo=<?php echo $reg[codigo_reporte]; ?>"
 target="_blank" class="btn btn-primary" title="CONSULTAR">
<i class="glyphicon glyphicon-zoom-in"></i></a></td>
<td>
<a href="/transporte/reporte-excel/reporteexcel.php?codigo=<?php echo $reg[codigo_reporte]; ?>&
nombre=<?php echo $reg[razonsocial]; ?>"
 target="_blank" class="btn btn-success" title="EXPORTAR EXCEL">EXCEL
</a>
</td>
<td><a href="../actualizar/pdf?codigo=<?php echo $reg[codigo_reporte]; ?>"
 class="btn btn-warning">CC</a></td>
 <td><a href="../actualizar/pdf-ot?codigo=<?php echo $reg[codigo_reporte]; ?>"
 class="btn btn-warning">OT</a></td>
 <td><a href="../pages/eliminar-reporte?codigo=<?php echo $reg[codigo_reporte]; ?>"
 class="btn btn-danger">
<i class="glyphicon glyphicon-trash" ></i>
 </a></td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
