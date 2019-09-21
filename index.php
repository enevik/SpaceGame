<?php
require 'header.php';
//session_start();





//$userid = isset($_GET['id']) ? $_GET['id'] : '';
$userid = $_SESSION['id'];




/*$sql = "SELECT * FROM ownedships WHERE userid = $userid";
$query = $db->query($sql);
$ships = $query->fetchAll(PDO::FETCH_ASSOC);*/



if($userid) {


    $sql5 = " SELECT *  FROM ownedships 
   LEFT JOIN ships
     ON ships.id = ownedships.shipid
 WHERE ownedships.userid = $userid";

    $query = $db->query($sql5);
    $shipinfos = $query->fetchAll(PDO::FETCH_ASSOC);




   $responseMars = '<div id="response"></div>

    <script type="text/javascript">













        setInterval(function () {



            var xmlhtpp = new XMLHttpRequest();
            xmlhtpp.open("GET", "response.php", false);
            xmlhtpp.send(null);




            document.getElementById("response").innerHTML = xmlhtpp.responseText;








        },1000)












    </script>';

    $responseJupiter = '<div id="response2"></div>

    <script type="text/javascript">

        setInterval(function () {

            var xmlhtpp = new XMLHttpRequest();
            xmlhtpp.open("GET", "response2.php", false);
            xmlhtpp.send(null);
            document.getElementById("response2").innerHTML = xmlhtpp.responseText;



            



        },1000)
        
        
        
       






    </script>';


   $responseSaturnus = '<div id="response3"></div>

    <script type="text/javascript">













        setInterval(function () {



            var xmlhtpp = new XMLHttpRequest();
            xmlhtpp.open("GET", "response3.php", false);
            xmlhtpp.send(null);




            document.getElementById("response3").innerHTML = xmlhtpp.responseText;








        },1000)












    </script>';

    $responseTrades = '<div id="responseTrade"></div>

    <script type="text/javascript">



        setInterval(function () {

            var xmlhtpp = new XMLHttpRequest();
            xmlhtpp.open("GET", "responseTrades.php", false);
            xmlhtpp.send(null);
            document.getElementById("responseTrade").innerHTML = xmlhtpp.responseText;






        },1000)

    </script>';


?>





    <div class="container">
            <div class="maingrid">
                <div class="personalinformation">
                    <h2>Personal information</h2>
                    <div>
                        <p>Name: <?php echo $userinfo['name'] ?></p>
                        <p>Ships: <?php
    foreach ($shipinfos

             as $shipinfo) {
        echo $shipinfo['shipname'],' ';
    }
                            ?></p>
                        <p>Cash: <?php echo $userinfo['cash'] ?></p>
                    </div>
                </div>
                <div class="gif">
                    <img src="Images/saturnus.gif" alt="hier is een gif van saturnus">
                </div>
                <div class="tasks">
                    <h2>Tasks</h2>
                    <div>
                        <h4>Mars:</h4>
                        <p><?php echo $responseMars ?></p>
                        <h4>Jupiter:</h4>
                        <p><?php echo $responseJupiter ?></p>
                        <h4>Saturnus:</h4>
                        <p><?php echo $responseSaturnus ?></p>
                        <h4>Trades:</h4>
                        <p><?php echo $responseTrades ?></p>
                    </div>
                </div>
            </div>
        </div>


        <?php

}


require 'footer.php';
?>