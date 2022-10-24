<?php 
  session_start();
  $routeArray = explode("/", $_SERVER['REQUEST_URI']);
  $routeArray = array_filter($routeArray);
  if (count(array_filter($routeArray)) > 1)  {
   echo '
    <script>
      window.location = "http://localhost/optical"
    </script> 
   ';
  }

  if(isset($_GET["cerrar_sesion"]) && $_GET["cerrar_sesion"] == 1){
    session_destroy();
    echo '
    <script>
      window.location = "http://localhost/optical"
    </script> 
   ';
  }

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administracion | Optical</title>
<link rel="shortcut icon" href="vista/assets/dist/img/logo.png" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="vista/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vista/assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
  <script src="vista/assets/plugins/jquery/jquery.min.js"></script>
  <script src="vista/assets/dist/js/adminlte.min.js"></script>
  <script src="vista/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vista/assets/dist/js/plantilla.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="vista/assets/dist/css/fullcalendar.min.css">
  <script src="vista/assets/dist/js/moment.min.js"></script>
  <script src="vista/assets/dist/js/fullcalendar.min.js"></script>
  <script src="vista/assets/dist/js/locale/es.js"></script>

  <!-- ============================================================
    =ESTILOS PARA USO DE DATATABLES JS
    ===============================================================-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">

  <!-- ============================================================
    =LIBRERIAS PARA USO DE DATATABLES JS
    ===============================================================-->
  <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


  <!-- ============================================================
    =LIBRERIAS PARA EXPORTAR A ARCHIVOS
    ===============================================================-->
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>


</head>
<?php if (isset($_SESSION["usuario"])) : ?>

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <?php
      include 'modulos/navbar.php';
      include 'modulos/aside.php';
      ?>
      <div class="content-wrapper">
        <?php include 'vista/dashboard.php'; ?>

      </div>
      <?php
      //include 'modulos/footer.php';
      ?>



    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->

  </body>
<?php else : ?>

  <body>
    <?php include 'vista/login.php'; ?>
  </body>
<?php endif; ?>

</html>
<script>
  function cargarContenido(paginaphp, contenedor) {
    $("." + contenedor).load(paginaphp);
  }
</script>