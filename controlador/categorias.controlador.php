<?php

class categoriasControlador{
    static public function ctrListarCategorias()
    {
        $categorias =  categoriasModelo::mdlListarCategorias();
        return $categorias;
    }
    static public function ctrGuardarCategoria($nombre)
    {
        $respuesta = categoriasModelo::mdlGuardarCategoria($nombre);
        return $respuesta;
    }
   
}