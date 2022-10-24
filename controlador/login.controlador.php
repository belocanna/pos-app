<?php 
session_start();
$usuario = $_POST['email'];
$pass = $_POST['contrasena'];
echo $usuario;
echo $pass;

?>