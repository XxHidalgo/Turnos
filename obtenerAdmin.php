<?php 
require 'conection.php';
$query = "SELECT turno.Estado, Codigo, caja.Nombre, Cliente.Nombres, Cliente.Apellidos, Cliente.Cedula FROM turno join empleado on Id_Empleado = Cod_Empleado join caja on Id_Caja = Cod_Caja join cliente on Id_Cliente = Cod_Cliente WHERE DATE(Fecha) = CURDATE() and turno.Estado in ('Solicitado', 'En Turno') ORDER BY Fecha ASC LIMIT 5";
$result = execQuery($query);

    $datos = array(
        'Codigo' => $result[0]['Codigo'],
        'Nombres' => $result[0]['Nombres'],
        'Apellidos' => $result[0]['Apellidos'],
        'Cedula' => $result[0]['Cedula'],
        'Estado' => $result[0]['Estado']
    );
    echo json_encode($datos);
    
?>