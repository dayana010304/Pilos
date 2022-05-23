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

$identificacion=isset($_POST['identificacion']) ? $_POST['identificacion'] : '';
$saldo=isset($_POST['saldo']) ? $_POST['saldo'] : '';
$fechaV=isset($_POST['fechaVencimiento']) ? $_POST['fechaVencimiento'] : '';
$fechaC=isset($_POST['ultimoConsumo']) ? $_POST['ultimoConsumo'] : '';


include("./Control/conexion.php");
include("./Control/ControlConexion.php");
            
        if(isset($_POST['identificacion'])){
            $identificacion = $_POST['identificacion'];

            $consultaSQL= sqlsrv_query($conn, "SELECT * FROM Estudiantes WHERE identificacion = $identificacion");
                while($formulario = sqlsrv_fetch_array($consultaSQL))
                {   
                    $fechaConsumo = $formulario["ultimoConsumo"];
                    $fechaC=$fechaConsumo->format('Y-m-d');
                    $fechaVencimiento = $formulario["fechaVencimiento"];
                    $fechaV=$fechaVencimiento->format('Y-m-d');

                    $ultimoConsumo = $formulario["ultimoConsumo"];
                    $saldo = $formulario["saldo"];
                    $ultimoConsumo = $formulario["ultimoConsumo"];

                }
            
                if(isset($_POST["consumir"])){
                    $saldoConsumido = $_POST["saldoConsumido"];
                    $identificacion = $_POST["identificacion"];
                    $fecha = date('Y-m-d', time());
                    $cafeteria = $_POST["cafeteria"];
                
                    $transaccion=new ControlConexion();
                    $consultaSQL="INSERT INTO transacciones (identificacion, consumo, fecha) VALUES ('$identificacion', '$saldoConsumido', '$fecha')";
                    
                    $transaccion->agregarDatos($consultaSQL);
                    
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
    <link rel="stylesheet" href="css/styleconsumo.css">
    <link rel="icon" href="./img/icono.png">
    <title>Consumo</title>

</head>
<body>    
    <div class="container">
        <div style="text-align: right;">
            <a class="btn btn-outline-success" type="submit" value="cerrar">Cerrar sesión</a>
        </div>
        <br>
        <div class="row">
            <div class="col align-self-start">
                <form action="" method="POST">
                    <div class="col-md">
                        <label for="floatingInputGrid">Identificación:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="identificacion" name="identificacion" required value="<?php echo "$identificacion" ?>"> 
                    </div>
                    <div class="col-md">
                        <label for="floatingInputGrid">Saldo disponible:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="saldo" name="saldo" value="<?php echo "$saldo" ?>">
                    </div>
                    <div class="col-md">
                        <label for="floatingInputGrid">Última trasacción:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="ultimoConsumo" name="ultimoConsumo" value="<?php echo "$fechaC" ?>">
                    </div>
                    <div class="col-md">
                        <label for="floatingInputGrid">Fecha de vencimiento:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="fechaVencimiento" name="fechaVencimiento" value="<?php echo "$fechaV" ?>">
                    </div>
                    <br>
                    <button type="submit" name="buscar" id="buscar" class="btn btn-primary">Buscar información por identificacion</button>
                
            </div>

            <div class="col align-self-start">
                    <div class="col-md">
                        <label for="floatingInputGrid">Cafeteria:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="cafeteria" name="cafeteria" readonly="readonly" value="">
                    </div>
                    <div class="col-md">
                        <label for="floatingInputGrid">Saldo a consumir:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="saldoConsumido" name="saldoConsumido" require>
                    </div>
                    <br>
                    <button type="submit" name="consumir" id="consumir" class="btn btn-primary">Consumir</button>
                    
                </form>
            </div>

            <div class="col align-self-start">
                <form action="" method="POST">
                    <div class="col-md">
                        <label for="floatingInputGrid">Fecha inicial:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="fInicial">
                    </div>
                    <div class="col-md">
                        <label for="floatingInputGrid">Fecha final:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="fFinal">
                    </div>
                    <br>
                    <a type="button" class="btn btn-primary" href="administracion.php">Generar consolidado de ventas</a>
                </form>
            </div>
        </div>
        <br>
        <br>
        
    </div>
    
        
    
</body>
</html>