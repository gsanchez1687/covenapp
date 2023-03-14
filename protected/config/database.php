<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=covenapp',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',
    
   /* 'connectionString' => 'mysql:host=localhost;dbname=conexcel_demo',
	'emulatePrepare' => true,
	'username' => 'conexcel_develop',
	'password' => 'Conexcel-2018',
	'charset' => 'utf8',
	*/
);