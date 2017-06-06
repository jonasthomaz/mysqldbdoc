<?php
	$app->container->singleton('dbauthentication',function(){
		$dbHostname = DBhost;
		$dbpost 	= DBport;
		$dbDatabase = DBbasename;
		$dbUsername = DBuser;
		$dbPassword = DBpassword;
		
		static $db = null; 
		if (null === $db){
			$db_connection = new PDO("mysql:host=$dbHostname;dbname=$dbDatabase", $dbUsername, $dbPassword);
			$db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return $db_connection;
	});