@extends('base_layout')
@section('title')
	Error de autenticación
@stop
@section('content')
<script>
	swal({
		type: "error",
		title: "¡Su usuario o contraseña son incorrectas!",
		showConfirmButton: true,
		confirmButtonText: "Cerrar",
		closeOnConfirm: false
		}).then((result)=>{
				if(result.value){
					window.location = "/";
			}
		});
</script>
@stop