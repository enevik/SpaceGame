<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 29-8-2019
 * Time: 11:44
 */

//require 'databaseController.php';

require 'config.php';
//require 'databaseController.php';

session_start();



//if(isset($_SESSION['username'])) {
    $sql = "SELECT * FROM `users`";
    $query = $db->query($sql);
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

//if (session_id()) {

    //$id = $_SESSION['id'];
 //$id = $_GET['id'];

//}

//$id = isset($_GET['id']) ? $_GET['id'] : '';
$id = $_SESSION['id'];





    $sql = "SELECT * FROM users WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id

    ]);

//$query = $db->query($sql);
    $userinfo = $prepare->fetch(PDO::FETCH_ASSOC);


    //$id = $_SESSION['id'];








/*$sql = "SELECT * FROM `users`";
$query = $db->query($sql);
$users = $query->fetchAll(PDO::FETCH_ASSOC);

//if ( isset($_SESSION['id'] )) {

    $id = $_SESSION['id'];
    // $id = $_GET['id'];

//}


    $sql = "SELECT * FROM users WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id

    ]);

//$query = $db->query($sql);
    $userid = $prepare->fetch(PDO::FETCH_ASSOC);

*/

$admin = $userinfo['admin'];
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SpaceGame</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="headerflex">
        <div class="logo">
            <!-- placeholder for the logo <-->
            <img src="Images/battle_space_logo.png" alt="">
        </div>
        <div>
            <div class="navbar">
                <a href="index.php">Home</a>
                <a href="trading.php">Shop</a>
                <a href="tasks.php">Tasks</a>
                <a href="upgradestation.php">Space Station</a>
                <a href="create_login.php">Login/Register</a>
                <a href="leaderbord.php">Leaderbord</a>
                <?php
                if ($admin == 1) {
                    echo '<a href="createShip.php">Create Ship</a>';
                }
                ?>





            </div>
        </div>



        <div class="cac">
            <div class="cash" id="cash">


                <p><span>Cash: Ƒ</span> <?php echo $userinfo['cash'] ?></p>


            </div>

            <div class="commodities" id="commodities">

                <p><span>Commodities: 〄</span> <?php echo $userinfo['commodities'] ?></strong></p>



        </div>







        </div>

    </div>
</header>
<main>
