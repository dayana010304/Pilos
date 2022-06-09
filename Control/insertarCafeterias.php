<?php

include ('conexion.php');
include ('../css/scrips.php');

if (isset($_POST["botonEnvio"]))
{
    $NombreCafeteria = $_POST["NombreCafeteria"];
    $Email = $_POST["Email"];
    $Password=$_POST["Password"];
    //$pass=password_hash($Password, PASSWORD_DEFAULT);
    $Rol = $_POST["Rol"];


    // Consulta para verificar que el registro no exista
    $sentencia1 = $conexionBD->prepare("SELECT * FROM Usuarios WHERE Email=? OR NombreCafeteria=?", [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,]);
    $sentencia1->execute([$Email, $NombreCafeteria]);  
    $numeroDeFilas = $sentencia1->rowCount();
    if ($numeroDeFilas > 0) {
        echo '<script>
                swal({
                    icon: "error",
                    title: "Error",
                    text: "El correo electronico o la cafeteria ya estan registrados",
                    type: "error"
                }).then(function() {
                    window.location = "../registroCafeterias.php";
                });
            </script>';       
    }else{
        // insertar datos 
        $sentencia = $conexionBD->prepare("INSERT INTO Usuarios (NombreCafeteria, Email, Password, Rol)VALUES (?, ?, ?, ?);");
        $resultado = $sentencia->execute([$NombreCafeteria, $Email, $Password, $Rol ]);  
        if ($resultado === TRUE) {
            //echo "Insertado correctamente";
            echo '<script>
                    swal({
                    icon: "success",
                    title: "Error",
                    text: "Usuario registrado correctamente",
                    }).then(function() {
                        window.location = "../registroCafeterias.php";
                    });
                </script>'; 
        }else{
            echo "Error";
        }
    }
} 


?>