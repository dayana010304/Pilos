<?php
    session_start();

    if(!isset($_SESSION['Rol'])){
        header ('location: index.php');
    }else{
        if($_SESSION['Rol'] != 2){
            header('location: index.php');
        }
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
    <title>Registro</title>
</head>
<body> 
    <div class="container">
        <div style="text-align: right;">
            <a class="btn btn-outline-success" href="cerrar.php" type="submit" value="cerrar" >Cerrar sesión</a>
        </div>
        <br>
        <form action="./Control/insertarEstudiantes.php" method="POST">
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Identificación:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Identificación" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Fecha de vencimiento:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control date" id="fechaVencimiento" name="fechaVencimiento" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox">Huella
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-sm">Obtener huella</button>
                    <br>
                    <br>
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