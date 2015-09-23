<?php
@session_start();

//Proceso de conexion con la base de datos
include('bd/conexionMYSQL.php');
//Validar si se esta ingresando con sesion correctamente
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "/transporte/"
</script>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" type="image/x-icon" 
href="/transporte/include/img/favicon.ico">
<!-- Inicio Script convertir en mayuscula al ingresar -->
<script language    =""="JavaScript">
function conMayusculas(field) {
field.value         = field.value.toUpperCase()
}
</script>
<!-- Fin Script convertir en mayuscula al ingresar-->
<title>Dashboard</title>


<!-- CSS -->
<link href="/transporte/include/css/bootstrap.min.css" rel="stylesheet">
<link href="/transporte/include/css/dashboard.css" rel="stylesheet">
<link href="/transporte/include/css/style.css" rel="stylesheet">
<script src="/transporte/include/js/ie-emulation-modes-warning.js"></script>

<!-- JS -->
<script src="/transporte/include/js/jquery.min.js"></script>
<script src="/transporte/include/js/bootstrap.min.js"></script>
<script src="/transporte/include/js/holder.js"></script>
<script src="/transporte/include/js/ie10-viewport-bug-workaround.js"></script>
</head>


<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="/transporte/home">Control de Transporte Codrise</a>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<li><a href="#"><i class="glyphicon glyphicon-user text-success"></i>
&nbsp; <?php echo $_SESSION[nombres].' '.$_SESSION[apellidos]; ?> </a></li>
<li><a href="/transporte/adios"><i class="glyphicon glyphicon-off text-danger"></i>
&nbsp;CERRAR SESSIÓN</a></li>
</ul>
<form class="navbar-form navbar-right">
<input type="text" class="form-control" placeholder="Buscar">
</form>
</div>
</div>
</nav>

<div class="container-fluid">
<div class="row">
<div class="col-sm-3 col-md-2 sidebar">
<ul class="nav nav-sidebar">
<li class="active"><a href="#">MANTENIMIENTO <span class="sr-only">(current)</span></a></li>
<li><a href="/transporte/pages/transportista">TRANSPORTISTA</a></li>
<li><a href="/transporte/pages/unidad-transporte">UNIDAD DE TRANSPORTE</a></li>
<li><a href="/transporte/consulta/proveedor">PROVEEDOR </a></li>
<li><a href="/transporte/consulta/cliente">CLIENTE</a></li>
<li><a href="/transporte/consulta/centro-costo">CENTRO DE COSTO</a></li>
</ul>

<ul class="nav nav-sidebar">
<li class="active"><a href="#">INGRESOS <span class="sr-only">(current)</span></a></li>
<li><a href="/transporte/pages/ingreso-transporte"
class="tamano">
REGISTRAR <i class="glyphicon glyphicon-plus-sign tamano"></i> </a></li>
<li><a href="/transporte/consulta/registro">LISTA </a></li>

</ul>

<ul class="nav nav-sidebar">
<li class="active"><a href="#">REPORTES <span class="sr-only">(current)</span></a></li>
<li><a href="/transporte/consulta/cabecera"
>LISTA DE REPORTES</a></li>
<li><a href="/transporte/reportes/reporte-transportistas"
>FILTRAR  X TRANSPORTISTA</a></li>
<li><a href="/transporte/reportes/reporte-ot">FILTRAR X OT</a></li>
<li><a href="/transporte/reportes/reporte-cc">FILTRAR  X CC</a></li>

</ul>
</div>
<!-- inicio contenido  -->
<!-- 
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header">Contenido</h1>




</div>
</div>-->
<!-- fin contenido -->
</div>


</body>
</html>
