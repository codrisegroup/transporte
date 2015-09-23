<form action="../registrar/centro-de-costo.php" method="POST" 
autocomplete="Off">
	
<div class="form-group">
<label>Centro de Costo</label>
<input type="text" name="centrocosto" class="form-control" required 
onchange="conMayusculas(this);">	
</div>

<div class="form-group">
<label>Área</label>
<input type="text" name="area" class="form-control" required 
onchange="conMayusculas(this);">	
</div>

<div class="form-group">
<button class="btn btn-primary">Registrar</button>
</div>


</form>