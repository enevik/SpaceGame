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





</body>



</html>