<?php

function execQuery($query) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "turno";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error: " . $conn->connect_error);
    }

    $result = $conn->query($query);

    if (stripos($query, 'SELECT') === 0){
        $data = array();

        try{

            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        catch(Exception $e){
            echo "Error ".$e;
        }
    
        $conn->close();

        return $data;
    }
    else{
        if ($result === FALSE) {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
        
        $conn->close();
        return;
    }
}
?>