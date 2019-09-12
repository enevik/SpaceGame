<?php
require 'header.php';
$userid = $_GET['id'];



/*$sql = "SELECT * FROM ownedships WHERE userid = $userid";
$query = $db->query($sql);
$ships = $query->fetchAll(PDO::FETCH_ASSOC);*/


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


foreach ($shipinfos as $shipinfo) {
$shipname = htmlentities($shipinfo['shipname']);
//echo $shipname;


?>
<div class="container">
    <div class="upgradestationGrid">


        <?php
        //var_dump($shipname);die;







        if ($shipname == 'Millenium') {

            echo "<li> <p>$shipname</p><img src='Images/falcon_spaceship.png'></li>";


            echo     "<div class='button'>
                <form action='databaseController.php?id={$id}' method='post'>
                    <input type='hidden' name='type' value='upgrade_millenium_engine'>
                    <input type='submit' value='Upgrade Engine'>
                </form>
            </div>";

            echo     "<div class='button'>
                <form action='databaseController.php?id={$id}' method='post'>
                    <input type='hidden' name='type' value='upgrade_millenium_cargo'>
                    <input type='submit' value='Upgrade Cargo hold'>
                </form>
            </div>";

        }

        if ($shipname == 'Hispenia') {

            echo "<li> <p>$shipname</p><img src='Images/falcon_spaceship.png'></li>";


            echo     "<div class='button'>
                <form action='databaseController.php?id={$id}' method='post'>
                    <input type='hidden' name='type' value='upgrade_hispenia_engine'>
                    <input type='submit' value='Upgrade Engine'>
                </form>
            </div>";

            echo     "<div class='button'>
                <form action='databaseController.php?id={$id}' method='post'>
                    <input type='hidden' name='type' value='upgrade_hispenia_cargo'>
                    <input type='submit' value='Upgrade Cargo hold'>
                </form>
            </div>";





        }


        if ($shipname == 'Hunter-Gratzner') {



            echo "<li> <p>$shipname</p><img src='Images/falcon_spaceship.png'></li>";


            echo     "<div class='button'>
                <form action='databaseController.php?id={$id}' method='post'>
                    <input type='hidden' name='type' value='upgrade_hunter_engine'>
                    <input type='submit' value='Upgrade Engine'>
                </form>
            </div>";

            echo     "<div class='button'>
                <form action='databaseController.php?id={$id}' method='post'>
                    <input type='hidden' name='type' value='upgrade_hunter_cargo'>
                    <input type='submit' value='Upgrade Cargo hold'>
                </form>
            </div>";



        }



        }
?>




























<!--        <div class="headermars">-->
<!--            <div class="headertwomars">-->
<!--	            <h2>Upgrade station</h2>-->
<!--                <h3 class="marsspace">Mars</h3>-->
<!--            </div>-->
<!--            <div class="headermarsthree">-->
<!--                <img src="Images/spaceship.png" alt="">-->
<!--                <div>-->
<!--                    <ul class="marslist">-->
<!--                        <li>Motor<button class="oneupdatebutton">Update</button></li>-->
<!--                        <li>Brandstof<button class="twoupdatebutton">Update</button></li>-->
<!--                        <li>Vleugels<button class="threeupdatebutton">Update</button></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="headermarsfour">-->
<!--                <div class="headertwomarsfour">-->
<!--                    <h3 class="jupiterspace">Jupiter</h3>-->
<!--                </div>-->
<!--                <div class="headermarsthreefour">-->
<!--                    <img src="Images/spaceship.png" alt="">-->
<!--                    <div>-->
<!--                        <ul class="jupiterlist">-->
<!--                            <li>Motor<button class="oneupdatebutton">Update</button></li>-->
<!--                            <li>Brandstof<button class="twoupdatebutton">Update</button></li>-->
<!--                            <li>Vleugels<button class="threeupdatebutton">Update</button></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="headermarsfourtwo">-->
<!--                    <div class="headertwomarsfourtwo">-->
<!--                        <h3 class="venusspace">Venus</h3>-->
<!--                    </div>-->
<!--                    <div class="headermarsthreefourtwo">-->
<!--                        <img src="Images/spaceship.png" alt="">-->
<!--                        <div>-->
<!--                            <ul class="venuslist">-->
<!--                                <li>Motor<button class="oneupdatebutton">Update</button></li>-->
<!--                                <li>Brandstof<button class="twoupdatebutton">Update</button></li>-->
<!--                                <li>Vleugels<button class="threeupdatebutton">Update</button></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="headermarsfivetwo">-->
<!--                        <div class="headertwomarsfivetwo">-->
<!--                            <h3 class="mercuriusspace">Mercurius</h3>-->
<!--                        </div>-->
<!--                        <div class="headermarsthreefivetwo">-->
<!--                            <img src="Images/spaceship.png" alt="">-->
<!--                            <div>-->
<!--                                <ul class="mercuriuslist">-->
<!--                                    <li>Motor<button class="oneupdatebutton">Update</button></li>-->
<!--                                    <li>Brandstof<button class="twoupdatebutton">Update</button></li>-->
<!--                                    <li>Vleugels<button class="threeupdatebutton">Update</button></li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="headermarsfourthree">-->
<!--                            <div class="headertwomarsfourthree">-->
<!--                                <h3 class="saturnusspace">Saturnus</h3>-->
<!--                            </div>-->
<!--                            <div class="headermarsthreefourthree">-->
<!--                                <img src="Images/spaceship.png" alt="">-->
<!--                                <div>-->
<!--                                    <ul class="saturnuslist">-->
<!--                                        <li>Motor<button class="oneupdatebutton">Update</button></li>-->
<!--                                        <li>Brandstof<button class="twoupdatebutton">Update</button></li>-->
<!--                                        <li>Vleugels<button class="threeupdatebutton">Update</button></li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="headerfourmarsfourone">-->
<!--                                <div class="headerfourmarsfourtwo">-->
<!--                                    <h3 class="uranusspace">Uranus</h3>-->
<!--                                </div>-->
<!--                                <div class="headerfourmarsthreefour">-->
<!--                                    <img src="Images/spaceship.png" alt="">-->
<!--                                    <div>-->
<!--                                        <ul class="uranuslist">-->
<!--                                            <li>Motor<button class="oneupdatebutton">Update</button></li>-->
<!--                                            <li>Brandstof<button class="twoupdatebutton">Update</button></li>-->
<!--                                            <li>Vleugels<button class="threeupdatebutton">Update</button></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="headermarsfivethree">-->
<!--                                    <div class="headertwomarsfivethree">-->
<!--                                        <h3 class="neptunusspace">Neptunus</h3>-->
<!--                                    </div>-->
<!--                                    <div class="headermarsthreefivethree">-->
<!--                                        <img src="Images/spaceship.png" alt="">-->
<!--                                        <div>-->
<!--                                            <ul class="neptunuslist">-->
<!--                                                <li>Motor<button class="oneupdatebutton">Update</button></li>-->
<!--                                                <li>Brandstof<button class="twoupdatebutton">Update</button></li>-->
<!--                                                <li>Vleugels<button class="threeupdatebutton">Update</button></li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->