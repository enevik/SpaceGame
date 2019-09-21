


<?php
require 'header.php';
//$userid = $_GET['id'];


//session_start();






//$userid = isset($_GET['id']) ? $_GET['id'] : '';
$userid = $_SESSION['id'];

//$id = $_GET['id'];
$id = $_SESSION['id'];


?>
<div class="upgradestationstyle">
    <div class="button">
        <form action="databaseController.php?id=<?=$id?>" method="post">
            <input type="hidden" name="type" value="business">
            <input type="submit" value="Make trades">
        </form>
    </div>
</div>

<?php


/*$sql = "SELECT * FROM ownedships WHERE userid = $userid";
$query = $db->query($sql);
$ships = $query->fetchAll(PDO::FETCH_ASSOC);*/

if($userid) {

$sql5 = " SELECT *  FROM ownedships 
   LEFT JOIN ships
     ON ships.id = ownedships.shipid
 WHERE ownedships.userid = $userid";

//$sql0 = "select * from ownedships WHERE ownedships.userid=$userid left join ships on ownedships.shipid = ships.id";
$query = $db->query($sql5);
$shipinfos = $query->fetchAll(PDO::FETCH_ASSOC);





foreach ($shipinfos

as $shipinfo) {
$shipname = htmlentities($shipinfo['shipname']);
$shippic = htmlentities($shipinfo['shippic']);
$shipid = htmlentities($shipinfo['shipid']);
//echo $shipname;


?>





<div class="container">
    <div class="upgradestationGrid">


        <?php



            echo
            "<li> <p>$shipname</p>
                <img src='Images/$shippic'>
                <div class='button'>
                    <form action='databaseController.php?id={$shipid}' method='post'>
                        <input type='hidden' name='type' value='upgrade_engine'>
                        <input type='submit' value='Upgrade Engine (Ƒ1000)'>
                    </form>
                </div>
                <div class='button'>
                    <form action='databaseController.php?id={$shipid}' method='post'>
                        <input type='hidden' name='type' value='upgrade_cargo'>
                        <input type='submit' value='Upgrade Cargo hold (Ƒ1000)'>
                    </form>
                </div>
            </li>";
        //}
        }
        }
?>
    </div>

</div>
