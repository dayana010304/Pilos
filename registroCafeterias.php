<?php
session_start();

if(!isset($_SESSION['Rol'])){
    header ('location: index.php');
}else{
    if($_SESSION['Rol'] != 1){
        header('location: index.php');
    }
    if(isset($_GET['cerrar'])){
        session_unset();
        
        session_destroy();

        header('location: index.php');
    }
}
?>

<?php

include ('./Control/ControlConexion.php');

if (isset($_POST["botonEnvio"]))
{
    $NombreCafeteria = $_POST["NombreCafeteria"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $Rol = $_POST["Rol"];
    
    $transaccion = new ControlConexion();

    $consultaSQL="INSERT INTO Usuarios (NombreCafeteria, Email, Password, Rol) VALUES ('$NombreCafeteria', '$Email', $Password, $Rol)";

    $transaccion->agregarDatos($consultaSQL);    
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="./img/icono.png">
    <title>Registro de cateferias</title>
</head>
<body> 
    <div class="container">
        <form action="registroCafeterias.php" method="POST">
            <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Nombre de la cafeteria:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="NombreCafeteria" name="NombreCafeteria" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Correo eletronico:</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" id="Email" name="Email" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Contraseña:</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" id="Password" name="Password" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Rol:</label>
                <div class="col-sm-5">
                    <select class="form-select" id="Rol" name="Rol" required>
                        <option selected>Seleccione</option>
                        <option value="1">Administrador</option>
                        <option value="2">Bienestar</option>
                        <option value="3">Cafeterias</option>
                    </select>
                </div>
            </div>
            <br>
            <br>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" name="botonEnvio" class="btn btn-primary btn-sm">Guardar registro</button>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </form>
    </div>
    <br>
    <br>

    
</body>
</html>

