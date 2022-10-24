$(document).ready(function() {
    $("#tblUsuarios").DataTable({
        processing: true,
        ajax : {
            type: 'POST',
            url : 'controlador/usuarios.controlador.php',
        }
    });
})