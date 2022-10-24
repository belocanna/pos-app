<?php  
     require_once "../controlador/categorias.controlador.php";
     require_once "../modelo/categorias.modelo.php";
     require_once "../vendor/autoload.php";

     class ajaxCategorias{
        public $id;
        public $nombre;
        public function ListarCategorias()
        {
            $respuesta =  categoriasControlador::ctrListarCategorias();
            echo json_encode($respuesta);
        }
        public function registrarCategoria()
        {
            $respuesta = categoriasControlador::ctrGuardarCategoria($this->nombre);
            echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
        }
     }
     if (!isset($_POST['accion'])) {
        $listaCategorias = new ajaxCategorias();
        $listaCategorias->ListarCategorias(); 
     }else{
        if($_POST['accion']=='registrar'){
            $registrar = new ajaxCategorias();
            $registrar->nombre = $_POST['nombre'];
            $registrar->registrarCategoria();
        }
     }
    