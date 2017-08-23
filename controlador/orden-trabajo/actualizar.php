<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['id']) AND isset($_POST['codigo']) AND isset($_POST['codigo_cliente']) AND isset($_POST['unidad']) AND isset($_POST['descripcion']) AND isset($_POST['fecha_inicio']) AND isset($_POST['fecha_fin']) AND isset($_POST['cantidad'])) 
{
	
	$id          =  $funciones->validar_xss($_POST['id']);
	$codigo      =  $funciones->validar_xss($_POST['codigo']);
	$codigo_cliente =  $funciones->validar_xss($_POST['codigo_cliente']);


if (strlen($id)>0 AND strlen($codigo)>0 AND strlen($codigo_cliente)>0 ) 
{
	
$objeto      =  new Area($codigo,$codigo_cliente);
$valor       =  $objeto->actualizar($id);

if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
}
else
{
  echo  $message->mensaje("Error de Actualización","error","Consulte al área de Soporte",2);
}

} 
else 
{
echo  $message->mensaje("Algún dato esta vacío","error","Verifique de nuevo",2);
}


} 


else 
{
echo  $message->mensaje("Algúna variable no esta definida","error","Consulte al área de soporte",2);
}

/*

$id          =  $funciones->validar_xss($_POST['id']);
$codigo      =  $funciones->validar_xss($_POST['codigo']);
$descripcion =  $funciones->validar_xss($_POST['descripcion']);



$objeto      =  new Area($codigo,$descripcion);
$valor       =  $objeto->actualizar($id);

if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
}
else
{
  echo  $message->mensaje("Error de Actualización","error","Consulte al área de Soporte",2);
}

  */  

 ?>