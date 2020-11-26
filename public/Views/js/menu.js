/*==============================================
=            Cambiando menu activo            =
==============================================*/
$(function(){
  $(document).on('click','.nav-link',function(){
    $('.nav-link').removeClass("active");
    $(this).addClass("active");
});
  var getRuta = window.location.pathname;

  switch(getRuta) {
    case '/':
        $('#inicio').addClass("active");
        $('#inicioTree').addClass("menu-open");
        break;
    case '/clientes':
        $('#clientes').addClass("active");
        break;
    case '/usuarios':
        $('#usuarios').addClass("active");
        break;
    case '/servicios':
        $('#servicios').addClass("active");
        break;
    case '/suscripciones':
        $('#suscripciones').addClass("active");
        break;
    default:
        break;
  }
});
/*==============================================
=            EDITAR USUARIO            =
==============================================*/
$(function(){
  $(document).on('click', '.btnEditarMain' ,function(){
    var idUsuario = $(this).attr("idUsuario");
    var datos = new FormData();
    datos.append("idUsuario", idUsuario);
    $.ajax({
      url:"ajax/usuarios/editarme",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(answer){
        $('#usernameEditMe').val(answer['username']);
        $('#passwordMe').val(answer['password']);
        
      }
    })
  });
});