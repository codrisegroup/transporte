

<form action="../registrar/proveedor.php" method="POST">
<div class="form-group">
<label>Código</label>
<input type="text" name="codigo" class="form-control" REQUIRED>
</div>	
<div class="form-group">
<label>Ruc</label>
<input type="text" name="ruc" class="form-control" REQUIRED>
</div>	
<div class="form-group">
<label>Alias</label>
<input type="text" name="alias" class="form-control" REQUIRED>
</div>	
<div class="form-group">
<label>Nombre</label>
<input type="text" name="nombre" class="form-control" REQUIRED>
</div>	
<div class="form-group">
<label>direccion</label>
<input type="text" name="direccion" class="form-control" REQUIRED>
</div>
<div class="form-group">
<label>Telefono</label>
<input type="text" name="telefono" class="form-control" REQUIRED>
</div>
<div class="form-group">
<label>Representante</label>
<input type="text" name="representante" class="form-control" REQUIRED>
</div>
<div class="form-group">
<label>Distrito</label>
<select name="distrito" class="form-control"required>
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$Sql="SELECT iddistritos,descripcion FROM distritos
WHERE descripcion!='' ORDER BY descripcion;";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['iddistritos']?>"><?php echo $row['descripcion']?></option>
<?php }?>
</select>
</div>
<div class="form-group">
<button class="btn btn-primary">REGISTRAR</button>
</div>
</form>