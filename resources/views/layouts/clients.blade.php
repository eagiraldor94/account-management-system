@extends('base_table')
	@section('title')
		Clientes
	@stop
@section('css')
@stop
@section('js')
  <!-- Personalizado -->
  <script src="Views/js/clientes.js"></script>
@stop
@section('h1')
	Lista de Clientes
@stop
@section('small')
	Clientes
@stop
@section('texto1')
	Clientes
@stop
@section('cardHeader')
    <button class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarCliente"> Agregar Cliente </button>
@stop
@section('nombreTabla') tablaClientes @stop
@section('thead')
	<thead>
      <tr>
        <th style="width:10px">#</th>
        <th>Cliente</th>
        <th>Suscripciones</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Pais</th>
        <th>Acciones</th>
      </tr>
    </thead>
@stop
@section('modalAgregar') "modalAgregarCliente" @stop
@section('textoAgregar')
    Cliente
@stop
@section('formAdd')
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-user"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newName" placeholder="Nombre del cliente" required>
      </div>
    </div>
  </div>
  <!-- Telefono -->
  <div class="row">
    <div class="form-group col-12">
      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-phone-square"></i></span>
      </div>
      <input class="form-control" type="text" name="newPhone" placeholder="Teléfono">
    </div>
     </div>
   </div>
   <div class="row">
  <!-- Email -->
    <div class="form-group col-12">
      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
      </div>
      <input class="form-control" type="email" name="newEmail" placeholder="Email" required>
    </div>
     </div>
   </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-globe"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newCountry" placeholder="Pais" required>
      </div>
    </div>
  </div>
@stop
@section('nameNew') "newClient" @stop
@section('textoAgregar2')
    Cliente
@stop
@section('modalEditar') "modalEditarCliente" @stop
@section('actionEditar') "clientes/editar" @stop
@section('textoEditar')
    Cliente
@stop
@section('formEdit')
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-user"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newName" id="nameEdit" placeholder="Nombre del cliente" required>

      <input type="hidden" name="editId" id="editId" required>
      </div>
    </div>
  </div>
  <!-- Telefono -->
  <div class="row">
    <div class="form-group col-12">
      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-phone-square"></i></span>
      </div>
      <input class="form-control" type="text" name="newPhone" id="phoneEdit" placeholder="Teléfono">
    </div>
     </div>
   </div>
   <div class="row">
  <!-- Email -->
    <div class="form-group col-12">
      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
      </div>
      <input class="form-control" type="email" name="newEmail" id="emailEdit" placeholder="Email" required>
    </div>
     </div>
   </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-globe"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newCountry" id="countryEdit" placeholder="Pais" required>
      </div>
    </div>
  </div>
@stop
@section('nameEdit') "editClient" @stop
@section('textoEditar2')
    Cliente
@stop
@section('moreForms')
@stop