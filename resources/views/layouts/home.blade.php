@extends('base_layout')
@if(session('id'))
	@section('title')
		Home
	@stop
@else
	@section('title')
		Login
	@stop
@endif
@section('js')
@stop
@if(session('id'))
	@section('content')
		<!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col 12 col-sm-6">
	            <h1>Bienvenido al sistema de suscripciones</h1>
	          </div>
	          <div class="col 12 col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
	              <li class="breadcrumb-item active">Tablero</li>
	            </ol>
	          </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </section>

	    <!-- Main content -->
	    <section class="content">
	      <div class="row">
	        @if (session('id'))
          		@include('layouts.dashboard.main-boxes')
			@endif
	      </div>
	    	<div class="row">
	    		<div class="col-12">
		        <!-- Default box -->
		        <div class="card">
		          <div class="card-header">
    				<button class="btn btn-default" data-toggle="modal" data-target="#modalCrearNota"> Crear nota </button>
		          </div>
		          
		          <div class="card-body">
		            <table class="table table-bordered table-striped tablaNotas dt-responsive">
					<thead>
				      <tr>
				        <th style="width:10px">#</th>
				        <th style="width: 80%">Nota</th>
				        <th>Acciones</th>
				      </tr>
				    </thead>
		            </table>
		            
		          </div>
		          <!-- /.card-body -->

		        </div>
		        <!-- /.card -->
	    		</div>
			</div>
	      <div class="row">
            <div class="col-12">
                  <div class="alert alert-primary w-100 text-center">
                  <h2>NOTIFICACIONES</h2>
                  </div>
            </div>
	        <div class="col-12">
	         @if (session('id'))
	            @include('layouts.dashboard.contratos')
	         @endif
	        </div>
	      </div>
	      <div class="row">
	         @if (session('id'))
	         	@include('layouts.dashboard.suscripciones')
	         @endif
	      </div>

	    </section>
	    <!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->
	  @include('layouts.create_note')
	  <script src="Views/js/notas.js"></script>
	@stop
@else
	@section('content')
		@include('layouts.login')
	@stop
@endif