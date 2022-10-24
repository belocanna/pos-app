
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Usuarios</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#" onclick="cargarContenido('vista/dashboard.php','content-wrapper')">Inicio</a></li>
          <li class="breadcrumb-item active">Usuarios</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
  <div class="container-fluid">
    <div class="btn-agregar-laboratorio">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalusuario" data-dismiss="modal">
        Agregar 
      </button>
    </div>
    <br>
    <br>
    <table class="table table-info table-striped" id="tblusuarios">
      <thead class="btn-info">
        <tr>
          <th>#</th>
          <th>documento</th>
          <th>Nombres</th>
          <th>Telefono</th>
          <th>Correo</th>
          <th>Registro</th>
          <th>Actualizacion</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

  </div>
</div>

<div class="modal fade" id="modalusuario">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
              <input type="hidden" class="form-control" name="idusuario" id="idusuario" value="">
                <div class="mb-3">
                  <label for="" class="form-label">Numero de Documento</label>
                  <input type="text" name="documentoUsuario" id="documentoUsuario" class="form-control" placeholder="Ingrese Numero de Documento" aria-describedby="helpId">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Telefono</label>
                  <input type="tel" name="telefonoUsuario" id="telefonoUsuario" class="form-control" placeholder="Ingrese Telefono" required>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Contraseña</label>
                  <input type="password" name="contrasenaUsuario" id="contrasenaUsuario" class="form-control" placeholder="Ingresar Password" >
                </div>
              </div>
              <div class="col-lg-6">
              <div class="mb-3">
                  <label for="" class="form-label">Nombre</label>
                  <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control" placeholder="Ingrese Nombre" required>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Correo Electronico</label>
                  <input type="email" name="correoUsuario" id="correoUsuario" class="form-control" placeholder="Ingrese Correo" required>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Repetir Contraseña</label>
                  <input type="password" name="contrasenaUsuario2" id="contrasenaUsuario2" class="form-control" placeholder="Ingresar Password" >
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="btnCancelar" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarLaboratorio">Guardar</button>
      </div>
    </div>
  </div>
</div>
  
  <script>
  $(document).ready(function() {
    var accion = "";
    var toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmation: false,
      timer: 2000
    });
    var table = $('#tblusuarios').DataTable({
      "ajax": {
        url: 'ajax/usuarios.ajax.php',
        processing: true,
        serverSide: true,
        method: 'POST',
        cache: false,
        contentType: false,
        processData: false,
        dataSrc: ""
        // success: function(respuesta){
        //   console.log(respuesta);
        // }
      },
      language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      },
      columnDefs: [{
          targets: 7,
          orderable: false,
          render: function(data, type, full, meta) {
            if (data == 0) {
              return "<button class='btn btn-danger'>Inactivo</button>"
            } else {
              return "<button class='btn btn-success'>Activo</button>"
            }
          }
        },
        {
          targets: 8,
          orderable: false,
          render: function(data, type, full, meta) {
            return "<center>" +
              "<button class='btn btn-warning btn-sm btnEditar' data-toggle='modal' data-target='#modalLaboratorio'><i class='fas fa-edit'></i></button>" +
              "<button class='btn btn-danger btn-sm btnEliminar'><i class='fas fa-trash'></i></button>" +
              "</center>"
          }
        }
      ],
      "columns": [{
          "data": "id"
        },
        {
          "data": "documento"
        },
        {
          "data": "nombres"
        },
        {
          "data": "telefono"
        },
        {
          "data": "correo"
        },
        {
          "data": "fecha_registro"
        },
        {
          "data": "fecha_actualizacion"
        },
        {
          "data": "estado"
        }
      ]
    });
  })
    </script>