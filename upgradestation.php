<?php
require 'header.php';
$userid = $_GET['id'];
$sql = "SELECT * FROM ships WHERE id = '$userid'";
$query = $db->query($sql);
$ships = $query->fetchAll(PDO::FETCH_ASSOC);

?>
    <div class="container">
        <div class="upgradestationGrid">
            <?
            foreach ($ships as $ship) {

            }



            <div>
                <h3>Mars</h3>
                <img src="Images/spaceship.png" alt="">
                <ul>
                    <li>motor <button>update</button></li>
                    <li>brandstof <button>update</button></li>
                    <li>vleugels <button>update</button></li>
                </ul>
            </div>
            <div>
                <h3>Jupiter</h3>
                <img src="Images/spaceship.png" alt="">
                <ul>
                    <li>motor <button>update</button></li>
                    <li>brandstof <button>update</button></li>
                    <li>vleugels <button>update</button></li>
                </ul>
            </div>
            <div>
                <h3>Venus</h3>
                <img src="Images/spaceship.png" alt="">
                <ul>
                    <li>motor <button>update</button></li>
                    <li>brandstof <button>update</button></li>
                    <li>vleugels <button>update</button></li>
                </ul>
            </div>
            <div>
                <h3>Mercurius</h3>
                <img src="Images/spaceship.png" alt="">
                <ul>
                    <li>motor <button>update</button></li>
                    <li>brandstof <button>update</button></li>
                    <li>vleugels <button>update</button></li>
                </ul>
            </div>
            <div>
                <h3>Saturnus</h3>
                <img src="Images/spaceship.png" alt="">
                <ul>
                    <li>motor <button>update</button></li>
                    <li>brandstof <button>update</button></li>
                    <li>vleugels <button>update</button></li>
                </ul>
            </div>
            <div>
                <h3>Uranus</h3>
                <img src="Images/spaceship.png" alt="">
                <ul>
                    <li>motor <button>update</button></li>
                    <li>brandstof <button>update</button></li>
                    <li>vleugels <button>update</button></li>
                </ul>
            </div>
            <div>
                <h3>Neptunus</h3>
                <img src="Images/spaceship.png" alt="">
                <ul>
                    <li>motor <button>update</button></li>
                    <li>brandstof <button>update</button></li>
                    <li>vleugels <button>update</button></li>
                </ul>
            </div>
        </div>
    </div>
















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