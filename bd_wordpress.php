<?php


$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="wordpress";

if(!$wpcon = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
	die('failed to connect');
}