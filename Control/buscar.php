<?php

include("ControlConexion.php");

if ($_POST["buscar"])
{    
    $transaccion = new ControlConexion();

    $consultaSQL="SELECT * FROM usuarios WHERE identificacion like '%$buscar'";

    $transaccion->agregarDatos($consultaSQL);  
    
    header("location: registro.php");
}


?>