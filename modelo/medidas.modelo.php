<?php
require "conexion.php";
class medidasModelo{
    static public function mdlListarMedidas()
    {
        $stmt = Conexion::conectar()->prepare("select idMedida, nombre, fRegistro, fActualizacion, estado from medidas");
        $stmt->execute();
        return $stmt->fetchAll();
    }  
    static public function mdlGuardarMedida($nombre)
    {
        $date = null; 
        $date = date("Y-m-d H:i:s");
        $stmt= conexion::conectar()->prepare("insert into medidas (nombre,fregistro) values (:nombre, :fecha)");
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $date, PDO::PARAM_STR);
         if ($stmt->execute()) {
            $resultado = "Medida Registrada";
          }else{
            $resultado = "Error de Registro";
          }    
    } 
}