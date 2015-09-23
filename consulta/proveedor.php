
<!DOCTYPE html>
<html>
<head>
<title>PROVEEDOR</title>
<meta charset="UTF-8">
<!--    ESTILO GENERAL   -->
<?php include('../header.php'); ?>
<link type="text/css" href="css/style.css" rel="stylesheet" />
<!--    ESTILO GENERAL    -->
<!--    JQUERY   -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="funcion/proveedor.js"></script>
<!--    JQUERY    -->
<!--    FORMATO DE TABLAS -->  
<link type="text/css" href="css/demo_table.css" rel="stylesheet" /> 
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<!--    FORMATO DE TABLAS    -->

</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header text-primary">Registrar Proveedor</h1>

<div class="row clearfix">
<div class="col-md-12 column">
<div class="form-group">
<a id="modal-562649" href="#modal-container-562649" 
role="button" class="btn btn-primary btn-lg" 
data-toggle="modal">Registrar Proveedor</a>

<div class="modal fade" id="modal-container-562649" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
×
</button>
<h4 class="modal-title" id="myModalLabel">
REGISTRAR PROVEEDOR
</h4>
</div>
<div class="modal-body">
<?php include('../formularios/proveedor.php'); ?>
</div>
<div class="modal-footer">

<button type="button" class="btn btn-default" data-dismiss="modal">
Cerrar
</button> 

</div>
</div>

</div>

</div>

</div>
</div>
</div>


<div class="row clearfix">
<div class="col-md-12 column">
<article id="contenido">
</article>
</div>
</div>




</div>

</body>
</html>