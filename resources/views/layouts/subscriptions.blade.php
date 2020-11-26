@extends('base_table')
	@section('title')
		Suscripciones
	@stop
@section('css')
@stop
@section('js')
  <!-- Personalizado -->
  <script src="Views/js/suscripciones.js?v=2"></script>
@stop
@section('h1')
	Lista de Suscripciones
@stop
@section('small')
	Suscripciones
@stop
@section('texto1')
	Suscripciones
@stop
@section('cardHeader')
    <button class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarSuscripcion"> Agregar Suscripción </button>
@stop
@section('nombreTabla') tablaSuscripciones @stop
@section('thead')
	<thead>
      <tr>
        <th style="width:10px">#</th>
        <th>Cliente</th>
        <th>Vto. Contrato</th>
        <th>Estado</th>
        <th>Servicios</th>
        <th>Vto. Servicios</th>
        <th>Usuarios</th>
        <th>Contraseñas</th>
        <th>Observaciones</th>
        <th>Tarjetas</th>
        <th>Vto. Tarjetas</th>
        <th>Codigo Tarjetas</th>
        <th>Pais</th>
        <th>Postal</th>
        <th>Nombre Cuenta</th>
        <th>Periodicidad</th>
        <th>Valor</th>
        <th>Idioma</th>
        <th>Dispositivos</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Acciones</th>
      </tr>
    </thead>
@stop
@section('modalAgregar') "modalAgregarSuscripcion" @stop
@section('textoAgregar')
    Suscripción
@stop
@section('formAdd')
  <div class="row">
    <div class="form-group col-12">
      <div class="input-group mb-3">
          <div class="input-group-prepend d-md-inline-flex">
          <span class="input-group-text"><i class="fa fa-user"></i></span>
          </div>
          <select name="newClientId" class="form-control" required>
            <option value="">Cliente</option>
            @foreach ($clientes as $key => $cliente)
              <option value="{{$cliente->id}}">{{$cliente->name}}</option>
            @endforeach
          </select>
        </div>
     </div>
  </div>
  <div class="row">
    <div class="form-group col-12">
      <div class="input-group mb-3">
          <div class="input-group-prepend d-md-inline-flex">
          <span class="input-group-text"><i class="fa fa-book"></i></span>
          </div>
          <select name="newServiceId" class="form-control" required>
            <option value="">Paquete</option>
            @foreach ($servicios as $key => $servicio)
              <option value="{{$servicio->id}}">{{$servicio->name}}</option>
            @endforeach
          </select>
        </div>
     </div>
  </div>
  <div class="row">
        <div class="alert alert-secondary w-100">
        <h2>CONTRATO</h2>
        </div>
  </div>
 <div class="row">
<!-- Fecha de inicio -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control datepicker" name="newContractStart" placeholder="Inicio contrato" required>
      </div>
   </div>
<!-- Fecha de terminacion -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control datepicker" name="newContractExpiration" placeholder="Fin contrato" required>
      </div>
   </div>
 </div>
  <div class="row">  
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
          <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
        </div>
        <input class="form-control" type="number" name="newPeriodicity" placeholder="Periodicidad (en Meses)" required>
      </div>
    </div>
    <!-- Valor -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newCost" placeholder="Valor (Ej: 1 USD)" required>
      </div>
    </div>
  </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-language"></i></span>
        </div>
        <input class="form-control" type="text" name="newLanguage" placeholder="Idioma" required>
      </div>
    </div>
  </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-laptop"></i></span>
        </div>
        <textarea class="form-control" rows="3" name="newDevices" placeholder="Dispositivos"></textarea>
      </div>
    </div>
  </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-bullseye"></i></span>
        </div>
        <textarea class="form-control" rows="3" name="newObservations" placeholder="Observaciones"></textarea>
      </div>
    </div>
  </div>
  <div class="row">
        <div class="alert alert-secondary w-100">
        <h2>SERVICIO 1</h2>
        </div>
  </div>
 <div class="row">
<!-- Fecha de inicio -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control datepicker" name="newServiceStart1" placeholder="Inicio servicio 1" required>
      </div>
   </div>
<!-- Fecha de terminacion -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control datepicker" name="newServiceExpiration1" placeholder="Fin servicio 1" required>
      </div>
   </div>
 </div>
   <div class="row">
    <!-- username -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-key"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newUsername1" placeholder="Nombre de usuario" required>
      </div>
      
    </div>
    <!-- contraseña -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-lock"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newPassword1" placeholder="Contraseña" required>
      </div>
    </div>
  </div>
   <div class="row">
    <!-- pais -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-globe"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newCountry1" placeholder="Pais" required>
      </div>
      
    </div>
    <!-- codigo postal -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-inbox"></i></span>
        </div>
        <input class="form-control" type="text" name="newPostalCode1" placeholder="Codigo Postal" required>
      </div>
    </div>
  </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
        </div>
        <input class="form-control" type="number" name="newCreditCard1" placeholder="Número de la tarjeta" required>
      </div>
    </div>
  </div>
 <div class="row">
