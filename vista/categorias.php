<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Categorias de Productos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#" onclick="cargarContenido('vista/dashboard.php','content-wrapper')">Inicio</a></li>
          <li class="breadcrumb-item active">Categorias de Productos</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <table class="table table-info table-borderless" id="tblCategorias">
          <thead class="btn-info">
            <tr>
              <th>#</th>
              <th>Categoria</th>
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
      <div class="col-md-4">
        <div class="form">
          <div class="card border-primary">
            <div class="header">
              <h2>Gestionar Categorias</h2>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <input type="hidden" name="idCategoria" id="idCategoria">
                <label for="" class="form-label">Descripción|</label>
                <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>


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
    var table = $('#tblCategorias').DataTable({
      "ajax": {
        url: 'ajax/categorias.ajax.php',
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
          targets: 0,
          visible: false,
          searchable: false
        },
        {
          targets: 4,
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
          targets: 5,
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
          "data": "idCategoria"
        },
        {
          "data": "nombre"
        },
        {
          "data": "fRegistro"
        },
        {
          "data": "fActualizacion"
        }, 
        {
          "data": "estado"
        }
      ]
    });
    // AGREGAR LABORATORIO
    $(".btn-agregar-laboratorio").on('click', function() {
      accion = 'Registrar';
    })
    // EDITAR LABORATORIO
    $("#tblLaboratorios tbody").on('click', '.btnEditar', function() {
      var data = table.row($(this).parents('tr')).data();
      accion = 'editar';
      $("#idlaboratorio").val(data["id"]);
      $("#nombrelaboratorio").val(data["nombre"]);
      $("#direccionlaboratorio").val(data["direccion"]);
      $("#telefonolaboratorio").val(data["telefono"]);
      $("#correolaboratorio").val(data["correo"]);
    })
    // ELIMINAR LABORATORIO
    $("#tblLaboratorios tbody").on('click', '.btnEliminar', function() {
      var data = table.row($(this).parents('tr')).data();
      var id = data["id"],
        estado = data["estado"];
      var datos = new FormData();
      datos.append("accion", "eliminar");
      datos.append("estado", estado)
      datos.append("id", id);
      Swal.fire({
        title: 'CONFIRMAR',
        text: 'Seguro desea cambiar estado del Laboratorio ?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Si, deseo cambiarlo',
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: 'ajax/laboratorios.ajax.php',
            method: 'POST',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
              console.log(respuesta);
              table.ajax.reload(null, false);
              toast.fire({
                icon: 'success',
                title: 'Estado cambiado con Exito'
              })
            }
          })
        }
      })
    })
    // GUARDAR LA INFORMACION DE LABORATORIO
    $("#btnGuardarCategoria").on('click', function() {
      accion = 'registrar';
      var id = $("#idCategoria").val(),
        nombre = $("#nombreCategoria").val()
      var datos = new FormData();
      datos.append('id', id);
      datos.append('nombre', nombre);
      datos.append('accion', accion);
      Swal.fire({
        title: 'CONFIRMAR',
        text: 'Seguro desea registra la Categoria ?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Si, deseo Registrar',
      }).then((result) => {
        if (result.isConfirmed) {

          $.ajax({
            url: 'ajax/categorias.ajax.php',
            method: 'POST',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
              console.log(respuesta);
              table.ajax.reload(null, false);
              $("#idCategoria").val("");
              $("#nombreCategoria").val("");
              toast.fire({
                icon: 'success',
                title: 'Categoria registrada exitosamente'
              })
            }
          })
        }
      })



    })
  })
</script>