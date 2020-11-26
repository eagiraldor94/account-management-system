@php
session_start();
@endphp
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
  <script src="/Views/js/plantilla.js"></script>
    <!-- Personalizado -->
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
    @if(session('id'))
      @include('layouts.menu')
      @include('layouts.sidebar')
    @endif
    @yield('content')
    @if(session('id'))
      @include('layouts.edit_me')
      @include('layouts.footer')
    @endif
  </div>
</div>

  @yield('js')
</body>
</html>
