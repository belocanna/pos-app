<?php 
require_once 'conexion.php';
class pacientesModelo{
    static public function mdlListarPacientes()
    {
        $stmt = Conexion::conectar()->prepare("select id, documento, nombres, telefono, correo, fecha_nacimiento, fecha_registro, estado from pacientes");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    static public function mdlGuardarPaciente($documento, $nombres, $telefono, $fechaNacimiento, $correo)
    {
        $date = null; 
        $date = date("Y-m-d H:i:s");
        $fecha = date($fechaNacimiento);
        $stmt= conexion::conectar()->prepare("insert into pacientes (documento, nombres, telefono, fecha_nacimiento, correo, fecha_registro) values (:documento, :nombres, :telefono, :fechaNacimiento, :correo, :fecha)");
        $stmt->bindParam(":documento", $documento, PDO::PARAM_STR);
        $stmt->bindParam(":nombres", $nombres, PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
        $stmt->bindParam(":fechaNacimiento", $fecha, PDO::PARAM_STR);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $date, PDO::PARAM_STR);
         if ($stmt->execute()) {
            $resultado = "Paciente Registrado";
          }else{
            $resultado = "Error de Registro";
          }    
    }
    static public function mdlActualizarPaciente($id, $nombres, $telefono, $fechaNacimiento, $correo)
    {
        $date = null; 
        $date = date("Y-m-d H:i:s");
        $fecha = date($fechaNacimiento);
        $stmt= conexion::conectar()->prepare("update pacientes set nombres = :nombres, telefono = :telefono, fecha_nacimiento = :fechaNacimiento, correo = :correo, fecha_actualizacion = :fecha where id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":nombres", $nombres, PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
        $stmt->bindParam(":fechaNacimiento", $fecha, PDO::PARAM_STR);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $date, PDO::PARAM_STR);
         if ($stmt->execute()) {
            $resultado = "Paciente Registrado";
          }else{
            $resultado = "Error de Registro";
          }    
    }
}