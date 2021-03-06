<?php 
# Cargamos la librería dompdf.
require_once '../dompdf_config.inc.php';
 
# Contenido HTML del documento que queremos generar en PDF.
ob_start();
include 'reporte-ot.php';
 
 $html=ob_get_clean();
# Instanciamos un objeto de la clase DOMPDF.
$mipdf = new DOMPDF();
 
# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
 #ini_set("memory_limit","32M");   
$mipdf ->set_paper('a4','landscape');
 
# Cargamos el contenido HTML.
#$mipdf ->load_html(utf8_decode($html));
 $mipdf ->load_html($html);
# Renderizamos el documento PDF.
$mipdf ->render();
 
# Enviamos el fichero PDF al navegador.
$mipdf ->stream('TRANSPORTISTA-DETALLE-OT.pdf');
?>
