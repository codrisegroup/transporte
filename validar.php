<?php 
//Proceso de conexiÃ³n con la base de datos
include('bd/conexionMYSQL.php');
$link=Conectarse();
//Inicio de variables de sesiÃ³n
if (!isset($_SESSION)) {
session_start();
}

//Recibir los datos ingresados en el formulari	o
$usuario= addslashes($_POST['usuario']);
$contrasena= addslashes($_POST['contrasena']);

//Consultar si los datos son estÃ¡n guardados en la base de datos
$consulta= "SELECT * FROM usuario WHERE usuario='".$usuario."' AND contrasena='".$contrasena."'"; 
$resultado= mysql_query($consulta,$link) or die (mysql_error());
$fila=mysql_fetch_array($resultado);



if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
echo '<script language = javascript>
alert("Usuario o Password errados, por favor verifique.")
self.location = "/transporte/"
</script>';
}



else //opcion2: Usuario logueado correctamente
{
//Definimos las variables de sesiÃ³n y redirigimos a la pÃ¡gina de usuario
$_SESSION['idusuario'] = $fila['idusuario'];
$_SESSION['nombres'] = $fila['nombres'];
$_SESSION['apellidos'] = $fila['apellidos'];
$_SESSION['contrasena'] = $fila['contrasena'];
$_SESSION['idarea'] = $fila['idarea'];



header("Location: /transporte/home");
}
?>
</select>