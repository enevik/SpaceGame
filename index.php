<?php
require 'header.php';

$userid = isset($_GET['id']) ? $_GET['id'] : '';



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



//echo $shipname;


        ?>

        <div class="container">
            <div class="maingrid">
                <div class="personalinformation">
                    <h2>Persoonlijke informatie</h2>
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
                        <p>mars</p>
                        <p>jupiter</p>
                    </div>
                </div>
            </div>
        </div>


        <?php

}

require 'footer.php';
?>