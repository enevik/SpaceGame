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


//if(isset($_SESSION['username'])) {
    $sql = "SELECT * FROM `users`";
    $query = $db->query($sql);
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

//if (session_id()) {

    //$id = $_SESSION['id'];
 //$id = $_GET['id'];

//}

$id = isset($_GET['id']) ? $_GET['id'] : '';


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
        <div>
            <!-- placeholder for the logo <-->
            <h1>Logo</h1>
        </div>
        <div>
            <div class="navbar">
                <a href="index.php?id=<?=$id?>">Home</a>
                <a href="trading.php?id=<?=$id?>">shop</a>

                <a href="tasks.php?id=<?=$id?>">tasks</a>
                <a href="upgradestation.php?id=<?=$id?>">station</a>
           <a href="create_login.php?id=<?=$id?>">Create new user</a>
                <a href="leaderbord.php?id=<?=$id?>">Leaderbord</a>




            </div>
        </div>


        <div class="cac">
            <div class="cash">


                    <p>Cash: <?php echo $userinfo['cash'] ?></p>


            </div>

            <div class="commodities">

                    <p>Commodities: <?php echo $userinfo['commodities'] ?></strong></p>



        </div>







        </div>

    </div>
</header>
<main>
