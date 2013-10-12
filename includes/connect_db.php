<?php 
//Connection to the database
try{
	$db = new PDO('mysql:host=localhost;dbname=esmt_sn', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
}catch(PDOException $e){
	die('Erreur: '.$e->getMessage());
}
?>