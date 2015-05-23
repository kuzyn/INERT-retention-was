<?php
//main config file

//MySQL connection
$hostname="db509159906.db.1and1.com";
$username="dbo509159906";
$pwd="apeshit";
$db="db509159906";

// Create connection
$DBcon = new mysqli($hostname,$username,$pwd,$db);
$DBcon2 = new mysqli($hostname,$username,$pwd,$db);

// Set proper encoding to handle accents
$DBcon->set_charset('utf8');
ini_set("default_charset", "UTF-8");

// Check connection
if ($DBcon->connect_errno) {
    printf("Connect failed: %s\n", $DBcon->connect_error);
    exit();
}

?>