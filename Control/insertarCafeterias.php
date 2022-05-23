<?php

include ('conexion.php');

if (isset($_POST["botonEnvio"]))
{
    $NombreCafeteria = $_POST["NombreCafeteria"];
    $Email = $_POST["Email"];
    $Password=$_POST["Password"];
    //$pass=password_hash($Password, PASSWORD_DEFAULT);
    $Rol = $_POST["Rol"];

    $sentencia = $conexionBD->prepare("INSERT INTO Usuarios (NombreCafeteria, Email, Password, Rol)VALUES (?, ?, ?, ?);");
    $resultado = $sentencia->execute([$NombreCafeteria, $Email, $Password, $Rol ]);  
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