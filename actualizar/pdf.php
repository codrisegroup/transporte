<?php 
@session_start();
include('../bd/conexionMYSQL.php');
$link=Conectarse();
$CODIGO=$_REQUEST[codigo];
$USUARIO=$_SESSION[idusuario];
$Sql="UPDATE usuario_codigo set codigo_reporte='$CODIGO',
fecha_actualizacion=now() WHERE usuario_idusuario='$USUARIO'";

$result=mysql_query($Sql);

if (!$result) {echo "error";}
else
{

header('Location: /transporte/pdf/ejemplos/generar-pdf.php');	
}

 ?>