<!-- Fecha de vto -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control" name="newCardDate1" placeholder="Vencimiento tarjeta" required>
      </div>
   </div>
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
          <span class="input-group-text">CVC/CVV</span>
        </div>
        <input class="form-control" type="number" name="newCardCode1" placeholder="Código tarjeta" required>
      </div>
    </div>
 </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-user"></i></span>
        </div>
        <input class="form-control" type="text" name="newAccOwner1" placeholder="Nombre cuenta">
      </div>
    </div>
  </div>
  <div class="row">
        <div class="alert alert-secondary w-100">
        <h2>SERVICIO 2</h2>
        </div>
  </div>
 <div class="row">
<!-- Fecha de inicio -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control datepicker" name="newServiceStart2" placeholder="Inicio servicio 2">
      </div>
   </div>
<!-- Fecha de terminacion -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control datepicker" name="newServiceExpiration2" placeholder="Fin servicio 2">
      </div>
   </div>
 </div>
   <div class="row">
    <!-- username -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-key"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newUsername2" placeholder="Nombre de usuario">
      </div>
      
    </div>
    <!-- contraseña -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-lock"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newPassword2" placeholder="Contraseña">
      </div>
    </div>
  </div>
   <div class="row">
    <!-- pais -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-globe"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newCountry2" placeholder="Pais">
      </div>
      
    </div>
    <!-- codigo postal -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-inbox"></i></span>
        </div>
        <input class="form-control" type="text" name="newPostalCode2" placeholder="Codigo Postal">
      </div>
    </div>
  </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
        </div>
        <input class="form-control" type="number" name="newCreditCard2" placeholder="Número de la tarjeta">
      </div>
    </div>
  </div>
 <div class="row">
<!-- Fecha de vto -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control" name="newCardDate2" placeholder="Vencimiento tarjeta">
      </div>
   </div>
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
          <span class="input-group-text">CVC/CVV</span>
        </div>
        <input class="form-control" type="number" name="newCardCode2" placeholder="Código tarjeta">
      </div>
    </div>
 </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-user"></i></span>
        </div>
        <input class="form-control" type="text" name="newAccOwner2" placeholder="Nombre cuenta">
      </div>
    </div>
  </div>
@stop
@section('nameNew') "newSubscription" @stop
@section('textoAgregar2')
    Suscripcion
@stop
@section('modalEditar') "modalEditarSuscripcion" @stop
@section('actionEditar') "suscripciones/editar" @stop
@section('textoEditar')
    Suscripcion
@stop
@section('formEdit')
  <div class="row">
    <div class="form-group col-12">
      <div class="input-group mb-3">
          <div class="input-group-prepend d-md-inline-flex">
          <span class="input-group-text"><i class="fa fa-user"></i></span>
          </div>
          <select name="newClientId" class="form-control" id="clientIdEdit" required>
            <option value="">Cliente</option>
            @foreach ($clientes as $key => $cliente)
              <option value="{{$cliente->id}}">{{$cliente->name}}</option>
            @endforeach
          </select>
          <input type="hidden" name="editId" id="editId" required>
        </div>
     </div>
  </div>
  <div class="row">
    <div class="form-group col-12">
      <div class="input-group mb-3">
          <div class="input-group-prepend d-md-inline-flex">
          <span class="input-group-text"><i class="fa fa-book"></i></span>
          </div>
          <select name="newServiceId" class="form-control" id="serviceIdEdit" required>
            <option value="">Paquete</option>
            @foreach ($servicios as $key => $servicio)
              <option value="{{$servicio->id}}">{{$servicio->name}}</option>
            @endforeach
          </select>
        </div>
     </div>
  </div>
  <div class="row">
        <div class="alert alert-secondary w-100">
        <h2>CONTRATO</h2>
        </div>
  </div>
 <div class="row">
<!-- Fecha de inicio -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control datepicker" name="newContractStart" placeholder="Inicio contrato" id="contractStartEdit" required>
      </div>
   </div>
<!-- Fecha de terminacion -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control datepicker" name="newContractExpiration" placeholder="Fin contrato" id="contractExpirationEdit" required>
      </div>
   </div>
 </div>
  <div class="row">  
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
          <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
        </div>
        <input class="form-control" type="number" name="newPeriodicity" placeholder="Periodicidad (en Meses)" id="periodicityEdit" required>
      </div>
    </div>
    <!-- Valor -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newCost" placeholder="Valor (Ej: 1 USD)" id="costEdit" required>
      </div>
    </div>
  </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-language"></i></span>
        </div>
        <input class="form-control" type="text" name="newLanguage" placeholder="Idioma" id="languageEdit" required>
      </div>
    </div>
  </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-laptop"></i></span>
        </div>
        <textarea class="form-control" rows="3" name="newDevices" placeholder="Dispositivos" id="devicesEdit"></textarea>
      </div>
    </div>
  </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-bullseye"></i></span>
        </div>
        <textarea class="form-control" rows="3" name="newObservations" placeholder="Observaciones" id="observationsEdit"></textarea>
      </div>
    </div>
  </div>
  <div class="row">
        <div class="alert alert-secondary w-100">
        <h2>SERVICIO 1</h2>
        </div>
  </div>
 <div class="row">
