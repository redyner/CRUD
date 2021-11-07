<?php

$GLOBALS['conexao'] = conexao();
$conexao = $GLOBALS['conexao'];


function conexao()
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "crud";

    // Create connection
    $conexao = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if (!$conexao) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "";

    return $conexao;
}

?>