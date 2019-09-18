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



$sql = "SELECT * FROM ships";
$query = $db->query($sql);
$shipinfos = $query->fetchAll(PDO::FETCH_ASSOC);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<div class="container">

<form action="databaseController.php?id=<?= $id; ?>" method="post">


    <div class="sellmaterial">
        <input type="hidden" name="type" value="material">

        <label for="username">Grondstoffen:</label>
        <input type="text" name="material" id="material" placeholder="vul aantal grondstoffen in">

        <input type="submit" class="button sellbutton" value="Verkopen">
    </div>


</form>


    <h1>Ships</h1>

<?php

foreach ($shipinfos

as $shipinfo) {
$shipname = htmlentities($shipinfo['shipname']);
$shippic = htmlentities($shipinfo['shippic']);
$shipid = htmlentities($shipinfo['id']);
$shipdescription = htmlentities($shipinfo['description']);
$time = htmlentities($shipinfo['joblength']);
$shipprice = htmlentities($shipinfo['price']);
//echo $shipname;


?>



    <div class="planet">
        <div class="title">
            <h2><?php echo $shipname ?></h2>
        </div>
        <div class="image">
            <img src="<?php echo 'Images/' . $shippic; ?>"
        </div>
    </div>
        <div class="trading-info">
            <h3>Informatie over schip</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci at autem, culpa dolore eligendi harum ipsum iure, laboriosam magnam nesciunt nihil provident rem similique sint sit, soluta tempora voluptatibus.</p>
            <p><?php echo $shipdescription ?></p>
        </div>
    <div class="trading-task">
            <h3 class="info-task">Task time: <?php echo $time. ' min or less' ?></h3>
            <h3 class="commodities">Money</h3>
            <p><?php echo $shipprice ?></p>
            <form class="button"  action="databaseController.php?userid=<?= $id ?>&shipid=<?=$shipid?>" method="post">
                <input type="hidden" name="type" value="buy_ship">
                <input type="submit" class="button" value="BUY">
            </form>
    </div>
</div>
</body>
<?php
}
?>
</html>