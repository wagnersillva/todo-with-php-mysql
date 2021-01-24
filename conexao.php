<?php

$dbname= "db_04012021";
$host= "localhost";
$username="root";
$password="";

try {
    $conn = new PDO("mysql:dbname=$dbname;host=$host", $username, $password);
} catch(PDOException $e) {
    echo "Erro Banco de Dados: ".$e->getMessage();
    exit();
}

?>