<?php 
    $host = "Localhost";
    $username = "root";
    $password = "";
    $dbName = 'crud';

    $conn = mysqli_connect($host, $username, $password, $dbName);

    if(mysqli_connect_error()){
        echo "Erro na conexao:" . mysqli_connect_error();
    }

?>