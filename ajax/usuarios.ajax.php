<?php  
     require_once "../controlador/usuarios.controlador.php";
     require_once "../modelo/usuarios.modelo.php";
     require_once "../vendor/autoload.php";

     class ajaxUsuarios{
        public function ListarUsuarios()
        {
            $usuarios =  usuariosControlador::ctrListarUsuarios();
            echo json_encode($usuarios);
        }
     }
     $listaUsuarios = new ajaxUsuarios();
     $listaUsuarios->ListarUsuarios();
