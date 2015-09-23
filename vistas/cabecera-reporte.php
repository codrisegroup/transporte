
	<div class="table-responsive">
	<table class="table table-bordered table-condensed">
	<thead>
	<tr  class="success">	
	<th>CÓDIGO</th>
	<th>RUC</th>
	<th>RAZÓN SOCIAL</th>
	<th>FECHA</th>
	<th>FECHA INICIO</th>
	<th>FECHA FIN</th>
	<th><a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-zoom-in"></i></th>
	<th><a href="#" class="btn btn-success">EXCEL</th>
	<th><a href="#" class="btn btn-warning">PDF</th>
	</tr>
	</thead>
	<?php 
	$link=Conectarse();
	$sql="SELECT codigo_reporte,
	DATE_FORMAT(r.fecha_creacion,'%d/%m/%Y - %H:%i:%s') AS fecha,
	p.ruc,p.razonsocial,r.fecha_inicio,r.fecha_fin
	 FROM reporte_cab as r INNER JOIN proveedor as p 
	 ON r.proveedor_idproveedor=p.idproveedor ORDER BY codigo_reporte ";  
	$result= mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result)==0) die("No hay registros para mostrar");
	
	while($row=mysql_fetch_array($result))
	{?>
	
	<tbody>
	<tr>
	<td><?php echo $row[codigo_reporte]; ?></td>
	<td><?php echo $row[ruc]; ?></td>
	<td><?php echo $row[razonsocial]; ?></td>
	<td><?php echo $row[fecha]; ?></td>
	<td><?php echo date("d-m-Y", strtotime($row[fecha_inicio])); ?></td>
	<td><?php echo date("d-m-Y", strtotime($row[fecha_fin])); ?></td>
	<td style="text-align: center" >
	<a href="/transporte/pages/detalle-reporte?codigo=<?php echo $row[codigo_reporte]; ?>"
	 target="_blank" class="btn btn-primary" title="CONSULTAR">
	<i class="glyphicon glyphicon-zoom-in"></i></a></td>
	<td>
	<a href="/transporte/reporte-excel/reporteexcel.php?codigo=<?php echo $row[codigo_reporte]; ?>&
	nombre=<?php echo $row[razonsocial]; ?>"
	 target="_blank" class="btn btn-success" title="EXPORTAR EXCEL">EXCEL
	</a>
	</td>
	<!-- 		
	<td>
	<a href="/transporte/reporte-excel/reporte-costo.php?codigo=<?php echo $row[codigo_reporte]; ?>&
	nombre=<?php echo $row[razonsocial]; ?>"
	 target="_blank" class="btn btn-success">CC
	</a>
	</td> -->
	<td><a href="../actualizar/pdf?codigo=<?php echo $row[codigo_reporte]; ?>"
	 class="btn btn-warning">PDF</a></td>
	</tr>
	<?php 
	
	}
	 ?>
	</tbody>
	</table>
	</div>
