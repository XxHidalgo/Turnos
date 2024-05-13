<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>    
    <?php include 'conection.php';
    session_start(); 
    $Cliente = $_SESSION['idcliente'];
    
    $query = "SELECT * from cliente where Id_Cliente = ".$Cliente;
    $result = execQuery($query);

    ?>
    <title>TuTurno</title>
</head>
<body>
    <h1 class="text-center mt-3">TURNOS INPHA<img src="R.png" alt="" width="150" height="150"></h1>
    <div class="container-fluid d-flex">
        <div class="container text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded w-25 m-5">
            <div class="row">
                <div class="col-sm-12">
                <div id="imprimir">
                    <p class="f-3 m-0"><?php echo $result[0]['Nombres'].' '.$result[0]['Apellidos'];?></p>
                    <p class="f-3 m-0"><?php echo $result[0]['Cedula']?></p>
                    <h1><?php echo $_GET['turno']?></h1>
                    <img alt="QR" id="codigo"></img>
                </div>
                    <img src="printer.png" alt="" width="60" heigth="60" class="btn" id="imp">
                </div>
            </div>
        </div>
    <table class="table table-striped w-60 mt-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" id="ListaTurnos">
        <thead>
            <tr>
                <th class="table-primary">Numero de turno</th>
                <th class="table-primary">Caja</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>  
    <script>
        $(document).ready(function () {
            function Lista() {
                $('#ListaTurnos tbody').find('tr').remove();

                $.ajax({
                    url: 'obtener.php',
                    method: 'GET',
                    success: function(data) {

                        $('#ListaTurnos tbody').html(data);
                    }
                });

            }
            Lista();

            setInterval(Lista, 5000);

            var urlActual = window.location.href;
                new QRious({
                element: document.querySelector("#codigo"),
                value: urlActual,
                size: 200,
                backgroundAlpha: 0,
                foreground: "#000000",
                level: "H",
            });

            $('#imp').click(function() {

                var contenidoDiv = document.getElementById("imprimir").innerHTML;
                var contenidoOriginal = document.body.innerHTML;
                document.body.innerHTML = contenidoDiv;
                window.print();
                document.body.innerHTML = contenidoOriginal;
                window.location.href =  window.location.href;

            });

        });
    </script>
</body>
</html>