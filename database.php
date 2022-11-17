<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'cotizadora_2';

try{
    $conn = new PDO("mysql:localhost=$server;dbname=$database;",$username, $password);
} catch (PDOException $e){
    die('Conexion fallida: '.$e->getMessage());
}
?>