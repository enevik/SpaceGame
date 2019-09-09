<?php
require 'header.php';
$userid = $_GET['id'];
$sql = "SELECT * FROM ships WHERE userid = $userid";
$query = $db->query($sql);
$ships = $query->fetchAll(PDO::FETCH_ASSOC);

//$shipname = $ships['shipname'];

//var_dump($ships);

foreach ($ships as $ship) {

    $shipname = htmlentities($ship['shipname']);

}

?>
    <div class="container">
        <div class="upgradestationGrid">
            <?php
            //var_dump($ships);die;


                //$email = htmlentities($contact['email']);
                //$achternaam = htmlentities($contact['achternaam']); //htmlentities beschermt tegen html injectie bij form invoer
                //$voornaam = htmlentities($contact['voornaam']);



                echo "<li> $shipname</li>";






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