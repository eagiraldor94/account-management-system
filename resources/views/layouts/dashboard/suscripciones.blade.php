@php
  use Carbon\Carbon;
  setlocale(LC_TIME, 'es_ES');
  date_default_timezone_set('America/Bogota');
  $hoy = Carbon::now();
@endphp
@foreach ($servicios as $key => $servicio)
  @if($servicio->name != "vpn")
    @php
      $suscripciones2 = $servicio->subscriptions;
    @endphp
    <div class="col-12 col-sm-6">
      <!-- PRODUCT LIST --> 
      <div class="card">
        <div class="card-header">
          <span class="card-title">{{$servicio->name}} / {{$servicio->service1}} a vencer</span>
          <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
        </div>

        <div class="card-body">
       <!-- /.card-header -->
              @foreach ($suscripciones2->sortBy('service_expiration1') as $suscripcion)
                @if($suscripcion->state == 1)
                  @php
                    $expira = Carbon::parse($suscripcion['service_expiration1']);
                    $diff = $hoy->diffInDays($expira,false);
                    $diffH = $hoy->diffInHours($expira);
                  @endphp
                  @if ($diff<0) 
                    <div class="alert alert-danger alert-dismissible fade show mx-3" role="alert">
                      <a>La <b>Suscripción</b> de usuario <b>{{$suscripcion->username1}}</b> se encuentra vencida</a>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @elseif ($diff<=2)
                    <div class="alert alert-warning alert-dismissible fade show mx-3" role="alert">
                      <a>La <b>Suscripción</b> de usuario <b>{{$suscripcion->username1}}</b> vence en {{$diffH}} horas</a>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @else
                    @break
                  @endif
                @endif
              @endforeach
        </div>
      </div>
      <!-- /.card -->
    </div>
    @if($servicio->service2 != null && $servicio->service2 != "")
      <div class="col-12 col-sm-6">
        <!-- PRODUCT LIST --> 
        <div class="card">
          <div class="card-header">
            <span class="card-title">{{$servicio->name}} / {{$servicio->service2}} a vencer</span>
            <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
          </div>

          <div class="card-body">
         <!-- /.card-header -->
                @foreach ($suscripciones2->sortBy('service_expiration2') as $suscripcion)
                  @if($suscripcion->state == 1)
                    @php
                      $expira = Carbon::parse($suscripcion['service_expiration2']);
                      $diff = $hoy->diffInDays($expira,false);
                      $diffH = $hoy->diffInHours($expira);
                    @endphp
                    @if ($diff<0) 
                      <div class="alert alert-danger alert-dismissible fade show mx-3" role="alert">
                        <a>La <b>Suscripción</b> de usuario <b>{{$suscripcion->username2}}</b> se encuentra vencida</a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @elseif ($diff<=2)
                      <div class="alert alert-warning alert-dismissible fade show mx-3" role="alert">
                        <a>La <b>Suscripción</b> de usuario <b>{{$suscripcion->username2}}</b> vence en {{$diffH}} horas</a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @else
                      @break
                    @endif
                  @endif
                @endforeach
          </div>
        </div>
        <!-- /.card -->
      </div>
    @endif
  @endif
@endforeach