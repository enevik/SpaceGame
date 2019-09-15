<?php

require 'config.php';





 /*   //header('Location: index.php');
    exit;
}*/

$sql = "SELECT * FROM `users`";
$query = $db->query($sql);
$users = $query->fetchAll(PDO::FETCH_ASSOC);

/**/







if ($_POST['type'] == 'business') {


    $id = $_GET['id'];



    $sql = 'UPDATE users SET
              cash      = cash + 1000
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
        alert('$alert');
        window.location.href='index.php?id=$id';
        </script>";
    exit;



}





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

        $sql2 = "UPDATE users SET commodities = commodities - $length WHERE id = :id";
        $prepare = $db->prepare($sql2);
        $prepare->execute([
            ':id' => $id
        ]);

        header("location: index.php?id=$id");



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

        $id = $_GET['id'];

        $shipnamee=$_POST['shipchoice'];

       // $waittime;


        if($shipnamee == 3) {
            $waittime = 10;



        }
        if($shipnamee == 1) {
            $waittime = 30;
            //$_SESSION['waittime'] = $waittime;



        }

        $sql3 = "UPDATE users SET duration = $waittime WHERE id = :id";
        $prepare3 = $db->prepare($sql3);
        $prepare3->execute([
            ':id' => $id
        ]);

        $duration="";
        //$id = 1;

        $sql = "SELECT * FROM `users` WHERE id=$id";
        $query = $db->query($sql);


        while($users = $query->fetch(PDO::FETCH_ASSOC))
        {
            $duration=$users["duration"];
        }

        $_SESSION["duration"]=$duration;

        $_SESSION["start_time"]=date("Y-m-d H:i:s");

        $end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));


        $_SESSION["end_time"]=$end_time;

















        echo "<script>
        //alert('Je hebt te weinig geld');
        window.location.href='time.php';
        </script>";
        exit;











        /*if (!isset($_SESSION['countdown'])) {
            $_SESSION['countdown'] = 5;
            $_SESSION['time_started'] = time();
        }

        $now = time();
        $timeSince = $now - $_SESSION['time_started'];
        $remainingSeconds = abs($_SESSION['countdown']);*/


        //if ($remainingSeconds < 1) {
            $id = $_GET['id'];

            $sql = "UPDATE users SET commodities = commodities + 1200 WHERE id = :id";
            $prepare = $db->prepare($sql);
            $prepare->execute([
                ':id' => $id
            ]);




            //header("location: index.php?id=$id");
        //}










        exit;
    }

    if ($_POST['type'] === 'mine_jupiter') {

        $id = $_GET['id'];

        $sql = "UPDATE users  SET commodities = commodities + 3200 WHERE id = :id";
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

if ($_POST['type'] === 'buy_hispenia') {

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id

    ]);

//$query = $db->query($sql);
    $userid = $prepare->fetch(PDO::FETCH_ASSOC);


    if($userid['cash'] < 60000) {
        echo "<script>
        alert('Je hebt te weinig geld');
        window.location.href='trading.php?id=$id';
        </script>";
        exit;
    }



        $shipname = 'Hispenia';

        $sql2 = "SELECT * FROM users WHERE id = :id";
        $prepare2 = $db->prepare($sql2);
        $prepare2->execute([
            ':id' => $id
        ]);
        $users = $prepare2->fetch(PDO::FETCH_ASSOC);
        //$Name = $users['username'];


        $sql3 = "SELECT * FROM ships WHERE shipname=:shipname";
        $prepare3 = $db->prepare($sql3);
        $prepare3->execute([
            ':shipname' => $shipname
        ]);

        $shipinfo = $prepare3->fetch();

        $shipid = $shipinfo['id'];


        $sql = "INSERT INTO ownedships ( shipid, userid) 
        VALUES ( :shipid, :userid)";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            //':Name' => $name,
            ':shipid' => $shipid,
            ':userid' => $id
        ]);

        $sql3 = "UPDATE users SET cash = cash - 60000 WHERE id = :id";
        $prepare3 = $db->prepare($sql3);
        $prepare3->execute([
        ':id' => $id
        ]);


        header("location: index.php?id=$id");


}

if ($_POST['type'] === 'buy_hunter') {

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id

    ]);

