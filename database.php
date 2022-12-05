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



$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'cotizadora_2'
) or die(mysql_error($mysql));
?>