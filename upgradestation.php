


<?php
require 'header.php';
//$userid = $_GET['id'];









$userid = isset($_GET['id']) ? $_GET['id'] : '';

$id = $_GET['id'];


?>
<div class="button">
    <form action="databaseController.php?id=<?=$id?>" method="post">
        <input type="hidden" name="type" value="business">
        <input type="submit" value="Make trades">
    </form>
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


/*$sql3 = "SELECT * FROM ownedships WHERE userid=:userid";
$prepare3 = $db->prepare($sql3);
$prepare3->execute([
    ':userid' => $userid
]);

$ships = $prepare3->fetch();

//var_dump($ships);

$shipid = $ships['shipid'];


/*$sql4 = "SELECT * FROM ships WHERE id=:id";
$prepare4 = $db->prepare($sql4);
$prepare4->execute([
    ':id' => $shipid
]);*/

/*foreach ($shipid as $shipi) {
    $sql = "SELECT * FROM ships WHERE id = $shipi";
    $query = $db->query($sql);
    $shipinfos = $query->fetch(PDO::FETCH_ASSOC);
}*/


//$shipinfos = $prepare4->fetch();


//$shipname = $ships['shipname'];

//var_dump($shipinfos);


//echo $shipinfos['shipname'];

//$shipinfos = array();

/*foreach( $shipinfos as $shipinfo)
{

    echo $shipinfo['shipname'];

    //...
}*/




foreach ($shipinfos

as $shipinfo) {
$shipname = htmlentities($shipinfo['shipname']);
//echo $shipname;


?>
<div class="container">
    <div class="upgradestationGrid">


        <?php
        //var_dump($shipname);die;
        if ($shipname == 'Millenium') {

            echo
            "<li> <p>$shipname</p>
                <img src='Images/falcon_spaceship.png'>
                <div class='button'>
                    <form action='databaseController.php?id={$id}' method='post'>
                        <input type='hidden' name='type' value='upgrade_millenium_engine'>
                        <input type='submit' value='Upgrade Engine'>
                    </form>
                </div>
                <div class='button'>
                    <form action='databaseController.php?id={$id}' method='post'>
                        <input type='hidden' name='type' value='upgrade_millenium_cargo'>
                        <input type='submit' value='Upgrade Cargo hold'>
                    </form>
                </div>
            </li>";
        }

        if ($shipname == 'Hispenia') {

            echo
            "<li> <p>$shipname</p>
                <img src='Images/hispenia.png'>
                <div class='button'>
                    <form action='databaseController.php?id={$id}' method='post'>
                        <input type='hidden' name='type' value='upgrade_hispenia_engine'>
                        <input type='submit' value='Upgrade Engine'>
                    </form>
                </div>
                <div class='button'>
                    <form action='databaseController.php?id={$id}' method='post'>
                        <input type='hidden' name='type' value='upgrade_hispenia_cargo'>
                        <input type='submit' value='Upgrade Cargo hold'>
                    </form>
                </div>
            </li>";
        }


        if ($shipname == 'Hunter-Gratzner') {


            echo
            "<li> <p>$shipname</p>
                <img src='Images/Hunter-Gratzner.png' class='Hunter-Gratzner'>
                <div class='button'>
                    <form action='databaseController.php?id={$id}' method='post'>
                        <input type='hidden' name='type' value='upgrade_hunter_engine'>
                        <input type='submit' value='Upgrade Engine'>
                    </form>
                </div>
                <div class='button'>
                    <form action='databaseController.php?id={$id}' method='post'>
                        <input type='hidden' name='type' value='upgrade_hunter_cargo'>
                        <input type='submit' value='Upgrade Cargo hold'>
                    </form>
                </div>
            </li>";
        }
        }
        }
?>
    </div>

</div>
