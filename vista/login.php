<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administracion</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vista/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="vista/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vista/assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <h1 class="text-center">Iniciar Sesion</h1>
    <!-- <img src="vista/assets/dist/img/logo.jpg" alt="" srcset=""> -->
      <div class="card-header text-center">
        
      </div>
      <div class="card-body">
        <form method="post" class="needs-validation-login" novalidate>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Correo Electronico" name="usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="row">
            <?php
            $login = new usuariosControlador();
            $login->login();
            ?>
            <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
            
          </div>
          <!-- /.col -->
      </form>
    </div>



    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-card-body -->
  </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="vista/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="vista/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vista/assets/dist/js/adminlte.min.js"></script>
  <script src="vista/assets/dist/js/plantilla.js"></script>
</body>

</html>