<?php

//Importar la conexion
require 'includes/config/database.php';
$db = conectarDB();

//Crear un email y Password
$email = "correo@correo.com";
$password = "123456";


//Hashear Password
$passwordhash = password_hash($password, PASSWORD_DEFAULT);

//Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordhash}'); ";
//echo $query;    

//exit;

//Agregarlo a la base de datos
mysqli_query($db, $query);