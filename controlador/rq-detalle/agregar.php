<?php 

include'../../autoload.php';
include'../../session.php';

$idcodigo  =  $_POST['codigo'];

$articulo  =  new Articulo();
$requisc   =  new Requisc();
$funciones =  new Funciones();
$message   =  new Message();

$numero         = $funciones->validar_xss($_POST['idnumero']);
$item           = 0;
$codigo         = $funciones->validar_xss($articulo->consulta($idcodigo,'codigo'));
$descripcion    = $funciones->validar_xss($articulo->consulta($idcodigo,'descripcion'));
$unidad         = $funciones->validar_xss($articulo->consulta($idcodigo,'unidad'));
$comentario     = $funciones->validar_xss($_POST['comentario']);
$maquina        = $funciones->validar_xss($_POST['maquina']);
$tipo           = 'RQ';
$cantidad       = $funciones->validar_xss($_POST['cantidad']);
$saldo          = $funciones->validar_xss($_POST['cantidad']);
$estado         = 'P';
$ot             = '';
$centro_costo   = '';
$fecha          = date('Y-m-d');


$requisd =  new Requisd($numero,$item,$codigo,$descripcion,$unidad,$cantidad,$saldo,$estado,$fecha,$comentario,$centro_costo,$maquina,$tipo);
$valor   =  $requisd->agregar();

switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>