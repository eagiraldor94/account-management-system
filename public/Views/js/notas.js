
/*================================================
=            CARGAR LA TABLA DINAMICA            =
================================================*/
$(function(){
  var table = $('.tablaNotas').DataTable({

  "ajax":{
      "url": "ajax/datatable/notas",
      "type": "POST"
    },
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
    "sFirst":    "Primero",
    "sLast":     "Último",
    "sNext":     "Siguiente",
    "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

  }


 });
});
/*==============================================
=            EDITAR Nota            =
==============================================*/
$(function(){
  $(document).on('click', '.btnEditarNota' ,function(){
    var idNota = $(this).attr("idNota");
    var datos = new FormData();
    datos.append("idNota", idNota);
    $.ajax({
      url:"ajax/notas/editar",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(answer){
        $('#editId').val(answer['id']);
        $('#editContent').val(answer['content']);
      }
    })
  });
});
/*==============================================
=            ELIMINAR Nota          =
==============================================*/
$(function(){
  $(document).on( 'click', ".btnBorrarNota" ,function(){
    var idNota = $(this).attr("idNota");
    swal({
      title: '¿Está seguro de borrar el Nota?',
      text: "¡Si no lo está puede cancelar la acción!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Confirmar borrado de Nota'
    }).then((result)=>{
      if(result.value){
      var datos = new FormData();
      datos.append("idNota", idNota);
      $.ajax({
        url:"ajax/notas/borrar",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(answer){
        }
      });
      window.location="/";
      }
    });
  });
});