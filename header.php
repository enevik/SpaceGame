<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 29-8-2019
 * Time: 11:44
 */

require 'databaseController.php';


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
                <a href="#home">Home</a>
                <a href="#shop">shop</a>
                <a href="#tasks">tasks</a>
                <a href="#station">station</a>
            </div>
        </div>


        <div class="cac">
            <div class="cash">
                <p>Cash:<?php echo $users[0]['cash'] ?></p>
            </div>

            <div class="commodities">
            <p>Commodities:<?php echo $users[0]['commodities'] ?></p>

        </div>







        </div>

    </div>
</header>
<main>
