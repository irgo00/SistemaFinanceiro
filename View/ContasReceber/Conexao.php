<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "imm1906";
    $dbname = "financeiro";
    $port = 3306;

    $con = mysqli_connect($servername, $username, $password, $dbname, $port);

    if (!$con) {
        die("Conexão falhou: " . mysqli_connect_error());
    } 
?>