<!-- Fecha de inicio -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control datepicker" name="newServiceStart1" placeholder="Inicio servicio 1" id="serviceStart1Edit" required>
      </div>
   </div>
<!-- Fecha de terminacion -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control datepicker" name="newServiceExpiration1" placeholder="Fin servicio 1" id="serviceExpiration1Edit" required>
      </div>
   </div>
 </div>
   <div class="row">
    <!-- username -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-key"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newUsername1" placeholder="Nombre de usuario" id="username1Edit" required>
      </div>
      
    </div>
    <!-- contraseña -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-lock"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newPassword1" placeholder="Contraseña" id="password1Edit" required>
      </div>
    </div>
  </div>
   <div class="row">
    <!-- pais -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-globe"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newCountry1" placeholder="Pais" id="country1Edit" required>
      </div>
      
    </div>
    <!-- codigo postal -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-inbox"></i></span>
        </div>
        <input class="form-control" type="text" name="newPostalCode1" placeholder="Codigo Postal" id="postalCode1Edit" required>
      </div>
    </div>
  </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
        </div>
        <input class="form-control" type="number" name="newCreditCard1" placeholder="Número de la tarjeta" id="creditCard1Edit" required>
      </div>
    </div>
  </div>
 <div class="row">
<!-- Fecha de vto -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control" name="newCardDate1" placeholder="Vencimiento tarjeta" id="cardDate1Edit" required>
      </div>
   </div>
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
          <span class="input-group-text">CVC/CVV</span>
        </div>
        <input class="form-control" type="number" name="newCardCode1" placeholder="Código tarjeta" id="cardCode1Edit" required>
      </div>
    </div>
 </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-user"></i></span>
        </div>
        <input class="form-control" type="text" name="newAccOwner1" placeholder="Nombre cuenta" id="accOwner1Edit">
      </div>
    </div>
  </div>
  <div class="row">
        <div class="alert alert-secondary w-100">
        <h2>SERVICIO 2</h2>
        </div>
  </div>
 <div class="row">
<!-- Fecha de inicio -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control datepicker" name="newServiceStart2" placeholder="Inicio servicio 2" id="serviceStart2Edit">
      </div>
   </div>
<!-- Fecha de terminacion -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control datepicker" name="newServiceExpiration2" placeholder="Fin servicio 2" id="serviceExpiration2Edit">
      </div>
   </div>
 </div>
   <div class="row">
    <!-- username -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-key"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newUsername2" placeholder="Nombre de usuario" id="username2Edit">
      </div>
      
    </div>
    <!-- contraseña -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-lock"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newPassword2" placeholder="Contraseña" id="password2Edit">
      </div>
    </div>
  </div>
   <div class="row">
    <!-- pais -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-globe"></i></span>
        </div>
        
        <input class="form-control" type="text" name="newCountry2" placeholder="pais" id="country2Edit">
      </div>
      
    </div>
    <!-- codigo postal -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-inbox"></i></span>
        </div>
        <input class="form-control" type="text" name="newPostalCode2" placeholder="Codigo Postal" id="postalCode2Edit">
      </div>
    </div>
  </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
        </div>
        <input class="form-control" type="number" name="newCreditCard2" placeholder="Número de la tarjeta" id="creditCard2Edit">
      </div>
    </div>
  </div>
 <div class="row">
<!-- Fecha de vto -->
   <div class="form-group col-12 col-sm-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
        <input type="text" class="form-control" name="newCardDate2" placeholder="Vencimiento tarjeta" id="cardDate2Edit">
      </div>
   </div>
    <div class="form-group col-12 col-sm-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend d-md-inline-flex">
          <span class="input-group-text">CVC/CVV</span>
        </div>
        <input class="form-control" type="number" name="newCardCode2" placeholder="Código tarjeta" id="cardCode2Edit">
      </div>
    </div>
 </div>
  <div class="row">  
    <div class="form-group col-12">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-user"></i></span>
        </div>
        <input class="form-control" type="text" name="newAccOwner2" placeholder="Nombre cuenta" id="accOwner2Edit">
      </div>
    </div>
  </div>
@stop
@section('nameEdit') "editSubscription" @stop
@section('textoEditar2')
    Suscripción
@stop
@section('moreForms')
@stop