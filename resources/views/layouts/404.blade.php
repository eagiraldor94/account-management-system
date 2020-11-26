@extends('base_layout')
@section('title')
	No se encuentra
@stop
@section('js')
@stop
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<!-- Default box -->
      <div class="card mb-5 pb-5 text-center">
        <div class="card-header bg-danger mb-3 p-4">
          <h1 class="card-title">Parece que lo que buscas no existe o no tienes permiso para acceder</h1>

        </div>
        <div class="card-body">
          <h5 >Por favor verifica la dirección en tu navegador. Si está correcta contacta al administrador.</h5>
          <div class="card-text">
            <img src="Views/img/404/preview.jpg" style="width:60%;">            
          </div>
        </div>
        <div class="card-footer">
          

        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop