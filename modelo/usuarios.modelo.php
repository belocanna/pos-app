<?php

require_once 'conexion.php';

class usuariosModelo{
    static public function mdlIniciarSesion($usuario, $password)
    {
        $stmt = conexion::conectar()->prepare("select id,nombre from usuarios where  usuario = :usuario and clave = :contrasena");
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $password, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    static public function mdlListarUsuarios()
    {
        $stmt = conexion::conectar()->prepare("select id, documento, nombres, telefono, correo , fecha_registro, fecha_actualizacion, estado from usuarios");
        $stmt->execute();
        return $stmt->fetchAll();
    }
   
}