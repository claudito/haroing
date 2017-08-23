<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];
$requisd  =  new Requisd();
$carpeta  =  "rq-detalle";

?>

<form id="actualizar">
 	
<div class="form-group">
<label>CÓDIGO</label>
<input type="text" name="codigo" class="form-control" value="<?php echo $requisd->consulta($id,'codigo_articulo').' - '.$requisd->consulta($id,'descripcion_articulo'); ?>" readonly>
</div>


<div class="form-group">
<label>CANTIDAD</label>
<input type="number" min="1" step="any" name="cantidad" id="" class="form-control" required=""  
 value="<?php echo round($requisd->consulta($id,'cantidad'),2); ?>">
</div>

<div class="form-group">
<label>COMENTARIO</label>
<textarea name="comentario"  rows="3" class="form-control" required="" onchange="Mayusculas(this)"><?php echo $requisd->consulta($id,'comentario'); ?></textarea>
</div>

<div class="form-group">
<label>MÁQUINA</label>
<input type="text"  name="maquina" id="" class="form-control" required="" value="<?php echo $requisd->consulta($id,'maquina'); ?>" onchange="Mayusculas(this)">
</div>

<input type="hidden"  name="idnumero"  id="idnumero"  value="<?php echo $id; ?>">


<button type="submit" class="btn btn-primary">Agregar</button>


 </form>

 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#editModal').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1,<?php echo $requisd->consulta($id,'numero'); ?>);
          }
      });
  });
</script>