<?php

class medidasControlador{
    static public function ctrListarMedidas()
    {
        $medidas =  medidasModelo::mdlListarMedidas();
        return $medidas;
    }
    static public function ctrGuardarMedida($nombre)
    {
        $respuesta = medidasModelo::mdlGuardarMedida($nombre);
        return $respuesta;
    }
}