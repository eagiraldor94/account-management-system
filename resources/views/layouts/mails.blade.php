@extends('base_table')
	@section('title')
		Correos
	@stop
@section('css')
@stop
@section('js')
  <!-- Personalizado -->
  <script src="Views/js/correos.js"></script>
@stop
@section('h1')
	Lista de Correos
@stop
@section('small')
	Correos
@stop
@section('texto1')
	Correos
@stop
@section('cardHeader')
    <button class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarCorreo"> Agregar correo </button>
@stop
@section('nombreTabla') tablaCorreos @stop
@section('thead')
	<thead>
      <tr>
        <th style="width:10px">#</th>
        <th>Correo</th>
        <th>Contraseña</th>
        <th>Recuperación</th>
        <th>Fecha</th>
        <th>Acciones</th>
      </tr>
    </thead>
@stop
@section('modalAgregar') "modalAgregarCorreo" @stop
@section('textoAgregar')
    Correo
@stop
@section('formAdd')
  <!-- username -->
  <div class="row">
  <div class="form-group col-12">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
      </div>
      
      <input class="form-control" type="text" name="newMailAddress" placeholder="Ingresar correo electrónico" id="newMail" required>
    </div>
    
  </div>
</div>
  <!-- contraseña -->
  <div class="row">
  <div class="form-group col-12">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-lock"></i></span>
      </div>
      
      <input class="form-control" type="text" name="newPassword" placeholder="Ingresar contraseña" required>
    </div>
    
  </div>
  </div>
  <!-- recovery -->
  <div class="row">
  <div class="form-group col-12">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-question"></i></span>
      </div>
      
      <input class="form-control" type="text" name="newRecovery" placeholder="Dato de recupercación" required>
    </div>
    
  </div>
</div>
  <!-- dia de nacimiento -->
  <div class="row">
   <div class="form-group col-12">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control datepicker" name="newBirthDate" placeholder="Fecha de nacimiento correo">
      </div>
   </div>
</div>
@stop
@section('nameNew') "newMail" @stop
@section('textoAgregar2')
    Correo
@stop
@section('modalEditar') "modalEditarCorreo" @stop
@section('actionEditar') "correos/editar" @stop
@section('textoEditar')
    Correo
@stop
@section('formEdit')
  <!-- username -->
  <div class="row">
  <div class="form-group col-12">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
      </div>
      
      <input class="form-control" type="text" name="newMailAddress" placeholder="Ingresar correo electrónico" id="editMail" required>
      <input type="hidden" name="editId" id="editId">
    </div>
    
  </div>
</div>
  <!-- contraseña -->
  <div class="row">
  <div class="form-group col-12">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-lock"></i></span>
      </div>
      
      <input class="form-control" type="text" name="newPassword" placeholder="Ingresar contraseña" id="editPassword" required>
    </div>
    
  </div>
  </div>
  <!-- recovery -->
  <div class="row">
  <div class="form-group col-12">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-question"></i></span>
      </div>
      
      <input class="form-control" type="text" name="newRecovery" placeholder="Dato de recupercación" id="editRecovery" required>
    </div>
    
  </div>
</div>
  <!-- dia de nacimiento -->
  <div class="row">
   <div class="form-group col-12">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control datepicker" name="newBirthDate" placeholder="Fecha de nacimiento correo" id="editBirthDate">
      </div>
   </div>
</div>
@stop
@section('nameEdit') "editMail" @stop
@section('textoEditar2')
    Correo
@stop
@section('moreForms')
@stop