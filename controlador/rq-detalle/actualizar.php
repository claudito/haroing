<?php 

include'../../autoload.php';
include'../../session.php';


$funciones   =  new Funciones();
$message     =  new Message();


$id          = $funciones->validar_xss($_POST['idnumero']);
$cantidad    = $funciones->validar_xss($_POST['cantidad']);
$saldo       = $funciones->validar_xss($_POST['cantidad']);
$comentario  = $funciones->validar_xss($_POST['comentario']);
$maquina     = $funciones->validar_xss($_POST['maquina']);

$requisd     = new Requisd('$numero','$item','$codigo','$descripcion','$unidad',$cantidad,$saldo,'$estado','$fecha',$comentario,'$centro_costo',$maquina,'$tipo');
$valor       = $requisd->actualizar($id);

switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>