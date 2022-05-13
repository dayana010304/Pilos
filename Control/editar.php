<?php
include ('ControlConexion.php');

$identificacion = $_POST["identificacion"];

if(isset($_POST["consumir"])){
    $saldoConsumido = $_POST["saldoConsumido"];
    $identificacion = $_POST["identificacion"];

    $transaccion=new ControlConexion();
    $consultaSQL="INSERT INTO transacciones (identificacion, saldoConsumido) VALUES ('$identificacion', '$saldoConsumido')";
    
    $transaccion->agregarDatos($consultaSQL);
    
}

?>