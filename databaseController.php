<?php

require 'config.php';




 /*   //header('Location: index.php');
    exit;
}*/

$sql = "SELECT * FROM `users`";
$query = $db->query($sql);
$users = $query->fetchAll(PDO::FETCH_ASSOC);

/**/
    


//if($_SERVER['REQUEST_METHOD'] != 'POST') {
    if ($_POST['type'] == 'material') {

        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = :id";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':id' => $id

        ]);

        $users = $prepare->fetch(PDO::FETCH_ASSOC);

        $cash = 10;

        $realcash = $users['cash'];
        $length = intval($_POST['material']);
        $amount = $length * $cash;
        $add = $realcash += $amount;

        //$id = 1;
        /*$sql = "INSERT INTO `users` (cash)
values (:cash)";

        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':cash' => $add
            //':team2'     => $team2
        ]);*/

        $sql = 'UPDATE users SET
              cash      = :cash
            WHERE id = :id';
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':cash' => $add,
            ':id' => $id
        ]);


        // $realcash += $amount;


//echo $realcash;


    }
//}


    if ($_POST['type'] === 'createuser') {
        $username = $_POST['username'];
        $cash = 5000;

        $sql = "INSERT INTO users (name, cash) VALUES (:username, :cash)";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':username' => $username,
            ':cash' => $cash
        ]);

        header("location: index.php");
        exit;
    }

    if ($_POST['type'] === 'loginuser') {

        $username = $_POST['username'];

        $sql = "SELECT * FROM users WHERE name=:username";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':username' => $username
        ]);

        $users = $prepare->fetch();

        $users = $users['id'];
        $_SESSION['id'] = $users['id'];
        //$_SESSION['username'] = $username;
        //$_SESSION['commodities'] = $users['commodities'];
        //$_SESSION['cash'] = $users['cash'];
        //$_SESSION['loginCheck'] = true;

        header( "location: index.php?id=$users");
        exit;
    }

    if ($_POST['type'] === 'mine_mars') {
        session_start();

        if (!isset($_SESSION['countdown'])) {
            $_SESSION['countdown'] = 5;
            $_SESSION['time_started'] = time();
        }

        $now = time();
        $timeSince = $now - $_SESSION['time_started'];
        $remainingSeconds = abs($_SESSION['countdown']);


        if ($remainingSeconds < 1) {
            $id = $_GET['id'];

            $sql = "UPDATE users SET commodities = commodities + 1200 WHERE id = :id";
            $prepare = $db->prepare($sql);
            $prepare->execute([
                ':id' => $id
            ]);
            header("location: index.php?id=$id");
        }







        exit;
    }

    if ($_POST['type'] === 'mine_jupiter') {

        $id = $_GET['id'];

        $sql = "UPDATE users SET commodities = commodities + 3200 WHERE id = :id";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':id' => $id
        ]);

        header("location: index.php?id=$id");
    }

    if ($_POST['type'] === 'mine_saturnus') {

        $id = $_GET['id'];

        $sql = "UPDATE users SET commodities = commodities + 4800 WHERE id = :id";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':id' => $id
        ]);

        header("location: index.php?id=$id");
    }

if ($_POST['type'] === 'buy_hispania') {

    $id = $_GET['id'];

    $sql = "UPDATE users SET cash = cash - 60000 WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id
    ]);

    $sql1 = "INSERT INTO ships (userid, id) VALUES (:userid, :id)";
    $prepare = $db->prepare($sql1);
    $prepare->execute([
        'userid' => $id,
        ':id' => '1'
    ]);

    header("location: index.php?id=$id");
}

if ($_POST['type'] === 'buy_hunter') {

    $id = $_GET['id'];

    $sql = "UPDATE users SET cash = cash - 80000 WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id
    ]);

    header("location: index.php?id=$id");
}

if ($_POST['type'] === 'buy_millenium') {

    $id = $_GET['id'];

    $shipname = 'Millenium Falcon';

    $sql2 = "SELECT * FROM users WHERE id = :id";
    $prepare2 = $db->prepare($sql2);
    $prepare2->execute([
        ':id' => $id
    ]);
    $users = $prepare2->fetch(PDO::FETCH_ASSOC);
    //$Name = $users['username'];

    $sql = "INSERT INTO ships ( shipname, userid) 
        VALUES ( :shipname, :userid)";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        //':Name' => $name,
        ':shipname' => $shipname,
        ':userid' => $id,
    ]);















    /*$sql = "UPDATE users SET cash = cash - 100000 WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id
    ]);

    $sql = "UPDATE ships SET userid WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id
    ]);*/


    header("location: index.php?id=$id");
}