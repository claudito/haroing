<?php 
#error_reporting(0);
date_default_timezone_set('America/Lima');

#define("PATH", "http://".$_SERVER['SERVER_NAME'].substr(dirname(__FILE__).DIRECTORY_SEPARATOR,strlen($_SERVER['DOCUMENT_ROOT'])));
define("PATH","http://www.perutec.com.pe/haroing/");
define("FOLDER","/haroing/");
define("FOLDER_FILE","/var/www/html/haroing/upload/articulo_file/");
define("RUTA", dirname(__FILE__).DIRECTORY_SEPARATOR);
define("SERVER","localhost");
define("USER", "root");
define("PASS", "userperutecdb");
define("BD", "haroing");
define("FECHA",'Y-m-d');
define("MAX_FILE_SIZE", 5000000);

$key  = date('Y-m-d').$_SERVER['SERVER_NAME'].FOLDER;
define("KEY",$key);

#CONSTANTES
define("ID", "ID");
define("NOMBRES", "NOMBRES");
define("APELLIDOS", "APELLIDOS");
define("TIPO", "TIPO");





 ?>
