<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styleconsumo.css">
    <link rel="icon" href="../img/icono.png">
    <title>Consumo</title>

</head>
<body>    
    <div class="container">
        <div class="row">
            <div class="col align-self-start">
                <form action="./Control/buscar.php" method="POST">
                    <div class="col-md">
                        <label for="floatingInputGrid">Identificación:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="identificacion">
                    </div>
                    <div class="col-md">
                        <label for="floatingInputGrid">Saldo disponible:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="saldoDisponile">
                    </div>
                    <div class="col-md">
                        <label for="floatingInputGrid">Última trasacción:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="ulTrasaccion">
                    </div>
                    <div class="col-md">
                        <label for="floatingInputGrid">Fecha de vencimiento:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="fVencimiento">
                    </div>
                    <br>
                    <button type="button" name="buscar" class="btn btn-primary">Buscar información por identificacion</button>
                </form>
            </div>

            <div class="col align-self-start">
                <form action="" method="POST">
                    <div class="col-md">
                        <label for="floatingInputGrid">Cafeteria:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nCafeteria">
                    </div>
                    <div class="col-md">
                        <label for="floatingInputGrid">Saldo a consumir:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="sConsumir">
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary">Consumir</button>
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
                    <button type="button" class="btn btn-primary">Generar consolidado de ventas</button>
                </form>
            </div>
        </div>
        <br>
        <br>
    </div>
        
    

    <script src="../js/movimiento.js"></script>
</body>
</html>