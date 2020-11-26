
/*================================================
=            CARGAR LA TABLA DINAMICA            =
================================================*/
$(function(){
  var table = $('.tablaClientes').DataTable({

  "ajax":{
      "url": "ajax/datatable/clientes",
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
  $(document).on('click', '.btnEditarCliente' ,function(){
    var idCliente = $(this).attr("idCliente");
    var datos = new FormData();
    datos.append("idCliente", idCliente);
    $.ajax({
      url:"ajax/clientes/editar",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(answer){
        $('#nameEdit').val(answer['name']);
        $('#phoneEdit').val(answer['phone']);
        $('#emailEdit').val(answer['email']);
        $('#countryEdit').val(answer['country']);

        $('#editId').val(answer['id']);
        
      }
    })
  });
});
/*==============================================
=            ELIMINAR SERVICIO          =
==============================================*/
$(function(){
  $(document).on( 'click', ".btnBorrarCliente" ,function(){
    var idCliente = $(this).attr("idCliente");
    swal({
      title: '¿Está seguro de borrar el cliente?',
      text: "¡Si no lo está puede cancelar la acción!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Confirmar borrado de cliente'
    }).then((result)=>{
      if(result.value){
      var datos = new FormData();
      datos.append("idCliente", idCliente);
      $.ajax({
        url:"ajax/clientes/borrar",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(answer){
        }
      });
      window.location="/clientes";
      }
    });
  });
});