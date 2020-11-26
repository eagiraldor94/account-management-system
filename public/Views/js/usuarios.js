
/*==============================================
=            EDITAR USUARIO            =
==============================================*/
$(function(){
  $(document).on('click', '.btnEditarUsuario' ,function(){
    var idUsuario = $(this).attr("idUsuario");
    var datos = new FormData();
    datos.append("idUsuario", idUsuario);
    $.ajax({
      url:"ajax/usuarios/editar",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(answer){
        $('#usernameEdit').val(answer['username']);
        $('#password').val(answer['password']);
        
      }
    })
  });
});
/*==============================================
=            VERIFICACION DE USERNAME          =
==============================================*/
$(function(){
  $(document).on( 'change', '#newUser' ,function(){
    $(".alert").remove();
    var username = $(this).val();
    var datos = new FormData();
    datos.append("userCheck", username);
    $.ajax({
      url:"ajax/usuarios/check",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(answer){
        if (answer) {
            $("#newUser").parent().after('<div class="alert alert-warning">Este usuario ya se encuentra registrado</div>');
            $("#newUser").val("");
        }
      }
    })
  });
});
/*==============================================
=            ELIMINAR USUARIO          =
==============================================*/
$(function(){
  $(document).on( 'click', ".btnBorrarUsuario" ,function(){
    var idUsuario = $(this).attr("idUsuario");
    swal({
      title: '¿Está seguro de borrar el usuario?',
      text: "¡Si no lo está puede cancelar la acción!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Confirmar borrado de usuario'
    }).then((result)=>{
      if(result.value){
      var datos = new FormData();
      datos.append("idUsuario", idUsuario);
      $.ajax({
        url:"ajax/usuarios/borrar",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(answer){
        }
      });
      window.location="/usuarios";
      }
    });
  });
});