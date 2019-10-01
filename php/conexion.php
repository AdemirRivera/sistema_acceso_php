<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'supermercado';


$conection = @mysqli_connect($host, $user, $password, $db);

if(!$conection){
    die('Error en la conexión, verifica lo siguiente: ' . mysqli_connect_error());
} 