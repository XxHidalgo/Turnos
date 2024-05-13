<?php

require 'conection.php';
require 'AgregarCliente.php';

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];

    $query = "SELECT * from Cliente where Cedula = '".$cedula."'";
    $result = execQuery($query);
    $NewCodigo;
    $IdCliente;

    if ($result) {
        // El cliente ya existe
        $IdCliente = $result[0]['Id_Cliente'];


    } else {
        $query = "INSERT INTO `cliente` (`Id_Cliente`, `Nombres`, `Apellidos`, `Cedula`) VALUES (NULL, '".$nombre."', '".$apellido."', '".$cedula."');";
        execQuery($query);

        $query = "SELECT max(Id_Cliente) as cli from cliente";
        $result = execQuery($query);
        
        $IdCliente = $result[0]['cli'];
        
    }

    session_start();
    $_SESSION['idcliente'] = $IdCliente;

    $query = "SELECT Codigo + 1 as COD from turno where DATE(Fecha) = CURDATE() and Estado in ('En Turno', 'En Proceso', 'Solicitado') order by Codigo desc";
    $result = execQuery($query);

    if($result){
        $NewCodigo =  $result[0]['COD'];
    }
    else{
        $NewCodigo = 1;
    }

    header('Location: Home.php?turno='.$NewCodigo);
    
    $query = "INSERT INTO `turno` (`Id_Turno`, `Codigo`, `Cod_Cliente`, `Cod_Empleado`,`Fecha`, `Estado`) VALUES (NULL, ".$NewCodigo.", ".$IdCliente.", 1, NOW(), 'En Turno')";
    execQuery($query);

?>