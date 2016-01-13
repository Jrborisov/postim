<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database

	'connectionString' => 'mysql:host=localhost;dbname=postimby_db',
	'emulatePrepare' => true,
	'username' => 'postimby_Igor',
	'password' => 'mc2447382',
	'charset' => 'utf8',
    'schemaCachingDuration'=>3600,

);