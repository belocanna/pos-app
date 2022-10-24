<?php 
require_once "../controlador/medidas.controlador.php";
require_once "../modelo/medidas.modelo.php";
require_once "../vendor/autoload.php";

class ajaxMedidas{
    public $id;
    public $nombre;
    public function listarMedidas()
    {
        $respuesta =  medidasControlador::ctrListarMedidas();
        echo json_encode($respuesta);
    }
    public function registrarMedida()
    {
        $respuesta = medidasControlador::ctrGuardarMedida($this->nombre);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
}
if (!isset($_POST['accion'])) {
    $lista = new ajaxMedidas();
    $lista->listarMedidas();
}else{
    if ($_POST['accion'] == 'registrar') {
        $registrar = new ajaxMedidas();
        $registrar->nombre = $_POST['nombre'];
        $registrar->registrarMedida();
    }
}