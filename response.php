<?php
require 'config.php';

session_start();

if (isset($_SESSION['end_time'])) {

    $from_time1 = date("Y-m-d H:i:s");
    $to_time1 = $_SESSION["end_time"];


    $timefirst = strtotime($from_time1);
    $timesecond = strtotime($to_time1);

    $differenceinseconds = $timesecond - $timefirst;

    if ($differenceinseconds == "00:00:00") {

        $id = $_SESSION['id'];

        $sql = "UPDATE users SET commodities = commodities + 1200 WHERE id = :id";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':id' => $id
        ]);


    } else if ($differenceinseconds > 0) {

        //echo "SUBMIT";

        echo gmdate("H:i:s", $differenceinseconds);


    }


}






?>



