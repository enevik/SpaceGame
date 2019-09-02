<?php


$username = "";
$email = "";
$errors = array();

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'spacegame';

//$db = mysqli_connect('localhost', 'id9005076_root', 'Drilldo123', 'id9005076_degokkers');
$db = new PDO("mysql:host=$dbHost;dbname=$dbName",
    $dbUser,
    $dbPass
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);