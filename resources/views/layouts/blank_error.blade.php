@extends('base_layout')
@section('title')
	Error de autenticación
@stop
@section('content')
<script>
	swal({
		type: "error",
		title: "¡Debe llenar los campos de usuario y contraseña!",
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