@php
  use Carbon\Carbon;
  setlocale(LC_TIME, 'es_ES');
  date_default_timezone_set('America/Bogota');
  $hoy = Carbon::today();
@endphp
<!-- PRODUCT LIST --> 
<div class="card">
  <div class="card-header">
    <span class="card-title">Contratos a vencer</span>
    <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
            </button>
          </div>
  </div>

  <div class="card-body">
 <!-- /.card-header -->
        @foreach ($suscripciones->sortBy('contract_expiration') as $susc)
          @if($susc->state == 1)
            @php
              $expira = Carbon::parse($susc->contract_expiration);
              $diff = $hoy->diffInDays($expira,false);
              $diffH = $hoy->diffInHours($expira);
            @endphp
            @if ($diff<0) 
              <div class="alert alert-danger alert-dismissible fade show mx-3" role="alert">
                <a>La <b>Suscripción</b> de <b>{{$susc->service->name}}</b> perteneciente a <b>{{$susc->client->name}}</b> se encuentra vencida</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @elseif ($diff<=2)
              <div class="alert alert-warning alert-dismissible fade show mx-3" role="alert">
                <a>La <b>Suscripción</b> de <b>{{$susc->service->name}}</b> perteneciente a <b>{{$susc->client->name}}</b> vence en {{$diffH}} horas</a>
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