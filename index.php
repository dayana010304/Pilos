<?php

    include('./Control/conexion.php');
    include('./css/scrips.php');

    session_start();

    if(isset($_GET['cerrar'])){
        session_unset();
        
        session_destroy();

    }

    if (isset($_SESSION['Rol'])){
        switch($_SESSION['Rol']){
            case 1:
                header('location: registroCafeterias.php');
            break;

            case 2: 
                header('location: registro.php');
            break;

            case 3:
                header('location: consumo.php');
            break;

            default:
        }
    }

    if(isset($_POST['Email']) && isset($_POST['Password']))
    {
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

        $consultaSQL= $conexionBD->prepare("SELECT * FROM Usuarios WHERE Email = :Email AND Password = :Password");
        $consultaSQL->execute(['Email' => $Email, 'Password' => $Password]);
        $row = $consultaSQL->fetch(PDO::FETCH_NUM);
            if($row == true)
            {
                $Rol = $row[2];
                $NombreCafeteria = $row[3];

                $_SESSION['Rol'] = $Rol;
                $_SESSION['NombreCafeteria'] = $NombreCafeteria;
                switch($_SESSION['Rol']){
                    case 1:
                        header('location: registroCafeterias.php');
                    break;
        
                    case 2: 
                        header('location: registro.php');
                    break;

                    case 3: 
                        header('location: consumo.php');
                    break;
        
                    default:
                }
            }else
            {
                echo '<script>
                        swal({
                        icon: "error",
                        title: "Error",
                        text: "Contraseña o correo electrónico incorrectos",
                        type: "error",
                        timer: 3000,
                        showConfirmButton: false
                        }).then(function(){
                        window.location.href = "index.php";
                    });
                  </script>';               
            } 
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
    .logo{
        width: 110%;
        align-items: center;
        display: table-cell;
        vertical-align: middle;
        }
    .bg-gradient-primary{
        background: #1d436d;
    }
    </style>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block text-center">
                                <div class="p-5">
                                    <br>
                                    <br>
                                    <img class="logo" src="img/logo-ces.png " alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-primary-900 mb-4"></h1>
                                    </div>
                                    <form class="user" method="POST" action="#">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="Email" name="Email" placeholder="Correo electrónico." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="Password" placeholder="Contraseña" name="Password" required>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="boton" value="Iniciar sesión">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</body>
</html>