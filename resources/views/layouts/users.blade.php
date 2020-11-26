@extends('base_table')
	@section('title')
		Usuarios
	@stop
@section('css')
@stop
@section('js')
  <!-- Personalizado -->
  <script src="Views/js/tabla-usuarios.js"></script>
@stop
@section('h1')
	Lista de Usuarios
@stop
@section('small')
	Usuarios
@stop
@section('texto1')
	Usuarios
@stop
@section('cardHeader')
    <button class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarUsuario"> Agregar Usuario </button>
@stop
@section('nombreTabla') tablaUsuarios @stop
@section('thead')
	<thead>
      <tr>
        <th style="width:10px">#</th>
        <th>Usuario</th>
        <th>Acciones</th>
      </tr>
    </thead>
@stop
@section('modalAgregar') "modalAgregarUsuario" @stop
@section('textoAgregar')
    Usuario
@stop
@section('formAdd')
  <!-- username -->
  <div class="form-group">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-key"></i></span>
      </div>
      
      <input class="form-control" type="text" name="newUsername" placeholder="Ingresar nombre de usuario" id="newUser" required>
    </div>
    
  </div>
  <!-- contraseña -->
  <div class="form-group">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-lock"></i></span>
      </div>
      
      <input class="form-control" type="password" name="newPassword" placeholder="Ingresar contraseña" required>
    </div>
    
  </div>
@stop
@section('nameNew') "newUser" @stop
@section('textoAgregar2')
    Usuario
@stop
@section('modalEditar') "modalEditarUsuario" @stop
@section('actionEditar') "usuarios/editar" @stop
@section('textoEditar')
    Usuario
@stop
@section('formEdit')
  <!-- username -->
  <div class="form-group">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-key"></i></span>
      </div>
      
      <input class="form-control" type="text" name="newUsername" value="Editar nombre de usuario" placeholder="Editar nombre de usuario" id="usernameEdit" readonly>
    </div>
    
  </div>
  <!-- contraseña -->
  <div class="form-group">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-lock"></i></span>
      </div>
      
      <input class="form-control" type="password" name="newPassword" placeholder="Escriba la nueva contraseña (opcional)">
      <input type="hidden" name="password" id="password">
    </div>
    
  </div>
@stop
@section('nameEdit') "editUser" @stop
@section('textoEditar2')
    Usuario
@stop
@section('moreForms')
@stop