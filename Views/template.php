<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIEH</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Views/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="Views/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="Views/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="Views/plugins/jqvmap/jqvmap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" />

  <!-- Theme style -->
  <link rel="stylesheet" href="Views/dist/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="Views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <!-- summernote -->
  <link rel="stylesheet" href="Views/plugins/summernote/summernote-bs4.min.css">
  <!-- General Style -->
  <link rel="stylesheet" href="Views/css/app.css">

  <!-- ---------------------------------------------JAVASCRIPT FILES-------------------------------------- -->
  <!-- jQuery -->
  <!-- <script src="Views/plugins/jquery/jquery.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="Views/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- JQUERY VALIDATE -->
  <script src="Views/Plugins/jquery-validation/jquery.validate.js"></script>
  <script src="Views/plugins/jquery-validation/additional-methods.min.js"></script>
  <script src="Views/Plugins/jquery-validation/localization/messages_es.js"></script>

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="Views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="Views/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="Views/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="Views/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="Views/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="Views/plugins/jquery-knob/jquery.knob.min.js"></script>

  <!-- Tempusdominus Bootstrap 4 -->
  <script src="Views/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="Views/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="Views/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- INPUTMASK -->
  <script src="Views/plugins/moment/moment.min.js"></script>
  <script src="Views/plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- DATATABLE -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.js"></script>

  <!-- AdminLTE App -->
  <script src="Views/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="Views/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="Views/dist/js/pages/dashboard.js"></script>

  <!-- SWEET ALERT -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>



</head>



<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == 'ok') {
  echo '<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">';
  echo '<div class="wrapper">';
  include "Modules/header.php";
  include "Modules/menu.php";


  // Víncular las rutas con las vistas
  if (isset($_GET['ruta'])) {
    if (
      $_GET['ruta'] == 'home' ||
      $_GET['ruta'] == 'homeTrip' ||
      $_GET['ruta'] == 'tripulantes' ||
      $_GET['ruta'] == 'categorias' ||
      $_GET['ruta'] == 'cargos' ||
      $_GET['ruta'] == 'grados' ||
      $_GET['ruta'] == 'condiciones' ||
      $_GET['ruta'] == 'aeronaves' ||
      $_GET['ruta'] == 'misiones' ||
      $_GET['ruta'] == 'vuelos' ||
      $_GET['ruta'] == 'registroVuelos' ||
      $_GET['ruta'] == 'reportes' ||
      $_GET['ruta'] == 'perfil' ||
      $_GET['ruta'] == '404' ||
      $_GET['ruta'] == 'salir'
    ) {
      include "Modules/" . $_GET['ruta'] . ".php";
    } else {
      include "Modules/404.php";
    }
  } else {
    include "Views/Modules/home.php";
  }
  include "Modules/footer.php";
  echo '</div>';
} else {
  echo '<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed login-page">';
  include "Modules/login.php";
}
?>

<script src="Views/js/template.js"></script>
<script src="Views/js/tripulantes.js"></script>
<script src="Views/js/categoria.js"></script>
<script src="Views/js/grado.js"></script>
<script src="Views/js/condicion.js"></script>
<script src="Views/js/cargo.js"></script>
<script src="Views/js/aeronave.js"></script>
<script src="Views/js/misiones.js"></script>
<script src="Views/js/vuelos.js"></script>
<script src="Views/js/reportes.js"></script>
<script src="Views/js/validate.js"></script>
</body>

</html>