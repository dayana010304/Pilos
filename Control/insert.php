<?php

include("ControlConexion.php");

if (isset($_POST["botonEnvio"]))
{
    $identificacion = $_POST["identificacion"];
    $fechaVencimiento = $_POST["fechaVencimiento"];
    
    $transaccion = new ControlConexion();

    $consultaSQL="INSERT INTO usuarios (identificacion, fechaVencimiento) VALUES ('$identificacion', '$fechaVencimiento')";

    $transaccion->agregarDatos($consultaSQL);  
    
    header("location: registro.php");
}


?>