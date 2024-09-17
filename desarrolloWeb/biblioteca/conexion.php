<?php 
    $conexion = new mysqli("localhost", "root", "", "biblioteca-a001"); 
    if(!$conexion) {
        die("Conexion fallida: ".mysqli_connect_error());
    }
?>