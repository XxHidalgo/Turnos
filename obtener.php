<?php 
require 'conection.php';

$query = "SELECT turno.Estado, Codigo, caja.Nombre FROM turno join empleado on Id_Empleado = Cod_Empleado join caja on Id_Caja = Cod_Caja WHERE DATE(Fecha) = CURDATE() and turno.Estado in ('En Proceso', 'Solicitado') ORDER BY Fecha ASC LIMIT 5";
$result = execQuery($query);
$invertido = array_reverse($result);
$color = "";
foreach ($invertido as $row) {
    if($row['Estado'] === "En Proceso"){
        $color = "bg-warning";
    }
    else{
        $color = "bg-success";
    }
    echo "<tr><td><h1>" . $row['Codigo'] . "</h1><br><span class='p-1 rounded ".$color."'>".$row['Estado']."</span></td><td><span class='bg-primary p-1 rounded'>".$row['Nombre']."</span></td></tr>";
}
?>
