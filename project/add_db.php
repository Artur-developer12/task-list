<?php 
	$dsn = 'mysql:host=localhost; dbname=task-list';
	
	try {
		$pdo = new PDO($dsn, 'root', '',  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);  
	} catch (PDOException $e) {
		 print_r($e->getMessage());
 		 $pdo->debugDumpParams();
		die("Не могу подключиться к базе");
	}



	



 

 ?>