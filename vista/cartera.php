<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Cartera</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#" onclick="cargarContenido('vista/dashboard.php','content-wrapper')">Inicio</a></li>
          <li class="breadcrumb-item active">Cartera</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
  <div class="container-fluid">
    <div class="btn-agregar-laboratorio">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalLaboratorio" data-dismiss="modal">
        Agregar 
      </button>
    </div>
    <br>
    <br>
    <table class="table table-info table-borderless" id="tblLaboratorios">
      <thead class="btn-info">
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Direccion</th>
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

<div class="modal fade" id="modalLaboratorio">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">Gestionar Laboratorio</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="mb-3">
                  <input type="hidden" class="form-control" name="idlaboratorio" id="idlaboratorio" value="">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Nombre</label>
                  <input type="text" name="nombrelaboratorio" id="nombrelaboratorio" class="form-control" placeholder="Ingrese Nombre" required>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Direccion</label>
                  <input type="text" name="direccionlaboratorio" id="direccionlaboratorio" class="form-control" placeholder="Ingrese Direccion" required>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Telefono</label>
                  <input type="tel" name="telefonolaboratorio" id="telefonolaboratorio" class="form-control" placeholder="Ingrese Telefono" required>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Correo Electronico</label>
                  <input type="email" name="correolaboratorio" id="correolaboratorio" class="form-control" placeholder="Ingrese Correo" required>
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
      toast : true,
      position : 'top-end',
      showConfirmation : false,
      timer : 2000
    });
    var table = $('#tblLaboratorios').DataTable({
      "ajax": {
        url: 'ajax/laboratorios.ajax.php',
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
      columnDefs:[
        {
          targets:0,
          visible : false,
          searchable:false
        },
        {
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
              "<button class='btn btn-warning btn-sm btnEditar' data-toggle='modal' data-target='#modalLaboratorio'>Editar</button>" +
              "<br>"+
              "<button class='btn btn-danger btn-sm btnEliminar'>Activar</button>" +
              "</center>"
          }
        }
      ],
      "columns": [{
          "data": "id"
        },
        {
          "data": "nombre"
        },
        {
          "data": "direccion"
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
    // AGREGAR LABORATORIO
    $(".btn-agregar-laboratorio").on('click', function(){
      accion = 'Registrar';
    })
    // EDITAR LABORATORIO
    $("#tblLaboratorios tbody").on('click','.btnEditar', function(){
      var data = table.row($(this).parents('tr')).data();
      accion = 'editar';
      $("#idlaboratorio").val(data["id"]);
      $("#nombrelaboratorio").val(data["nombre"]);
      $("#direccionlaboratorio").val(data["direccion"]);
      $("#telefonolaboratorio").val(data["telefono"]);
      $("#correolaboratorio").val(data["correo"]);
    })
    // ELIMINAR LABORATORIO
    $("#tblLaboratorios tbody").on('click','.btnEliminar', function(){
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
                icon:'success',
                title: 'Estado cambiado con Exito'
              })
            }
          })
        }
      })
    })
    // GUARDAR LA INFORMACION DE LABORATORIO
    $("#btnGuardarLaboratorio").on('click', function() {  
      var   id = $("#idlaboratorio").val(),
            nombre = $("#nombrelaboratorio").val(),
            direccion = $("#direccionlaboratorio").val(),
            telefono = $("#telefonolaboratorio").val(),
            correo = $("#correolaboratorio").val()
          var datos = new FormData();
          datos.append('id', id);
          datos.append('nombre', nombre);
          datos.append('direccion', direccion);
          datos.append('telefono', telefono);
          datos.append('correo', correo);
          datos.append('accion', accion);
      Swal.fire({
        title: 'CONFIRMAR',
        text: 'Seguro desea registra el Laboratorio ?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Si, deseo Registrar',
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
              $("#modalLaboratorio").modal('hide');
              table.ajax.reload(null, false);
              $("#idlaboratorio").val("");
              $("#nombrelaboratorio").val("");
              $("#direccionlaboratorio").val("");
              $("#telefonolaboratorio").val("");
              $("#correolaboratorio").val("");
              toast.fire({
                icon:'success',
                title: 'Laboratorio registrado exitosamente'
              })
            }
          })
        }
      })



    })
  })
</script>