//$query = $db->query($sql);
    $userid = $prepare->fetch(PDO::FETCH_ASSOC);

    if($userid['cash'] < 80000) {
        echo "<script>
        alert('Je hebt te weinig geld');
        window.location.href='trading.php?id=$id';
        </script>";
        exit;
    }




        $shipname = 'Hunter-Gratzner';

        $sql2 = "SELECT * FROM users WHERE id = :id";
        $prepare2 = $db->prepare($sql2);
        $prepare2->execute([
            ':id' => $id
        ]);
        $users = $prepare2->fetch(PDO::FETCH_ASSOC);
        //$Name = $users['username'];


        $sql3 = "SELECT * FROM ships WHERE shipname=:shipname";
        $prepare3 = $db->prepare($sql3);
        $prepare3->execute([
            ':shipname' => $shipname
        ]);

        $shipinfo = $prepare3->fetch();

        $shipid = $shipinfo['id'];


        $sql = "INSERT INTO ownedships ( shipid, userid) 
        VALUES ( :shipid, :userid)";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            //':Name' => $name,
            ':shipid' => $shipid,
            ':userid' => $id
        ]);

        $sql3 = "UPDATE users SET cash = cash - 80000 WHERE id = :id";
        $prepare3 = $db->prepare($sql3);
        $prepare3->execute([
            ':id' => $id
        ]);



        header("location: index.php?id=$id");


}

if ($_POST['type'] === 'buy_millenium') {

    $id = $_GET['id'];


    $sql = "SELECT * FROM users WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id

    ]);

//$query = $db->query($sql);
    $userid = $prepare->fetch(PDO::FETCH_ASSOC);

    if($userid['cash'] < 80000) {
        echo "<script>
        alert('Je hebt te weinig geld');
        window.location.href='trading.php?id=$id';
        </script>";
        exit;
    }





        $shipname = 'Millenium';
        //$price = 100000;

        $sql2 = "SELECT * FROM users WHERE id = :id";
        $prepare2 = $db->prepare($sql2);
        $prepare2->execute([
            ':id' => $id,
            //':cash' => $price
        ]);
        $users = $prepare2->fetch(PDO::FETCH_ASSOC);
        //$Name = $users['username'];


        $sql3 = "SELECT * FROM ships WHERE shipname=:shipname";
        $prepare3 = $db->prepare($sql3);
        $prepare3->execute([
            ':shipname' => $shipname
        ]);

        $shipinfo = $prepare3->fetch();

        $shipid = $shipinfo['id'];


        $sql = "INSERT INTO ownedships ( shipid, userid) 
        VALUES ( :shipid, :userid)";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            //':Name' => $name,
            ':shipid' => $shipid,
            ':userid' => $id
        ]);

        $sql3 = "UPDATE users SET cash = cash - 100000 WHERE id = :id";
        $prepare3 = $db->prepare($sql3);
        $prepare3->execute([
            ':id' => $id
        ]);



        header("location: index.php?id=$id");



}



if ($_POST['type'] === 'upgrade_millenium_engine') {


        $id = $_GET['id'];

        $shipname = 'Millenium';

        $sql2 = "SELECT * FROM users WHERE id = :id";
        $prepare2 = $db->prepare($sql2);
        $prepare2->execute([
            ':id' => $id
        ]);
        $users = $prepare2->fetch(PDO::FETCH_ASSOC);
        //$Name = $users['username'];



        $sql3 = "SELECT * FROM ships WHERE shipname=:shipname";
        $prepare3 = $db->prepare($sql3);
        $prepare3->execute([
            ':shipname' => $shipname
        ]);

        $shipinfo = $prepare3->fetch();

        $shipid = $shipinfo['id'];



        $sql = "UPDATE ownedships SET engine = 1 WHERE shipid=:shipid";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            //':engine' => '1',
            ':shipid' => 3,
            //':userid' => $id

        ]);



    header("location: index.php?id=$id");
}

if ($_POST['type'] === 'upgrade_hunter_engine') {


    $id = $_GET['id'];

    $shipname = 'Hunter-Gratzner';

    $sql2 = "SELECT * FROM users WHERE id = :id";
    $prepare2 = $db->prepare($sql2);
    $prepare2->execute([
        ':id' => $id
    ]);
    $users = $prepare2->fetch(PDO::FETCH_ASSOC);
    //$Name = $users['username'];



    $sql3 = "SELECT * FROM ships WHERE shipname=:shipname";
    $prepare3 = $db->prepare($sql3);
    $prepare3->execute([
        ':shipname' => $shipname
    ]);

    $shipinfo = $prepare3->fetch();

    $shipid = $shipinfo['id'];



    $sql = "UPDATE ownedships SET engine = 1 WHERE shipid=:shipid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        //':engine' => '1',
        ':shipid' => 2,
        //':userid' => $id

    ]);



    header("location: index.php?id=$id");
}


