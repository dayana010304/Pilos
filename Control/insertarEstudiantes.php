<?php
include("conexion.php");
include ('../css/scrips.php');

if (isset($_POST["botonEnvio"])){
    $identificacion = $_POST["identificacion"];
    $fechaVencimiento = $_POST['fechaVencimiento'];

     // Consulta para verificar 
     $sentencia1 = $conexionBD->prepare("SELECT * FROM Estudiantes WHERE identificacion = ?", [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,]);
     $sentencia1->execute([$identificacion]);
     $numeroDeFilas = $sentencia1->rowCount();
        if ($numeroDeFilas > 0) {
            echo '<script>
                    swal({
                        icon: "error",
                        title: "Error",
                        text: "El estudiante ya existe",
                        type: "error"
                    }).then(function() {
                        window.location = "../registro.php";
                    });
                </script>';        
        }else{
            $sentencia = $conexionBD->prepare("INSERT INTO Estudiantes (identificacion, fechaVencimiento) VALUES (?,?);");
            $resultado = $sentencia->execute([$identificacion, $fechaVencimiento]);

            if ($resultado === TRUE) {
                //echo "Insertado correctamente";
                echo '<script>
                        swal({
                        icon: "success",
                        title: "Error",
                        text: "Usuario registrado correctamente",
                        }).then(function() {
                            window.location = "../registro.php";
                        });
                    </script>'; 
            }else{
                echo "Error";
        }
        
    }
}

?>