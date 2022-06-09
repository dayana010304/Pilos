<?php
session_start();

if(!isset($_SESSION['Rol'])){
    header ('location: index.php');
}else{
    if($_SESSION['Rol'] != 3){
        header('location: index.php');
    }
    if(isset($_GET['cerrar'])){
        session_unset();
        
        session_destroy();

        header('location: index.php');

    }
}

if (isset($_POST["consolidado"])){
    $fInicial = $_POST["fInicial"];
    $fFinal = $_POST['fFinal'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/styleconsumo.css">
    <link rel="icon" href="./img/icono.png">
    <title>Consumo</title>

</head>
<body>    
    <div class="container">
        <div style="text-align: right;">
            <a class="btn btn-outline-success" href="cerrar.php" type="submit" value="cerrar">Cerrar sesión</a>
        </div>
        <br>
        <div class="row">
            <div class="col align-self-start" >
                <form action="" method="POST">
                    <div class="col-md">
                        <label for="floatingInputGrid">Desde:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="fInicial" name="fInicial" value="<?php echo $fInicial?>">
                    </div>
                    <div class="col-md">
                        <label for="floatingInputGrid">Hasta:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="fFinal" name="fFinal" value="<?php echo $fFinal?>">
                    </div>
                    <br>
                    <button type="submit" name="busquedad" id="busquedad" class="btn btn-primary" onclick="quitar();" >Buscar información por identificacion</button>
                </div>

            <div class="col align-self-start">
                    <div class="col-md">
                        <label for="floatingInputGrid">Cafeteria:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="cafeteria" name="cafeteria" readonly="readonly" value="<?php echo $_SESSION['NombreCafeteria']?>">
                    </div>
                    <br>
                    <button type="submit" name="consultar" id="consultar" class="btn btn-primary">Consultar</button>
            </div>
            <div class="col align-self-start">
                <div class="col-md">
                    <label for="floatingInputGrid">Identificacion:</label>
                </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="identificacion" name="identificacion">
                </div>
                <br>
                <a type="button" class="btn btn-primary">Consultar</a>
            </div>
            <div style="margin-top: 3%;">
                <table class="table table-striped table-hove" border="1" >
                    <thead>
                        <tr>
                            <th scope="col">Cafeteria</th>
                            <th scope="col">Identificacion</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Consumo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
        </div>
        <br>
        <br> 
    </div>
        <script>
            function quitar() {
                $('#saldoConsumido').removeAttr("required");
            }
        </script>
</body>
</html>