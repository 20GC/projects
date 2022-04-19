<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "mysql";
$dbname = "user_data";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)) {
	die("Failed to connect.");
}