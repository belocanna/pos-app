<?php 

require "conexion.php";

class categoriasModelo{
    static public function mdlListarCategorias()
    {
        $stmt = Conexion::conectar()->prepare("select idCategoria, nombre, fRegistro, fActualizacion, estado from categorias");
        $stmt->execute();
        return $stmt->fetchAll();
    }  
    static public function mdlGuardarCategoria($nombre)
    {
        $date = null; 
        $date = date("Y-m-d H:i:s");
        $stmt= conexion::conectar()->prepare("insert into categorias (nombre,fregistro) values (:nombre, :fecha)");
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $date, PDO::PARAM_STR);
         if ($stmt->execute()) {
            $resultado = "Categoria Registrada";
          }else{
            $resultado = "Error de Registro";
          }    
    } 
}