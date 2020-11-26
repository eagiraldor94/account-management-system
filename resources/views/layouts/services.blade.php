@extends('base_table')
	@section('title')
		Servicios
	@stop
@section('css')
@stop
@section('js')
  <!-- Personalizado -->
  <script src="Views/js/servicios.js"></script>
@stop
@section('h1')
	Lista de Servicios
@stop
@section('small')
	Servicios
@stop
@section('texto1')
	Servicios
@stop
@section('cardHeader')
    <button class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarServicio"> Agregar Servicio </button>
@stop
@section('nombreTabla') tablaServicios @stop
@section('thead')
	<thead>
      <tr>
        <th style="width:10px">#</th>
        <th>Logo</th>
        <th>Paquete</th>
        <th>Servicio 1</th>
        <th>Servicio 2</th>
        <th>VPN</th>
        <th>Observaciones 1</th>
        <th>Observaciones 2</th>
        <th>Acciones</th>
      </tr>
    </thead>
@stop
@section('modalAgregar') "modalAgregarServicio" @stop
@section('textoAgregar')
    Servicio
@stop
@section('formAdd')
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-book"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newName" placeholder="Nombre del paquete" required>
      </div>
    </div>
  </div>
  <!-- Servicios -->
  <div class="row">
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-bookmark"></i></span>
        </div>
        <input class="form-control" type="text" name="newService1" placeholder="Servicio 1" required>
      </div>
     </div>
     <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-bookmark"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newService2" placeholder="Servicio 2">
      </div>
    </div>
   </div>
  <div class="row">
      <!-- Observaciones 1 -->
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-eye"></i></span>
        </div>
        <textarea class="form-control" name="newObservations1" placeholder="Observaciones del servicio 1" rows="5"></textarea>
      </div>
    </div>
  </div>
  <div class="row">
      <!-- Observaciones 2 -->
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-eye"></i></span>
        </div>
        <textarea class="form-control" name="newObservations2" placeholder="Observaciones del servicio 2" rows="5"></textarea>
      </div>
    </div>
  </div>
  <!-- VPN -->
  <div class="row">
    <div class="form-group col-12">
      <div class="input-group mb-3">
          <div class="input-group-prepend d-md-inline-flex">
          <span class="input-group-text"><i class="fa fa-lock"></i></span>
          </div>
          <select name="newVPN" class="form-control" required>
            <option value="">¿El servicio requiere VPN?</option>
            <option value="1">SI</option>
            <option value="0">NO</option>
          </select>
        </div>
     </div>
   </div>
  <div class="row">
    <!-- foto -->
    <div class="form-group col-12">
      <div class="panel">Logotipo o Imagen</div>
      <input type="file" class="photo" name="photo">
      <p class="help-block">Peso máximo de la foto 2MB</p>
      <img src="/Views/img/usuarios/anonymous.png" class="img-thumbnail previsualizar" width="100px">
    </div>
  </div>
@stop
@section('nameNew') "newService" @stop
@section('textoAgregar2')
    Servicio
@stop
@section('modalEditar') "modalEditarServicio" @stop
@section('actionEditar') "servicios/editar" @stop
@section('textoEditar')
    Servicio
@stop
@section('formEdit')
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-book"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newName" placeholder="Nombre del paquete" id="nameEdit" required>

      <input type="hidden" name="editId" id="editId" required>
      </div>
    </div>
  </div>
  <!-- Servicios -->
  <div class="row">
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-bookmark"></i></span>
        </div>
        <input class="form-control" type="text" name="newService1" id="service1Edit"  placeholder="Servicio 1" required>
      </div>
     </div>
     <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-bookmark"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newService2" id="service2Edit"  placeholder="Servicio 2">
      </div>
    </div>
   </div>
  <div class="row">
      <!-- Observaciones 1 -->
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-eye"></i></span>
        </div>
        <textarea class="form-control" name="newObservations1" id="observations1Edit"  placeholder="Observaciones del servicio 1" rows="5"></textarea>
      </div>
    </div>
  </div>
  <div class="row">
      <!-- Observaciones 2 -->
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-eye"></i></span>
        </div>
        <textarea class="form-control" name="newObservations2" id="observations2Edit" placeholder="Observaciones del servicio 2" rows="5"></textarea>
      </div>
    </div>
  </div>
  <!-- VPN -->
  <div class="row">
    <div class="form-group col-12">
      <div class="input-group mb-3">
          <div class="input-group-prepend d-md-inline-flex">
          <span class="input-group-text"><i class="fa fa-lock"></i></span>
          </div>
          <select name="newVPN" class="form-control" id="VPNEdit" required>
            <option value="">¿El servicio requiere VPN?</option>
            <option value="1">SI</option>
            <option value="0">NO</option>
          </select>
        </div>
     </div>
   </div>
  <div class="row">
    <!-- foto -->
    <div class="form-group col-12">
      <div class="panel">Logotipo o Imagen</div>
      <input type="file" class="photo" name="photo">
      <p class="help-block">Peso máximo de la foto 2MB</p>
      <img src="/Views/img/usuarios/anonymous.png" class="img-thumbnail previsualizar" width="100px" id="photoEdit">
      <input type="hidden" name="lastPhoto" id="lastPhoto">
    </div>
  </div>
@stop
@section('nameEdit') "editService" @stop
@section('textoEditar2')
    Servicio
@stop
@section('moreForms')
@stop