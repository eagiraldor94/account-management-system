
/*================================================
=            CARGAR LA TABLA DINAMICA            =
================================================*/
$(function(){
  var table = $('.tablaServicios').DataTable({

  "ajax":{
      "url": "ajax/datatable/servicios",
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
=            SUBIR FOTO DEL USUARIO            =
==============================================*/
$(function(){
  $(document).on('change','.photo',function(){
  var imagen = this.files[0];
  // validar imagen jpg o png
  if(imagen['type'] != "image/jpeg" && imagen['type'] != "image/png"){
    $('.photo').val("");
    swal({
          title: "Error al subir la imagen",
          text: "La imagen debe estar en formato JPG o PNG",
          type: "error",
          confirmButtonText: "¡Entendido!"
        });
  }else if(imagen['size'] > 2097152){
    $('.photo').val("");
    swal({
          title: "Error al subir la imagen",
          text: "La imagen debe pesar menos de 2MB",
          type: "error",
          confirmButtonText: "¡Entendido!"
        });  
  }else{
    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function(event){
      var rutaImagen = event.target.result;
      $(".previsualizar").attr("src",rutaImagen);
    })
  }
});
});
/*==============================================
=            EDITAR USUARIO            =
==============================================*/
$(function(){
  $(document).on('click', '.btnEditarServicio' ,function(){
    var idServicio = $(this).attr("idServicio");
    var datos = new FormData();
    datos.append("idServicio", idServicio);
    $.ajax({
      url:"ajax/servicios/editar",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(answer){
        $('#nameEdit').val(answer['name']);
        $('#service1Edit').val(answer['service1']);
        $('#service2Edit').val(answer['service2']);
        $('#observations1Edit').val(answer['observations1']);
        $('#observations2Edit').val(answer['observations2']);
        $('#VPNEdit').val(answer['vpn']);

        $('#editId').val(answer['id']);
        $('#lastPhoto').val(answer['photo']);
        
        if (answer['photo'] != "" && answer['photo'] != null) {
          $('#photoEdit').attr("src",answer['photo']);
        }
        
      }
    })
  });
});
/*==============================================
=            ELIMINAR SERVICIO          =
==============================================*/
$(function(){
  $(document).on( 'click', ".btnBorrarServicio" ,function(){
    var idServicio = $(this).attr("idServicio");
    var fotoServicio = $(this).attr("fotoServicio");
    swal({
      title: '¿Está seguro de borrar el servicio?',
      text: "¡Si no lo está puede cancelar la acción!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Confirmar borrado de servicio'
    }).then((result)=>{
      if(result.value){
      var datos = new FormData();
      datos.append("idServicio", idServicio);
      datos.append("fotoServicio", fotoServicio);
      $.ajax({
        url:"ajax/servicios/borrar",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(answer){
        }
      });
      window.location="/servicios";
      }
    });
  });
});