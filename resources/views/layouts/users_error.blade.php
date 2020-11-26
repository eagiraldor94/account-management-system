@extends('base_layout')
@section('title')
	Error
@stop
@section('content')
<script>
	swal({
		type: "error",
		title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
		showConfirmButton: true,
		confirmButtonText: "Cerrar",
		closeOnConfirm: false
		}).then((result)=>{
				if(result.value){
					window.location = "/usuarios";
			}
		});
</script>
@stop