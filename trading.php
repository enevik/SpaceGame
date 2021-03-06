<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 29-8-2019
 * Time: 11:42
 */

require 'header.php';

//$id = $_GET['id'];
$id = $_SESSION['id'];




$sql = "SELECT * FROM users WHERE id = :id";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':id' => $id

]);

//$query = $db->query($sql);
$contact = $prepare->fetch(PDO::FETCH_ASSOC);



$sql = "SELECT * FROM ships WHERE id <> '7'";
$query = $db->query($sql);
$shipinfos = $query->fetchAll(PDO::FETCH_ASSOC);




$sql5 = " SELECT *  FROM ownedships 
   LEFT JOIN ships
     ON ships.id = ownedships.shipid
 WHERE ownedships.userid = $id";

$query = $db->query($sql5);
$userships = $query->fetchAll(PDO::FETCH_ASSOC);





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

        <label for="username">Commodities:</label>
        <input type="text" name="material" id="material" placeholder="amount of commodities">

        <input type="submit" class="blueButton" value="Exchange">
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
    $timemars = htmlentities($shipinfo['joblengthmars']);
    $timejupiter = htmlentities($shipinfo['joblengthjupiter']);
    $timesaturnus = htmlentities($shipinfo['joblengthsaturnus']);
    $shipprice = htmlentities($shipinfo['price']);

 


?>
    <div class="planet">
        <div class="title">
            <h2><?php echo $shipname ?></h2>
        </div>
        <div class="image">
            <img src="<?php echo 'Images/' . $shippic; ?>"

        </div>

        <?php
        foreach ($userships

                 as $usership) {
            $usershipname = htmlentities($usership['shipname']);
            $usershippic = htmlentities($usership['shippic']);
            $usershipid = htmlentities($usership['shipid']);
            //echo $shipname;


            if ($shipname == $usershipname) {

                echo "<h2 class='shipalready'>You've already got this ship</h2>";
            }
        }
        ?>

    </div>
    <div class="trading-info">
        <h3>Information about ship</h3>

        <p><?php echo $shipdescription ?></p>

        <p>
        </p>


        </div>
    <div class="trading-task">
            <h3 class="info-task">Task time Mars: <?php echo $timemars. ' min' ?></h3>
            <h3 class="info-task">Task time Jupiter: <?php echo $timejupiter. ' min' ?></h3>
            <h3 class="info-task">Task time Saturnus: <?php echo $timesaturnus. ' min' ?></h3>

            <h3 class="commodities">Money</h3>
            <p class="pricelabel"><?php echo $shipprice ?></p>
            <form class="blueButton"  action="databaseController.php?userid=<?= $id ?>&shipid=<?=$shipid?>" method="post">
                <input type="hidden" name="type" value="buy_ship">
                <input type="submit" class="blueButton" value="BUY">
            </form>
    </div>
</div>
</body>
<?php
}
?>
</html>