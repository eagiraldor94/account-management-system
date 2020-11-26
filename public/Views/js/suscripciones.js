
/*================================================
=            CARGAR LA TABLA DINAMICA            =
================================================*/
$(function(){
  var table = $('.tablaSuscripciones').DataTable({

  "ajax":{
      "url": "ajax/datatable/suscripciones",
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
=            EDITAR USUARIO            =
==============================================*/
$(function(){
  $(document).on('click', '.btnEditarSuscripcion' ,function(){
    var idSuscripcion = $(this).attr("idSuscripcion");
    var datos = new FormData();
    datos.append("idSuscripcion", idSuscripcion);
    $.ajax({
      url:"ajax/suscripciones/editar",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(answer){
        $('#contractStartEdit').val(moment(answer['contract_start']).format("DD/MM/YYYY"));
        $('#contractExpirationEdit').val(moment(answer['contract_expiration']).format("DD/MM/YYYY"));
        $('#serviceStart1Edit').val(moment(answer['service_start1']).format("DD/MM/YYYY"));
        if (answer['service_start2']!=null &&answer['service_start2']!="") {
          $('#serviceStart2Edit').val(moment(answer['service_start2']).format("DD/MM/YYYY"));
          $('#serviceExpiration2Edit').val(moment(answer['service_expiration2']).format("DD/MM/YYYY"));
        }
        $('#serviceExpiration1Edit').val(moment(answer['service_expiration1']).format("DD/MM/YYYY"));
        $('#periodicityEdit').val(answer['periodicity']);
        $('#costEdit').val(answer['cost']);
        $('#languageEdit').val(answer['language']);
        $('#devicesEdit').val(answer['devices']);
        $('#observationsEdit').val(answer['observations']);
        $('#username1Edit').val(answer['username1']);
        $('#password1Edit').val(answer['password1']);
        $('#country1Edit').val(answer['country1']);
        $('#postalCode1Edit').val(answer['postal_code1']);
        $('#creditCard1Edit').val(answer['credit_card1']);
        $('#cardDate1Edit').val(answer['card_date1']);
        $('#cardCode1Edit').val(answer['card_code1']);
        $('#accOwner1Edit').val(answer['acc_owner1']);
        $('#username2Edit').val(answer['username2']);
        $('#password2Edit').val(answer['password2']);
        $('#country2Edit').val(answer['country2']);
        $('#postalCode2Edit').val(answer['postal_code2']);
        $('#creditCard2Edit').val(answer['credit_card2']);
        $('#cardDate2Edit').val(answer['card_date2']);
        $('#cardCode2Edit').val(answer['card_code2']);
        $('#accOwner2Edit').val(answer['acc_owner2']);

        $('#editId').val(answer['id']);
        $('#clientIdEdit').val(answer['client_id']);
        $('#serviceIdEdit').val(answer['service_id']);
        
      }
    })
  });
});
/*==============================================
=            ACTIVAR O DESACTIVAR USUARIO            =
==============================================*/
$(function(){
  $(document).on('click', '.btnActivar' ,function(){
    var idSuscripcion = $(this).attr("idSuscripcion");
    var estadoSuscripcion = $(this).attr("estadoSuscripcion");
    var datos = new FormData();
    datos.append("idSuscripcion", idSuscripcion);

    datos.append("estadoSuscripcion", estadoSuscripcion);
    $.ajax({
      url:"ajax/suscripciones/activar",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function(answer){
        window.location = "suscripciones";
      }
    })
  });
});
/*==============================================
=             IMPRIMIR TEXTO RESULTADO            =
==============================================*/
$(function(){
  $(document).on('click','.btnImprimirDetalles', function(){
      var codigoSuscripcion = $(this).attr("idSuscripcion");
      window.open("/imprimir/"+codigoSuscripcion,"_blank");
  });
});
/*==============================================
=            ELIMINAR SERVICIO          =
==============================================*/
$(function(){
  $(document).on( 'click', ".btnBorrarSuscripcion" ,function(){
    var idSuscripcion = $(this).attr("idSuscripcion");
    swal({
      title: '¿Está seguro de borrar la suscripción?',
      text: "¡Si no lo está puede cancelar la acción!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Confirmar borrado de suscripción'
    }).then((result)=>{
      if(result.value){
      var datos = new FormData();
      datos.append("idSuscripcion", idSuscripcion);
      $.ajax({
        url:"ajax/suscripciones/borrar",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(answer){
        }
      });
      window.location="/suscripciones";
      }
    });
  });
});