$(document).ready(function(){
  var table = $('#tblLaboratorios').DataTable({
    "ajax" :{
      url: 'ajax/laboratorios.ajax.php',
      method: 'POST',
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
        console.log(respuesta);
      }
    },
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    columnDefs: [
      {targets: 6,
      orderable: false,
      render: function(data, type, full, meta) {
        if (data==0) {
          return  "<button class='btn btn-danger'>Inactivo</button>"
        }else{
          return  "<button class='btn btn-success'>Activo</button>"
        }
      }
    },
      {targets: 7,
      orderable: false,
      render: function(data, type, full, meta) {
        return "<center>" +
          "<button class='btn btn-warning' onclick = 'editarModal();'>Editar</button>" +
          "" +
          "<button class='btn btn-danger' onclick = 'desactivar();'>Desactivar</button>"
        "</center>"
      }
    }
    ],
    "columns":[
      {"data":"id"},
      {"data":"nombre"},
      {"data":"direccion"},
      {"data":"telefono"},
      {"data":"correo"},
      {"data":"estado"}
    ]
  });
  $("#btnGuardarLaboratorio").on('click', function(){
    var nombre = $("#nombrelaboratorio").val(),
    direccion = $("#direccionlaboratorio").val(),
    telefono = $("#telefonolaboratorio").val(),
    correo = $("#correolaboratorio").val()
    var datos = new FormData();
    datos.append('nombre', nombre);
    datos.append('direccion', direccion);
    datos.append('telefono', telefono);
    datos.append('correo', correo);
    $.ajax({
      url: 'ajax/laboratorios.ajax.php',
      method: 'POST',
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
        console.log(respuesta);
      }
    })
  })
}) 