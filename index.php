<?php
/*error_reporting(E_ALL ^ E_NOTICE);
session_start();
include("Modelo/Usuario.php");
include("Control/ControlUsuario.php");
$bot = $_POST['boton'];
$_SESSION['correo'] = $_POST['email'];
$_SESSION['clave'] = $_POST['password'];
if (!empty($bot) && $bot == "logout") {
    $objUsuario = new Usuario("", $_SESSION['correo'], $_SESSION['clave'], "", "", "", "");
    $objCrtUsuario = new ControlUsuario($objUsuario);
    $objU = $objCrtUsuario->consultarUsuario();
    $id = $objU->getIdUsuario();
    $tipo = $objU->getTipo();
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/icono.png">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    .logo{
        width: 110%;
        height: 120%;
        align-items: center;
        display: table-cell;
        vertical-align: middle;
        }
    .bg-gradient-primary{
        background: #122D85;
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
                                    <form class="user" method="POST" action="home.php">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" placeholder="password" name="password" required>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="boton" value="logout">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>