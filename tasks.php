<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 29-8-2019
 * Time: 11:42
 */

require 'header.php';



//$userid = isset($_GET['id']) ? $_GET['id'] : '';
$userid = $_SESSION['id'];




if($userid) {

    $sql5 = " SELECT *  FROM ownedships 
   LEFT JOIN ships
     ON ships.id = ownedships.shipid
 WHERE ownedships.userid = $userid";

//$sql0 = "select * from ownedships WHERE ownedships.userid=$userid left join ships on ownedships.shipid = ships.id";
    $query = $db->query($sql5);
    $shipinfos = $query->fetchAll(PDO::FETCH_ASSOC);


    /*foreach ($shipinfos

             as $shipinfo) {
        $shipname = htmlentities($shipinfo['shipname']);
//echo $shipname;
    }*/


    ?>
    <div class="container">
        <h1>Tasks</h1>
        <div class="planet">
            <div class="title">
                <h2>Planeet : Mars</h2>
            </div>
            <div class="image">
                <img src="images/mars-image.png" alt="Image of Mars">
            </div>
            <div class="info">
                <h3>Informatie over mars</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum error labore, magnam maiores modi
                    officiis quis similique. Animi at cumque eos, ex iste quod reiciendis velit vitae voluptas
                    voluptatibus? Repellendus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. A amet autem
                    delectus ducimus est et expedita explicabo, impedit itaque iure laborum magnam neque quaerat quas
                    quidem, repellat suscipit tempora temporibus. Lorem ipsum dolor sit amet, consectetur adipisicing
                    elit. Autem consectetur cumque cupiditate dicta dolor dolore eligendi, ipsa iure iusto libero maxime
                    modi molestias nulla odit praesentium quam, quibusdam rem sint!</p>
            </div>
        </div>
        <div class="task">
            <div class="info-task">
                <h3>Task</h3>
                <p>Lorem ipsum dolor sit amet, libero maxime, minus modi necessitatibus omnis quas quasi suscipit?</p>
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
                <h2>Planeet : Jupiter</h2>
            </div>
            <div class="image">
                <img src="images/jupiter-image.png" alt="Image of Mars">
            </div>
            <div class="info">
                <h3>Informatie over Jupiter</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum error labore, magnam maiores modi
                    officiis quis similique. Animi at cumque eos, ex iste quod reiciendis velit vitae voluptas
                    voluptatibus? Repellendus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. A amet autem
                    delectus ducimus est et expedita explicabo, impedit itaque iure laborum magnam neque quaerat quas
                    quidem, repellat suscipit tempora temporibus. Lorem ipsum dolor sit amet, consectetur adipisicing
                    elit. Autem consectetur cumque cupiditate dicta dolor dolore eligendi, ipsa iure iusto libero maxime
                    modi molestias nulla odit praesentium quam, quibusdam rem sint!</p>
            </div>
        </div>
        <div class="task">
            <div class="info-task">
                <h3>Task</h3>
                <p>Lorem ipsum dolor sit amet, libero maxime, minus modi necessitatibus omnis quas quasi suscipit?</p>
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
                <h2>Planeet : Saturnus</h2>
            </div>
            <div class="image">
                <img src="images/saturnus-image.png" alt="Image of Mars">
            </div>
            <div class="info">
                <h3>Informatie over Saturnus</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum error labore, magnam maiores modi
                    officiis quis similique. Animi at cumque eos, ex iste quod reiciendis velit vitae voluptas
                    voluptatibus? Repellendus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. A amet autem
                    delectus ducimus est et expedita explicabo, impedit itaque iure laborum magnam neque quaerat quas
                    quidem, repellat suscipit tempora temporibus. Lorem ipsum dolor sit amet, consectetur adipisicing
                    elit. Autem consectetur cumque cupiditate dicta dolor dolore eligendi, ipsa iure iusto libero maxime
                    modi molestias nulla odit praesentium quam, quibusdam rem sint!</p>
            </div>
        </div>
        <div class="task">
            <div class="info-task">
                <h3>Task</h3>
                <p>Lorem ipsum dolor sit amet, libero maxime, minus modi necessitatibus omnis quas quasi suscipit?</p>
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
                        //$waittime = 0;

                        // $_SESSION['shipname']=$shipinfo['shipname'];
                        //$country = $_POST['country'];


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