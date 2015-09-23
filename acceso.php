<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>ACCESO</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="/transporte/include/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="/transporte/include/css/style-login.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" 
    href="/transporte/include/img/favicon.ico">
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h1 class="text-center text-primary"><b>INGRESAR</b></h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="validar.php" method="POST"
          autocomplete="Off">
            <div class="form-group">
              <input type="text" class="form-control input-lg"
              name="usuario" placeholder="usuario" autofocus required
              title="USUARIO">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg"
              name="contrasena" placeholder="contraseña" required 
              title="CONTRASEÑA" >
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">INGRESAR</button>
             
            </div>
          </form>
      </div>
      <div class="modal-footer">
        	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="/transporte/include/js/jquery.min.js"></script>
		<script src="/transporte/include/js/bootstrap.min.js"></script>
	</body>
</html>