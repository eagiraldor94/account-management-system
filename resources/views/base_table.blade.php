@php
session_start();
@endphp
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Suscripciones | @yield('title') </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
<!--=====================================
=            CSS Plugins            =
======================================-->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel="stylesheet" href="/Views/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
  <link rel="stylesheet" href="/Views/plugins/datatables/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap4.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/Views/plugins/iCheck/all.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/Views/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- Personalizado -->
  <link rel="stylesheet" href="/Views/css/plantilla.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

  @yield('css')

    <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="/Views/plugins/bootstrap/css/bootstrap.css">
    <!-- Morris chart -->
  <link rel="stylesheet" href="/Views/plugins/morris/morris.css">
  <!--=====================================
=            Javascript Plugins            =
======================================-->


  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- jQuery Number -->
  <script src="/Views/plugins/jQueryNumber/jquery.number.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/Views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="/Views/plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="/Views/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- DataTables -->
  <script src="/Views/plugins/datatables/jquery.dataTables.js"></script>
  <script src="/Views/plugins/datatables/dataTables.bootstrap4.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
  <!-- Personalizado -->
  <script src="/Views/js/plantilla.js"></script>    <!-- Personalizado -->
  <script src="/Views/js/usuarios.js"></script>
  <!-- Personalizado -->
  <script src="/Views/js/menu.js"></script>
  <!-- Personalizado -->
  <script src="/Views/js/moment.min.js"></script>

  <!-- sweet alert 2 -->
  <script src="/Views/plugins/sweet-alert-2/sweetalert2.all.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="/Views/plugins/iCheck/icheck.min.js"></script>
  <!-- InputMask -->
<script src="/Views/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/Views/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/Views/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="/Views/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/Views/plugins/morris/morris.min.js"></script><!-- ChartJS 1.0.1 -->
<script src="/Views/plugins/chartjs-old/Chart.min.js"></script>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse login-page">
<!-- Site wrapper -->
<div class="wrapper">
    @include('layouts.menu')
    @include('layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>@yield('h1')
                <small>/ @yield('small')</small></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active">@yield('texto1')</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            @yield('cardHeader')
          </div>
          
          <div class="card-body">
            <table class="table table-bordered table-striped @yield('nombreTabla') dt-responsive">
              @yield('thead')
            </table>
            
          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!--=====================================
    =          Ventana Modal Add         =
    ======================================-->
  <!-- The Modal -->
  <div class="modal fade" id=@yield('modalAgregar')>

    <div class="modal-dialog modal-lg">

      <div class="modal-content">
          <form role="form" method="post" enctype="multipart/form-data">
          @csrf
            <!-- Modal Header -->
            <div class="modal-header" style="background: #E75300 ; color: white">

              <h4 class="modal-title">Agregar @yield('textoAgregar')</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="box-body">
                @yield('formAdd')
              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-success" name=@yield('nameNew')>Guardar @yield('textoAgregar2')</button>
            </div>
        </form>

      </div>
    </div>
  </div>
    <!--=====================================
    =          Ventana Modal Edit         =
    ======================================-->
  <!-- The Modal -->
  <div class="modal fade" id=@yield('modalEditar')>

    <div class="modal-dialog modal-lg">

      <div class="modal-content">
          <form role="form" method="post" enctype="multipart/form-data" action=@yield('actionEditar') >
          @csrf
            <!-- Modal Header -->
            <div class="modal-header" style="background: #E75300 ; color: white">

              <h4 class="modal-title">Editar @yield('textoEditar')</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="box-body">
                @yield('formEdit')
              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-success" name=@yield('nameEdit')>Modificar @yield('textoEditar2')</button>
            </div>
        </form>

      </div>
    </div>
  </div>
  @yield('moreForms')
    @include('layouts.edit_me')
    @include('layouts.footer')
  </div>
</div>

  @yield('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  <!-- Personalizado -->
  <script src='/Views/dist/js/plugins/jquery.topzindex.1.2/jquery.topzindex.js'></script>
  <script src="/Views/js/datetimepicker.js"></script>

</body>
</html>
