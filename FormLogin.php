<?php
    require 'conection.php';

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $query = "SELECT * from Usuario where usuario = '".$user."' and Contraseña = '".$pass."'";
    $result = execQuery($query);

    if($result){
        header("Location: Admin.php");
        session_start();
        $_SESSION['CodEmp'] = $result[0]['Cod_Empleado'];

    }
    else{
        header("Location: Login.html");
    }

?>