<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 29-8-2019
 * Time: 11:42
 */

require 'header.php';

$id = $_GET['id'];


$sql = "SELECT * FROM users WHERE id = :id";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':id' => $id

]);

//$query = $db->query($sql);
$contact = $prepare->fetch(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="databaseController.php?id=<?=$id;?>" method="post">


    <div class="sellmaterial">
        <input type="hidden" name="type" value="material">

        <label for="username">Grondstoffen:</label>
        <input type="text" name="material" id="material" placeholder="vul aantal grondstoffen in">

        <input type="submit" value="Verkopen">
    </div>





</form>

<div class="container">
    <h1>Ships</h1>
    <div class="planet">
        <div class="title">
            <h2>Hispenia</h2>
        </div>
        <div class="image">
            <img src="images/mars-image.png" alt="Image of Mars">
        </div>
        <div class="info">
            <h3>Informatie over schip</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum error labore, magnam maiores modi officiis quis similique. Animi at cumque eos, ex iste quod reiciendis velit vitae voluptas voluptatibus? Repellendus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. A amet autem delectus ducimus est et expedita explicabo, impedit itaque iure laborum magnam neque quaerat quas quidem, repellat suscipit tempora temporibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consectetur cumque cupiditate dicta dolor dolore eligendi, ipsa iure iusto libero maxime modi molestias nulla odit praesentium quam, quibusdam rem sint!</p>
        </div>
    </div>
    <div class="task">
        <div class="info-task">
            <h3>Task</h3>
            <p>Lorem ipsum dolor sit amet, libero maxime, minus modi necessitatibus omnis quas quasi suscipit?</p>
        </div>
        <div class="commodities">
            <h3>Money</h3>
            <p>60.000</p>
        </div>
        <div class="button">
            <form action="databaseController.php?id=<?=$id?>" method="post">
                <input type="hidden" name="type" value="buy_hispenia">
                <input type="submit" value="Mine">
            </form>
        </div>
    </div>

    <div class="planet">
        <div class="title">
            <h2>Hunter-Gratzner</h2>
        </div>
        <div class="image">
            <img src="images/jupiter-image.png" alt="Image of Mars">
        </div>
        <div class="info">
            <h3>Informatie over schip</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum error labore, magnam maiores modi officiis quis similique. Animi at cumque eos, ex iste quod reiciendis velit vitae voluptas voluptatibus? Repellendus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. A amet autem delectus ducimus est et expedita explicabo, impedit itaque iure laborum magnam neque quaerat quas quidem, repellat suscipit tempora temporibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consectetur cumque cupiditate dicta dolor dolore eligendi, ipsa iure iusto libero maxime modi molestias nulla odit praesentium quam, quibusdam rem sint!</p>
        </div>
    </div>
    <div class="task">
        <div class="info-task">
            <h3>Task</h3>
            <p>Lorem ipsum dolor sit amet, libero maxime, minus modi necessitatibus omnis quas quasi suscipit?</p>
        </div>
        <div class="commodities">
            <h3>Money</h3>
            <p>80.000</p>
        </div>
        <div class="button">
            <form action="databaseController.php?id=<?=$id?>" method="post">
                <input type="hidden" name="type" value="buy_hunter">
                <input type="submit" value="Mine">
            </form>
        </div>
    </div>

    <div class="planet">
        <div class="title">
            <h2>Millenium Falcon</h2>
        </div>
        <div class="image">
            <img src="images/saturnus-image.png" alt="Image of Mars">
        </div>
        <div class="info">
            <h3>Informatie over schip</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum error labore, magnam maiores modi officiis quis similique. Animi at cumque eos, ex iste quod reiciendis velit vitae voluptas voluptatibus? Repellendus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. A amet autem delectus ducimus est et expedita explicabo, impedit itaque iure laborum magnam neque quaerat quas quidem, repellat suscipit tempora temporibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consectetur cumque cupiditate dicta dolor dolore eligendi, ipsa iure iusto libero maxime modi molestias nulla odit praesentium quam, quibusdam rem sint!</p>
        </div>
    </div>
    <div class="task">
        <div class="info-task">
            <h3>Task</h3>
            <p>Lorem ipsum dolor sit amet, libero maxime, minus modi necessitatibus omnis quas quasi suscipit?</p>
        </div>
        <div class="commodities">
            <h3>Money</h3>
            <p>100.000</p>
        </div>
        <div class="button">
            <form action="databaseController.php?id=<?=$id?>" method="post">
                <input type="hidden" name="type" value="buy_millenium">
                <input type="submit" value="Mine">
            </form>
        </div>
    </div>
</div>





</body>



</html>