<?php
require 'config.php';

session_start();

//if (isset($_SESSION['end_time2'])) {

$id = $_SESSION['id'];

$sql = "SELECT * FROM ownedships WHERE userid = $id";
$query = $db->query($sql);
$shipinfos = $query->fetchAll(PDO::FETCH_ASSOC);






foreach ($shipinfos as $shipinfo) {

    $shipid = $shipinfo['shipid'];

    $sql5 = " SELECT *  FROM ownedships 
   LEFT JOIN ships
     ON ships.id = ownedships.shipid
 WHERE ownedships.shipid = $shipid AND ownedships.userid = $id";

//$sql0 = "select * from ownedships WHERE ownedships.userid=$userid left join ships on ownedships.shipid = ships.id";
    $query = $db->query($sql5);
    $shipnames = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($shipnames as $shipname) {
        $shipnamee = $shipname['shipname'];


        $endtime = $shipinfo['endtime3'];


        $from_time1 = date("Y-m-d H:i:s");

        $to_time1 = $endtime;


        $timefirst = strtotime($from_time1);
        $timesecond = strtotime($to_time1);

        $differenceinseconds = $timesecond - $timefirst;


        if ($differenceinseconds == "00:00:00") {

            $id = $_SESSION['id'];


            $commodities = $_SESSION['commoditiessaturnus'];


            $sql = "UPDATE users SET commodities = commodities + $commodities WHERE id = :id";
            $prepare = $db->prepare($sql);
            $prepare->execute([
                ':id' => $id
            ]);

            /*$sql = "UPDATE ownedships SET endtime3 = :endtime WHERE userid = :id AND shipid = :shipid";
            $prepare = $db->prepare($sql);
            $prepare->execute([
                ':endtime' => '',
                ':id' => $id,
                ':shipid' => $shipid
            ]);*/

            echo "You've earned your commodities!";


            echo "<meta http-equiv=\"refresh\" content=\"3;URL=index.php\">";


        } else if ($differenceinseconds > 0) {


            echo $shipnamee, ": ", gmdate("H:i:s", $differenceinseconds), " ";
        }
    }


}


?>



