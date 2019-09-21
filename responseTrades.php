<?php
require 'config.php';

session_start();

$id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE id = $id";
$query = $db->query($sql);
$userinfos = $query->fetchAll(PDO::FETCH_ASSOC);



foreach ($userinfos as $userinfo) {


    $from_time1 = date("Y-m-d H:i:s");
    $to_time1 = $userinfo['job'];


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

        echo "$alert";

        echo "<meta http-equiv=\"refresh\" content=\"3;URL=index.php\">";


    } else if ($differenceinseconds > 0) {

        //echo "SUBMIT";

        echo gmdate("H:i:s", $differenceinseconds);


    }
}

//}




?>

