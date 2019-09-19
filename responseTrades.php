<?php
require 'config.php';

session_start();

if (isset($_SESSION['end_timeTrade'])) {

    // it does; output the message


    $from_time1 = date("Y-m-d H:i:s");
    $to_time1 = $_SESSION["end_timeTrade"];


    $timefirst = strtotime($from_time1);
    $timesecond = strtotime($to_time1);


    $differenceinseconds = $timesecond - $timefirst;

    $_SESSION['busyjob'] = $differenceinseconds;


    if ($differenceinseconds == "00:00:00") {

        $id = $_SESSION['id'];

        $sql = 'UPDATE users SET
              cash      = cash + 8000
            WHERE id = :id';
        $prepare = $db->prepare($sql);
        $prepare->execute([
            //':cash' => $add,
            ':id' => $id
        ]);

        $messages = array(
            'Transferred passangers of spacebus',
            'Traded commodities for more valuable ones',
            'Fixed someone their ship'
        );

        $alert = $messages[rand(0, count($messages) - 1)];

        echo "<script>
        //alert('Je hebt te weinig geld');
        alert('$alert');
        //window.location.href='index.php?id=$id';
        </script>";
        exit;


    } else if ($differenceinseconds > 0) {

        //echo "SUBMIT";

        echo gmdate("H:i:s", $differenceinseconds);


    }

}




?>

