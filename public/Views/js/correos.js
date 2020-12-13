
/*================================================
=            CARGAR LA TABLA DINAMICA            =
================================================*/
$(function(){
  var table = $('.tablaCorreos').DataTable({

  "ajax":{
      "url": "ajax/datatable/correos",
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
=            EDITAR CORREO            =
==============================================*/
$(function(){
  $(document).on('click', '.btnEditarCorreo' ,function(){
    var idCorreo = $(this).attr("idCorreo");
    var datos = new FormData();
    datos.append("idCorreo", idCorreo);
    $.ajax({
      url:"ajax/correos/editar",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(answer){
        if (answer['birth_date']!=null &&answer['birth_date']!="") {
          $('#editBirthDate').val(moment(answer['birth_date']).format("DD/MM/YYYY"));
        }
        $('#editId').val(answer['id']);
        $('#editMail').val(answer['mail']);
        $('#editPassword').val(answer['password']);
        $('#editRecovery').val(answer['recovery']);
      }
    })
  });
});
/*==============================================
=            ELIMINAR CORREO          =
==============================================*/
$(function(){
  $(document).on( 'click', ".btnBorrarCorreo" ,function(){
    var idCorreo = $(this).attr("idCorreo");
    swal({
      title: '¿Está seguro de borrar el correo?',
      text: "¡Si no lo está puede cancelar la acción!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Confirmar borrado de correo'
    }).then((result)=>{
      if(result.value){
      var datos = new FormData();
      datos.append("idCorreo", idCorreo);
      $.ajax({
        url:"ajax/correos/borrar",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(answer){
        }
      });
      window.location="/correos";
      }
    });
  });
});