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
<title>Bootstrap 3, from LayoutIt!</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
<!--script src="js/less-1.3.3.min.js"></script-->
<!--append ‘#!watch’ to the browser URL, then refresh the page. -->

<link href="/transporte/include/css/bootstrap.min.css" rel="stylesheet">

<link href="/transporte/include/css/style.css" rel="stylesheet">
<link href="/transporte/include/css/sticky.css" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="/transporte/include/img/favicon.ico">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<![endif]-->



<script type="text/javascript" src="/transporte/include/js/jquery.min.js"></script>
<script type="text/javascript" src="/transporte/include/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/transporte/include/js/scripts.js"></script>
</head>

<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" 
data-target="#bs-example-navbar-collapse-1"> 
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span><span class="icon-bar">
	
</span><span class="icon-bar"></span></button>
 <a class="navbar-brand" href="#" >Control de Transporte Codrise</a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

<ul class="nav navbar-nav navbar-right">
<li><a href="#"><i class="glyphicon glyphicon-user text-success"></i>
&nbsp;<?php echo $_SESSION[nombres].' '.$_SESSION[apellidos]; ?></a></li>
<li><a href="#" onclick="window.close();"
><i class="glyphicon glyphicon-remove-circle text-danger"></i>
&nbsp;CERRAR</a></li>
</ul>
</div>

</nav>
</div>
</div>
</div>
</body>
</html>
