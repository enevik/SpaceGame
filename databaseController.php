<?php

require 'config.php';
session_start();

$sql = "SELECT * FROM `users`";
$query = $db->query($sql);
$users = $query->fetchAll(PDO::FETCH_ASSOC);




    $cash = 10;

    $realcash = $users[0]['cash'];
    $length = intval($_POST['material']);
    $amount = $length * $cash;
    $add = $realcash += $amount;


    if (isset($_POST['material'])) {

        $id = 1;
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
            ':cash'         => $add,
            ':id'           => $id
        ]);


        // $realcash += $amount;


//echo $realcash;


    }


