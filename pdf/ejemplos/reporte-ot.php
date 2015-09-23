<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Document</title>
<link rel="stylesheet" type="text/css" href="css/style.css">

<?php include('bd/conexion.php'); ?>
<?php @session_start();
$USUARIO=$_SESSION[idusuario];
 ?>
</head>
<body>


<?php 
/*REALIZAMOS LA CONSULTA PARA OBTENERE EL CODIGO DEL REPORTE*/
$link=Conectarse();
$sql="SELECT * FROM usuario_codigo WHERE usuario_idusuario='$USUARIO' ";
$result =mysql_query($sql,$link);
if ($row=mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
 $CODIGO=$row[codigo_reporte];
} while ($row =mysql_fetch_array($result));
}else { 
echo "";
} 
?>


<?php 
/*REALIZAMOS LA CONSULTA PARA OBTENER DATOS DE LA CABECERA*/
$sql="SELECT * FROM reporte_cab WHERE codigo_reporte='$CODIGO'";
$result =mysql_query($sql,$link);
if ($row=mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
 $FECHA=date("d-m-Y", strtotime($row[fecha_creacion])); 
 $FECHAINICIO=date("d-m-Y", strtotime($row[fecha_inicio]));
 $FECHAFIN=date("d-m-Y", strtotime($row[fecha_fin]));
 $REQUERIMIENTO=$row[requerimiento];
} while ($row =mysql_fetch_array($result));
}else { 
echo "";
} 
?>

<?php 
/*REALIZAMOS LA CONSULTA PARA OBTENER EL COSTO TOTAL*/
$sql="SELECT transportista,sum(costo) as costo
FROM reporte_det WHERE codigo_reporte='$CODIGO'";
$result =mysql_query($sql,$link);
if ($row=mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
 $NOMBRE_TRANSPORTISTA=$row[transportista];
 $COSTO_TOTAL=$row[costo]*1.18;
} while ($row =mysql_fetch_array($result));
}else { 
echo "";
} 
?>
<div class="cabecera espacio">
<h2 class="titulo">COMERCIAL DRILLING SERVICES S.A.C</h2>
<h2>REPORTE DE SERVICIOS DE TRANSPORTE REALIZADO POR EL PROVEEDOR:
 <em class="detalle"><?php echo $NOMBRE_TRANSPORTISTA; ?></em></h2>
<h2>PERIODO:Del <em class="detalle"><?php echo $FECHAINICIO; ?></em>
al <em class="detalle"><?php echo $FECHAFIN; ?></em></h2>
<h2>FECHA DE EMISIÓN:<em class="detalle"><?php echo $FECHA; ?></em></h2>
<h2>REQUERIMIENTO:<?php echo $REQUERIMIENTO; ?></h2>
<h2>NÚMERO DE REPORTE: <em class="detalle"><?php echo $CODIGO; ?></em></h2>

<h2 class="">
<!--  
COSTO TOTAL EN NUEVOS SOLES (INCLUYE I.G.V.):S/.--> <?php //echo round($COSTO_TOTAL,2); ?></h2>
<p></p>
</div>


<div class="contenido">
<h2>detalle  general</h2>
<table class="table">
<thead>
<tr>
<th class="center">FECHA</th>
<th class="center">ÁREA</th>
<th class="center">C.C.</th>
<th class="izq">PROVEEDOR-CLIENTE</th>
<th class="izq">DISTRITO</th>
<th class="izq">DIRECCIÓN</th>
<th class="center">TIPO</th>
<th class="center">COSTO</th>
<th class="center">G/R</th>
<th class="center">OC-OS</th>
<th class="center">OT</th>
<th class="izq">COMENTARIO</th>


</tr>	
</thead>
<tbody>	
<?php 


$sql="SELECT * FROM reporte_det WHERE codigo_reporte='$CODIGO'
ORDER BY item";

$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>
<tr >
<td class="center"><?php echo date("d/m/Y", strtotime($row[fecha])); ?></td>
<td class="center"><?php echo  $row[area] ; ?></td>
<td class="center"><?php echo  $row[centro_costo] ; ?></td>
<td class="izq"><?php echo  $row[proveedor_cliente] ; ?></td>
<td class="izq"><?php echo  $row[distrito] ; ?></td>
<td class="izq"><?php echo  $row[direccion] ; ?></td>
<td class="center"><?php echo  $row[tipo_unidad] ; ?></td>
<td class="center"><?php echo  round($row[costo],2); ?></td>
<td class="center"><?php echo  $row[guia] ; ?></td>
<td class="center"><?php echo  $row[oc_os] ; ?></td>
<td class="center"><?php echo  $row[ot] ; ?></td>
<td class="izq"><?php echo  $row[comentario] ; ?></td>


</tr>

<?php
}
?>



</tbody>

</table>


</div>
<p></p>
<h2>Detalle x OT</h2>
<div class="detalle-centro-costo">
<table class="tabla">
<thead>
<tr class="cabecera alinear">
<th>ÁREA</th>
<th>OT</th>
<th>COSTO S/.</th>
<th>PORCENTAJE %</th>
</tr>   
</thead>
<tbody> 


<?php 
$sql="SELECT area,ot,sum(costo) as costo
FROM reporte_det WHERE codigo_reporte='$CODIGO'
GROUP BY ot";

$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>
<tr class="detalle alinear" >
<td ><?php echo $row[area]; ?></td>
<td ><?php echo $row[ot]; ?></td>
<td ><?php echo 'S/. '.round($row[costo]*1.18,2); ?></td>
<td ><?php echo round((($row[costo]*1.18)*100)/$COSTO_TOTAL,2).' %';?></td>
</tr>

<?php
}
?>



</tbody>

</table>

<h2 class="resaltador">COSTO TOTAL:<?php echo 'S/. '.round($COSTO_TOTAL,2).' (100%)' ?></h2>
</div>


<div class="footer">


</div>
</body>
</html>