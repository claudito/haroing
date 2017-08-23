<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Requerimiento de Compra <?php echo $_GET['id']; ?></title>
<link rel="stylesheet" href="<?php echo PATH; ?>assets/css/estilos-pdf.css">

</head>
<body>
<?php 

$requisc  =  new Requisc();
$requisd  =  new Requisd();

 ?>
<h2>Requerimiento de Compra # <?php echo $_GET['id']; ?></h2>

<table >
<tr>
<td class="td_th_cab">USUARIO:</td>
<td class="td_th_cab"><?php echo $requisc->consulta($_GET['id'],'usuario','RQ'); ?></td>
</tr>
<tr>
<td class="td_th_cab">FECHA DE INICIO:</td>
<td class="td_th_cab"><?php echo date_format(date_create($requisc->consulta($_GET['id'],'fecha_inicio','RQ')),'d/m/Y') ?></td>
</tr>
<tr>
<td class="td_th_cab">FECHA DE FIN:</td>
<td class="td_th_cab"><?php echo date_format(date_create($requisc->consulta($_GET['id'],'fecha_fin','RQ')),'d/m/Y') ?></td>
</tr>
<tr>
<td class="td_th_cab">COMENTARIO:</td>
<td class="td_th_cab"><?php echo $requisc->consulta($_GET['id'],'comentario','RQ'); ?></td>
</tr>
<tr>
<td class="td_th_cab">CENTRO DE COSTO:</td>
<td class="td_th_cab"><?php echo $requisc->consulta($_GET['id'],'centro_costo','RQ'); ?></td>
</tr>
<tr>
<td class="td_th_cab">ORDEN DE TRABAJO:</td>
<td class="td_th_cab"><?php echo $requisc->consulta($_GET['id'],'orden_trabajo','RQ'); ?></td>
</tr>
<tr>
<td class="td_th_cab">ÁREA:</td>
<td class="td_th_cab"><?php echo $requisc->consulta($_GET['id'],'area','RQ'); ?></td>
</tr>
<tr>
<td class="td_th_cab">ESTADO:</td>
<td class="td_th_cab"><?php echo $requisc->consulta($_GET['id'],'estado','RQ'); ?></td>
</tr>
<tr>
<td class="td_th_cab">PRIORIDAD:</td>
<td class="td_th_cab">
<?php 
switch ($requisc->consulta($_GET['id'],'prioridad','RQ')) {
	case '1':
	echo "BAJA";
	break;
	case '2':
	echo "MEDIA";
	break;
	case '3':
	echo "ALTA";
	break;
	default:
	echo "?";
	break;
}

?>
</td>
</tr>

</table>


<table class="table-detalle">
<thead>
<tr>
<th class="td_th_det th_det">IT</th>
<th class="td_th_det th_det">CÓDIGO</th>
<th class="td_th_det th_det">DESCRIPCIÓN</th>
<th class="td_th_det th_det">UND</th>
<th class="td_th_det th_det">CANT</th>
<th class="td_th_det th_det">SALDO</th>
<th class="td_th_det th_det">COMENTARIO</th>
<th class="td_th_det th_det">MÁQUINA</th>
<th class="td_th_det th_det">ESTADO</th>
</tr>
</thead>
<tbody>
<?php 
foreach ($requisd->lista($_GET['id'],'RQ') as $key => $value): ?>
<tr>
<td class="td_th_det"><?php echo $value['item']; ?></td>
<td class="td_th_det"><?php echo $value['codigo_articulo']; ?></td>
<td class="td_th_det"><?php echo $value['descripcion_articulo']; ?></td>
<td class="td_th_det"><?php echo $value['unidad']; ?></td>
<td class="td_th_det"><?php echo $value['cantidad']; ?></td>
<td class="td_th_det"><?php echo $value['saldo']; ?></td>
<td class="td_th_det"><?php echo $value['comentario']; ?></td>
<td class="td_th_det"><?php echo $value['maquina']; ?></td>
<td class="td_th_det"><?php echo $value['estado']; ?></td>
</tr>
<?php endforeach ?>
</tbody>
</table>



</body>
</html>