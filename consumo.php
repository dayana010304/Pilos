<?php

session_start();

if(!isset($_SESSION['Rol']) ){
    header ('location: index.php');
}else{
    if($_SESSION['Rol'] != 3){
        header('location: index.php');
    }
}


$Email=isset($_POST['Email']) ? $_POST['Email'] : '';
$identificacion=isset($_POST['identificacion']) ? $_POST['identificacion'] : '';
$saldo=isset($_POST['saldo']) ? $_POST['saldo'] : '';
$fechaVencimiento=isset($_POST['fechaVencimiento']) ? $_POST['fechaVencimiento'] : '';
$fechaC=isset($_POST['ultimoConsumo']) ? $_POST['ultimoConsumo'] : '';


include("./Control/conexion.php");
            
        if(isset($_POST['busquedad'])){
            $busquedad = $_POST['busquedad'];
            $consulta="SELECT * FROM Estudiantes WHERE identificacion = ?";

            $sentencia= $conexionBD->prepare($consulta, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,]);
            $sentencia->execute([$identificacion]);
            $numeroDeFilas = $sentencia->rowCount();
            # Si son 0 o menos, significa que no existe
            if ($numeroDeFilas <= 0) {
                echo '<script type="text/javascript">
                        alert("Este documento no existe");
                        window.location.href="consumo.php";
                    </script>';
                } 
                while($row = $sentencia->fetch()){
                    $identificacion = $row["identificacion"];
                    $saldo = $row["saldo"];
                    $ultimoConsumo = $row["ultimoConsumo"];
                    $fechaVencimiento = $row["fechaVencimiento"];     
            }
        } 
            if(isset($_POST["consumir"])){
                $saldoConsumido = $_POST["saldoConsumido"];
                $identificacion = $_POST["identificacion"];
                $fecha = date('Y-m-d', time());
                $NombreCafeteria = $_POST["cafeteria"];

                $sentencia = $conexionBD->prepare("INSERT INTO transacciones (identificacion, consumo, fecha, cafeteria ) VALUES (?, ?, ?, ?);");
                $resultado = $sentencia->execute([$identificacion, $saldoConsumido, $fecha, $NombreCafeteria]);
                if ($resultado === TRUE){
                    echo '<script type="text/javascript">
                            alert("Registro guardado con exito");
                            window.location.href="consumo.php";
                        </script>';
                }else {
                    echo 'hubo un error';
                }
                $sentencia->closeCursor();     
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
            <div class="col align-self-start">
                <form action="consumo.php" method="POST">
                    <div class="col-md">
                        <label for="floatingInputGrid">Identificación:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="identificacion" name="identificacion" required value="<?php echo $identificacion?>"> 
                    </div>
                    <div class="col-md">
                        <label for="floatingInputGrid">Saldo disponible:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="saldo" name="saldo" value="<?php echo $saldo?>">
                    </div>
                    <div class="col-md">
                        <label for="floatingInputGrid">Última trasacción:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="ultimoConsumo" name="ultimoConsumo" value="<?php echo $ultimoConsumo?>">
                    </div>
                    <div class="col-md">
                        <label for="floatingInputGrid">Fecha de vencimiento:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="fechaVencimiento" name="fechaVencimiento" value="<?php echo $fechaVencimiento?>">
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
                    <div class="col-md">
                        <label for="floatingInputGrid">Saldo a consumir:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="saldoConsumido" name="saldoConsumido" required>
                    </div>
                    <br>
                    <button type="submit" name="consumir" id="consumir" class="btn btn-primary">Consumir</button>
                    
                </form>
            </div>

            <div class="col align-self-start">
                <form action="administracion.php" method="POST">
                    <div class="col-md">
                        <label for="floatingInputGrid">Fecha inicial:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="fInicial" name="fInicial" required>
                    </div>
                    <div class="col-md">
                        <label for="floatingInputGrid">Fecha final:</label>
                    </div> 
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="fFinal" name="fFinal" required>
                    </div>
                    <br>
                    <button type="submit" name="consolidado" id="consolidado" class="btn btn-primary">Generar consolidado</button>
                </form>
            </div>
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