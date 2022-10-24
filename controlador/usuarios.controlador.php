<?php

class usuariosControlador
{
    public function login()
    {
        if (isset($_POST["usuario"])) {
            $usuario = $_POST["usuario"];
            $password = crypt($_POST["password"], '$2a$07$usesomesillystringforsalt$');
            $respuesta = usuariosModelo::mdlIniciarSesion($usuario, $password);
            if (count($respuesta) > 0) {
                $_SESSION["usuario"] = $respuesta[0];
                echo '
                <script>
                    window.location = "http://localhost/pos-app/"
                </script>    
                
                ';
            } else {
                echo '
                <script>
                fncSweetAlert(
                    "error",
                    "Usuario y/o contraseña invalida",
                    "http://localhost/pos-app/"
                );
                </script>    
                
                ';
            }
        }
    }
    static public function ctrListarUsuarios()
    {
        $usuarios =  usuariosModelo::mdlListarUsuarios();
        return $usuarios;
    }

   
}
