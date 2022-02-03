<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "user_data";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)) {
	die("Failed to connect.");
}