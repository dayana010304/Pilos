<?php
include("conexion.php");

if (isset($_POST["botonEnvio"])){
    $identificacion = $_POST["identificacion"];
    $fechaVencimiento = $_POST['fechaVencimiento'];

    $sentencia = $conexionBD->prepare("INSERT INTO Estudiantes (identificacion, fechaVencimiento) VALUES (?,?);");
    $resultado = $sentencia->execute([$identificacion, $fechaVencimiento]);

    if ($resultado === TRUE) {
        //echo "Insertado correctamente";
        echo '<script type="text/javascript">
                alert("Registro guardado con exito");
                window.location.href="../index.php";
            </script>';
    }else{
        echo "Error";
    }
}

?>