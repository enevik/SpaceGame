<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 29-8-2019
 * Time: 11:42
 */

require 'header.php';



//$userid = isset($_GET['id']) ? $_GET['id'] : '';
//$userid = $_GET['id'];
$userid = $_SESSION['id'];




if($userid) {

    $sql5 = " SELECT *  FROM ownedships 
   LEFT JOIN ships
     ON ships.id = ownedships.shipid
 WHERE ownedships.userid = $userid AND ownedships.endtime < NOW() AND ownedships.endtime2 < NOW() AND ownedships.endtime3 < NOW()";

    $query = $db->query($sql5);
    $shipinfos = $query->fetchAll(PDO::FETCH_ASSOC);



    ?>
    <div class="container">
        <h1>Tasks</h1>
        <div class="planet">
            <div class="title">
                <h2>Planet : Mars</h2>
            </div>
            <div class="image">
                <img src="images/mars-image.png" alt="Image of Mars">
            </div>
            <div class="info">
                <h3>Information about Mars</h3>
                <p>Mars is the fourth planet from the Sun and is the second smallest planet in
                    the solar system. Named after the Roman god of war, Mars is also often described as the
                    “Red Planet” due to its reddish appearance. Mars is a terrestrial planet with a thin atmosphere
                    composed primarily of carbon dioxide.</p>
            </div>
        </div>
        <div class="task">
            <div class="info-task">
                <h3>Task</h3>
                <p>Mining commodities from the red planet, soft and rough commodities to be found here.</p>
            </div>
            <div class="commodities">
                <h3>Commodities</h3>
                <p>1.200</p>
            </div>


            <div class="button">

                <form action="databaseController.php?id=<?= $id ?>" method="post">
                    <select name="shipchoice">
                        <?php
                        //session_start();
                        foreach ($shipinfos

                                 as $shipinfo) {

                            echo "<option value=".$shipinfo['id'].">".$shipinfo['shipname']."</option>";
                        }
                        //$waittime = 0;

                       // $_SESSION['shipname']=$shipinfo['shipname'];
                        //$country = $_POST['country'];


                        ?>
                    </select>

                    <input type="hidden" name="type" value="mine_mars">
                    <input type="submit" value="Mine">
                </form>
            </div>
        </div>

        <div class="planet">
            <div class="title">
                <h2>Planet : Jupiter</h2>
            </div>
            <div class="image">
                <img src="images/jupiter-image.png" alt="Image of Mars">
            </div>
            <div class="info">
                <h3>Information about Jupiter</h3>
                <p>Jupiter is the fifth planet from the Sun and the largest in the Solar System. It is a gas giant with a mass one-thousandth that of the Sun,
                    but two-and-a-half times that of all the other planets in the Solar System combined. Jupiter has been known to astronomers since antiquity.
                    It is named after the Roman god Jupiter.</p>
            </div>
        </div>
        <div class="task">
            <div class="info-task">
                <h3>Task</h3>
                <p>Mining commodities from the big planet, finding them all is the job here.</p>
            </div>
            <div class="commodities">
                <h3>Commodities</h3>
                <p>3.200</p>

            </div>





            <div class="button">

                <form action="databaseController.php?id=<?= $id ?>" method="post">
                    <select name="shipchoice">
                        <?php
                        //session_start();
                        foreach ($shipinfos

                                 as $shipinfo) {

                            echo "<option value=".$shipinfo['id'].">".$shipinfo['shipname']."</option>";
                        }
                        //$waittime = 0;

                        // $_SESSION['shipname']=$shipinfo['shipname'];
                        //$country = $_POST['country'];


                        ?>
                    </select>
                    
                    
                    <input type="hidden" name="type" value="mine_jupiter">
                    <input type="submit" value="Mine">
                </form>
            </div>
        </div>

        <div class="planet">
            <div class="title">
                <h2>Planet : Saturnus</h2>
            </div>
            <div class="image">
                <img src="images/saturnus-image.png" alt="Image of Mars">
            </div>
            <div class="info">
                <h3>Information about Saturnus</h3>
                <p>Saturn is the sixth planet from the Sun and the second-largest in the Solar System, after Jupiter.
                    It is a gas giant with an average radius about nine times that of Earth. ...
                    Saturn is named after the Roman god of wealth and agriculture; its astronomical symbol (♄) represents the god's sickle.</p>
            </div>
        </div>
        <div class="task">
            <div class="info-task">
                <h3>Task</h3>
                <p>Mining commodities from the planet with it's great rings. Rough commodities they are.</p>
            </div>
            <div class="commodities">
                <h3>Commodities</h3>
                <p>4.800</p>
            </div>
            <div class="button">
                <form action="databaseController.php?id=<?= $id ?>" method="post">
                    <select name="shipchoice">
                        <?php
                        //session_start();
                        foreach ($shipinfos

                                 as $shipinfo) {

                            echo "<option value=".$shipinfo['id'].">".$shipinfo['shipname']."</option>";
                        }

                        ?>
                    </select>




                    <input type="hidden" name="type" value="mine_saturnus">
                    <input type="submit" value="Mine">
                </form>
            </div>
        </div>
    </div>

    <?php
    require 'footer.php';
}
?>