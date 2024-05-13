<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Admin</title>
    <?php session_start(); 
    $CodEmpleado = $_SESSION['CodEmp']; 
    require 'conection.php';

    $query = "SELECT * from Empleado Join caja on Cod_Caja = Id_Caja where Id_Empleado = ".$CodEmpleado;
    $result = execQuery($query);
    ?>
</head>
<body>
<div class="container-fluid d-flex position-relative text-center">
    <div class="container position-absolute top-0 start-0 shadow-lg rounded pb-5 w-25 " style="z-index: 1;">
        <img src="user (2).png" class="rounded-circle mb-3" style="width: 150px;" alt="Avatar" />
        <h5 class="mb-2"><strong><?php echo $result[0]['Nombres'].' '.$result[0]['Apellidos']?></strong><span class="badge bg-success ms-2">Activo</span></h5>
        <span class="bg-secondary rounded p-1">Caja: <?php echo $result[0]['Nombre']?></span>
    </div>
    <div class="container position-absolute top-0 start-50 w-25 p-5 shadow-lg rounded mt-5">
        <div class="row">
            <div class="col-sm-7">
                <p>Nombre: </p>
                <span class="bg-secondary rounded p-1" id="nombres"></span>
                <p>Cedula: </p>
                <span class="bg-secondary rounded p-1" id="cedula"></span>
            </div>
            <div class="col-sm-5">
                <h3>No. Turno</h3>
                <h1 id="codigo"></h1>
                <button type="button" class="btn bg-success" id="EnProceso">Solicitar</button>
            </div>
        </div>
    </div>
</div>

</body>
<script>
    $(document).ready(function () {
        function Turno(){
                $.ajax({
                url: 'obtenerAdmin.php',
                method: 'GET',
                success: function(data) {
                    var datos = JSON.parse(data);
                    $('#codigo').text(datos['Codigo']);
                    $('#nombres').text(datos['Nombres'] + datos['Apellidos']);
                    $('#cedula').text(datos['Cedula']);
                
                }
            });
        }
        Turno();

        $('#EnProceso').click(function (e) { 
            e.preventDefault();
            var Estado = "";
            var Cod = $('#codigo').text();
            if($('#EnProceso').text() == 'Solicitar'){
                $('#EnProceso').text('En Proceso');
                $('#EnProceso').removeClass('bg-success');
                $('#EnProceso').addClass('bg-warning');
                Estado = "Solicitado";
            }
            else if($('#EnProceso').text() == 'En Proceso'){
                $('#EnProceso').text('Terminado');
                $('#EnProceso').removeClass('bg-warning');
                $('#EnProceso').addClass('bg-danger');
                Estado = "En Proceso";
            }
            else if($('#EnProceso').text() == 'Terminado'){
                $('#EnProceso').text('Solicitar');
                $('#EnProceso').removeClass('bg-danger');
                $('#EnProceso').addClass('bg-success');
                Estado = "Terminado";
                Turno();
            }

            $.ajax({
                type: "GET",
                url: "actualizarTurno.php",
                data: {estado: Estado, codigo: Cod},
                success: function (response) {

                }
            });
        });
        
    });
</script>
</html>