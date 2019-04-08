<?php

require 'environment.php';

$config = array();


define("BASE" , "http://localhost/ead/" );
global $config;

if(ENVIRONMENT == 'development') {
	#define("BASE" , "http://localhost/ead/" );
	// $config['dbname'] = 'ead';
	// $config['host'] = 'localhost';
	// $config['dbuser'] = 'root';
	// $config['dbpass'] = '$T44zg1g1';

	$config['dbname'] = 'iMBtHlzbHI';
	$config['host'] = 'remotemysql.com';
	$config['dbuser'] = 'iMBtHlzbHI';
	$config['dbpass'] = 'hzPgSdODai';
} else {
	#define("BASE" , "http://localhost/ead/" );
	$config['dbname'] = 'ead';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '$T44zg1g1';
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}