<?php

$host='localhost';
$db = 'telemetria';
$username = 'root';
$password = '';

$dsn= "mysql:host=$host;dbname=$db";

try{
	 // create a PDO connection with the configuration data
	 $conn = new PDO($dsn, $username, $password);

	 // display a message if connected to database successfully
	 if($conn){

	 		$cardIdRC = $_GET["cardID"];


	 		$STH = $conn -> prepare( "select id from estudiantes where cardId = ?" );
			$STH -> execute([$cardIdRC]);
			$result = $STH -> fetch();

			if ($result["id"]) {

			
				$sql = "INSERT INTO asistencia (id_estudiante) VALUES (?)";
				$conn->prepare($sql)->execute([$result["id"]]);

				echo $result["id"];

			}
	        
	}
}catch (PDOException $e){
 // report error message
 	echo $e->getMessage();
}

?>