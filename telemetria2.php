<?php

$host='localhost';
$db = 'telemetria';
$username = 'telemetria';
$password = '123456';

$dsn= "mysql:host=$host;dbname=$db";
 
try{
 // create a PDO connection with the configuration data
 $conn = new PDO($dsn, $username, $password);
 
 // display a message if connected to database successfully
 if($conn){
 echo "Connected to the <strong>$db</strong> database successfully!";
        }
}catch (PDOException $e){
 // report error message
 echo $e->getMessage();
}

?>