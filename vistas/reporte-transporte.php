	
	<div class="row clearfix">
	<div class="col-md-3 column">
	<div class="form-group">
	<input type="date" name="fechainicio" class="form-control" />
	</div>
	</div>
	<div class="col-md-3 column">
	<div class="form-group">
	<input type="date" name="fechainicio" class="form-control" />
	</div>
	</div>
	</div>
	
	<div class="table-responsive">
	<table class="table table-bordered table-condensed">
	<thead>
	<tr class="success">	
	<th>ID</th>
	<th>TRANSPORTISTA</th>
	<th>TRANSPORTE</th>
	<th>DISTRITO</th>
	<th>PROVEEDOR</th>
	<th>CLIENTE</th>
	<th>DIRECCIÓN</th>
	<th>COSTO</th>
	<th>CC</th>
	<th>OT</th>
	<th>FECHA</th>
	</tr>
	</thead>
	<?php 
	$link=Conectarse();
	$sql="SELECT  idreporte_transporte,proveedor_idproveedor,
	p.ruc,p.razonsocial,transporte_idtransporte,distritos_iddistritos,
	d.descripcion,t.nombre,fecha_reporte,proveedor_reporte,
	cliente_reporte,r.estado,direccion_reporte,costo_reporte,
	centcos_reporte,ot_reporte,documento_reporte,guia_reporte,
	comentario_reporte
	FROM reporte_transporte AS r INNER JOIN proveedor AS p ON
	r.proveedor_idproveedor=p.idproveedor INNER JOIN transporte AS t ON
	r.transporte_idtransporte=t.idtransporte INNER JOIN distritos AS d ON
	r.distritos_iddistritos=d.iddistritos WHERE r.estado='00'";  
	$result= mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result)==0) die("No hay registros para mostrar");
	
	while($row=mysql_fetch_array($result))
	{?>
	
	<tbody>
	<tr>
	<td><?php echo $row[idreporte_transporte]; ?></td>
	<td><?php echo $row[razonsocial]; ?></td>
	<td><?php echo $row[nombre]; ?></td>
	<td><?php echo $row[descripcion]; ?></td>
	<td><?php echo $row[proveedor_reporte]; ?></td>
	<td><?php echo $row[cliente_reporte]; ?></td>
	<td><?php echo $row[direccion_reporte]; ?></td>
	<td><?php echo $row[costo_reporte]; ?></td>
	<td><?php echo $row[centcos_reporte]; ?></td>
	<td><?php echo $row[ot_reporte]; ?></td>
	<td><?php echo date("d-m-Y", strtotime($row[fecha_reporte])); ?></td>
	</tr>
	<?php 
	
	}
	?>
	</tbody>
	</table>
	</div>