if ($_POST['type'] === 'upgrade_hispenia_engine') {


    $id = $_GET['id'];

    $shipname = 'Hispenia';

    $sql2 = "SELECT * FROM users WHERE id = :id";
    $prepare2 = $db->prepare($sql2);
    $prepare2->execute([
        ':id' => $id
    ]);
    $users = $prepare2->fetch(PDO::FETCH_ASSOC);
    //$Name = $users['username'];



    $sql3 = "SELECT * FROM ships WHERE shipname=:shipname";
    $prepare3 = $db->prepare($sql3);
    $prepare3->execute([
        ':shipname' => $shipname
    ]);

    $shipinfo = $prepare3->fetch();

    $shipid = $shipinfo['id'];



    $sql = "UPDATE ownedships SET engine = 1 WHERE shipid=:shipid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        //':engine' => '1',
        ':shipid' => 1,
        //':userid' => $id

    ]);



    header("location: index.php?id=$id");
}







if ($_POST['type'] === 'upgrade_millenium_cargo') {


    $id = $_GET['id'];

    $shipname = 'Millenium';

    $sql2 = "SELECT * FROM users WHERE id = :id";
    $prepare2 = $db->prepare($sql2);
    $prepare2->execute([
        ':id' => $id
    ]);
    $users = $prepare2->fetch(PDO::FETCH_ASSOC);
    //$Name = $users['username'];



    $sql3 = "SELECT * FROM ships WHERE shipname=:shipname";
    $prepare3 = $db->prepare($sql3);
    $prepare3->execute([
        ':shipname' => $shipname
    ]);

    $shipinfo = $prepare3->fetch();

    $shipid = $shipinfo['id'];



    $sql = "UPDATE ownedships SET cargo = 1 WHERE shipid=:shipid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        //':engine' => '1',
        ':shipid' => 3,
        //':userid' => $id

    ]);



    header("location: index.php?id=$id");
}

if ($_POST['type'] === 'upgrade_hunter_cargo') {


    $id = $_GET['id'];

    $shipname = 'Hunter-Gratzner';

    $sql2 = "SELECT * FROM users WHERE id = :id";
    $prepare2 = $db->prepare($sql2);
    $prepare2->execute([
        ':id' => $id
    ]);
    $users = $prepare2->fetch(PDO::FETCH_ASSOC);
    //$Name = $users['username'];



    $sql3 = "SELECT * FROM ships WHERE shipname=:shipname";
    $prepare3 = $db->prepare($sql3);
    $prepare3->execute([
        ':shipname' => $shipname
    ]);

    $shipinfo = $prepare3->fetch();

    $shipid = $shipinfo['id'];



    $sql = "UPDATE ownedships SET cargo = 1 WHERE shipid=:shipid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        //':engine' => '1',
        ':shipid' => 2,
        //':userid' => $id

    ]);



    header("location: index.php?id=$id");
}


if ($_POST['type'] === 'upgrade_hispenia_cargo') {


    $id = $_GET['id'];

    $shipname = 'Hispenia';

    $sql2 = "SELECT * FROM users WHERE id = :id";
    $prepare2 = $db->prepare($sql2);
    $prepare2->execute([
        ':id' => $id
    ]);
    $users = $prepare2->fetch(PDO::FETCH_ASSOC);
    //$Name = $users['username'];



    $sql3 = "SELECT * FROM ships WHERE shipname=:shipname";
    $prepare3 = $db->prepare($sql3);
    $prepare3->execute([
        ':shipname' => $shipname
    ]);

    $shipinfo = $prepare3->fetch();

    $shipid = $shipinfo['id'];



    $sql = "UPDATE ownedships SET cargo = 1 WHERE shipid=:shipid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        //':engine' => '1',
        ':shipid' => 1,
        //':userid' => $id

    ]);



    header("location: index.php?id=$id");
}

