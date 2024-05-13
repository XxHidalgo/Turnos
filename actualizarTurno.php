<?php
require 'conection.php';
    $Estado = $_GET['estado'];
    $Codigo = $_GET['codigo'];

    $query = "SELECT * from turno where Codigo = ".$Codigo." ORDER by Fecha desc";
    $result = execQuery($query);

    $query = "UPDATE turno Set Estado = '".$Estado."' where Codigo = ".$Codigo." and Id_Turno = ".$result[0]['Id_Turno'];
    execQuery($query);

    if($Estado === "Terminado"){
        $query = "SELECT * FROM turno WHERE DATE(Fecha) = CURDATE() and turno.Estado = 'En Turno' ORDER BY Fecha ASC LIMIT 5";
        $result = execQuery($query);
        $ID = $result[0]['Id_Turno'];

        $query = "UPDATE turno Set Estado = 'Solicitado' where Id_Turno = ".$ID;
        execQuery($query);
    }
?>