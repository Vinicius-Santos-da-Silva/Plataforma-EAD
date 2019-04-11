<?php

require 'environment.php';

$config = array();
global $config;
define("BASE" , "http://localhost/ead/painel/" );

if(ENVIRONMENT == 'development') {
	//define("BASE" , "http://localhost/ead/painel/" );
	
	$config['dbname'] = 'ead';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '$T44zg1g1';

	
} else {
	//define("BASE" , "http://ec2-3-16-89-162.us-east-2.compute.amazonaws.com/ead/painel/index.php/" );
	$config['dbname'] = 'iMBtHlzbHI';
	$config['host'] = 'remotemysql.com';
	$config['dbuser'] = 'iMBtHlzbHI';
	$config['dbpass'] = 'hzPgSdODai';
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}