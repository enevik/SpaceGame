<?php

require 'config.php';





 /*   //header('Location: index.php');
    exit;
}*/

$sql = "SELECT * FROM `users`";
$query = $db->query($sql);
$users = $query->fetchAll(PDO::FETCH_ASSOC);

/**/


if($_POST['type'] == 'create') {

    session_start();

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = $id";
    $query = $db->query($sql);
    $users = $query->fetch(PDO::FETCH_ASSOC);


        $admin = $users['admin'];


        if ($admin == 1) {


            $shipname = $_POST['shipname'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $timemars = $_POST['timechoicemars'];
            $timejupiter = $_POST['timechoicejupiter'];
            $timesaturnus = $_POST['timechoicesaturnus'];


            $sql = $db->prepare('INSERT INTO ships (shipname, price, description, shippic, joblengthmars, joblengthjupiter, joblengthsaturnus) 
        VALUES ( :shipname, :price, :description, :shippic, :joblengthmars, :joblengthjupiter, :joblengthsaturnus)');


//$prepare = $db->prepare($sql);

            $sql->execute([
                ':shipname' => $shipname,
                ':price' => $price,
                ':description' => $description,
                ':shippic' => $image,
                ':joblengthmars' => $timemars,
                ':joblengthjupiter' => $timejupiter,
                ':joblengthsaturnus' => $timesaturnus

            ]);
        } else {
            $alert = "You're not an admin";

            echo "<script>
        alert('You are are not an admin');
        //alert('$alert');
        window.location.href='index.php?id=$id';
        </script>";
            exit;

        }

    header("location: index.php?id=$id");


}





if ($_POST['type'] == 'business') {
    session_start();

    $id = $_GET['id'];

    $sql3 = "UPDATE users SET duration = 1440 WHERE id = :id";
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


    $_SESSION["end_timeTrade"]=$end_time;




















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
        //alert('Je hebt te weinig geld');
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


    if ($_POST['type'] == 'createuser') {
        $username = $_POST['username'];
        $cash = 5000;

        $sql = "INSERT INTO users (name, cash) VALUES (:username, :cash)";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':username' => $username,
            ':cash' => $cash
        ]);

        $sql = "SELECT * FROM `users` where `name`='$username'";
        $query = $db->query($sql);
        $userinfo = $query->fetch(PDO::FETCH_ASSOC);




        //$shipid = 7;
        //$userinfo = $prepare->fetch();

        $userid = $userinfo['id'];

        var_dump($userinfo);


        $sql = "INSERT INTO ownedships ( shipid, userid)
        VALUES ( :shipid, :userid)";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            //':Name' => $name,
            ':shipid' => 7,
            ':userid' => $userid
        ]);


        header("location: index.php");
        exit;
    }

    if ($_POST['type'] == 'loginuser') {
        session_start();

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

        $shipid=$_POST['shipchoice'];

       // $waittime;

        $sql = "SELECT * FROM ships WHERE id = :shipid";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':shipid' => $shipid

        ]);

//$query = $db->query($sql);
        $shipnames = $prepare->fetchAll(PDO::FETCH_ASSOC);

        //var_dump($shipnames); die;

        foreach ($shipnames as $shipname) {
            $joblength = $shipname['joblengthmars'];


            //var_dump($joblength);
            $sql5 = " SELECT * FROM ownedships WHERE shipid = $shipid";

//$sql0 = "select * from ownedships WHERE ownedships.userid=$userid left join ships on ownedships.shipid = ships.id";
            $query = $db->query($sql5);
            $shipinfo = $query->fetch(PDO::FETCH_ASSOC);


            if($shipinfo['cargo'] == 1) {
                $length = round($joblength / 7); // 3
            }
            else {
                $length = $joblength;
            }
            /*if($shipnamee == 3) {
                $waittime = 1;



            }
            if($shipnamee == 1) {
                $waittime = 5;
                //$_SESSION['waittime'] = $waittime;



            }


            if($shipnamee == 2) {
                $waittime = 3;
                //$_SESSION['waittime'] = $waittime;



            }*/

            $sql3 = "UPDATE users SET duration = $length WHERE id = :id";
            $prepare3 = $db->prepare($sql3);
            $prepare3->execute([
                ':id' => $id
            ]);

        }

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






        //header("location: tasks.php?id=$id");






















        /*if (!isset($_SESSION['countdown'])) {
            $_SESSION['countdown'] = 5;
            $_SESSION['time_started'] = time();
        }

        $now = time();
        $timeSince = $now - $_SESSION['time_started'];
        $remainingSeconds = abs($_SESSION['countdown']);*/


        //if ($remainingSeconds < 1) {




            header("location: index.php?id=$id");
        //}










        exit;
    }

    if ($_POST['type'] === 'mine_jupiter') {



        session_start();

        $id = $_GET['id'];

        $shipid=$_POST['shipchoice'];

        // $waittime;


        $sql = "SELECT * FROM ships WHERE id = :shipid";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':shipid' => $shipid

        ]);

//$query = $db->query($sql);
        $shipnames = $prepare->fetchAll(PDO::FETCH_ASSOC);

        //var_dump($shipnames); die;

        foreach ($shipnames as $shipname) {
            $joblength = $shipname['joblengthjupiter'];


            //var_dump($joblength);
            $sql5 = " SELECT * FROM ownedships WHERE shipid = $shipid";

//$sql0 = "select * from ownedships WHERE ownedships.userid=$userid left join ships on ownedships.shipid = ships.id";
            $query = $db->query($sql5);
            $shipinfo = $query->fetch(PDO::FETCH_ASSOC);


            if($shipinfo['cargo'] == 1) {
                $length = round($joblength / 5); // 3
            }
            else {
                $length = $joblength;
            }
            //$length = round($joblength / 5); // 3


            /*if($shipnamee == 3) {
                $waittime = 2;



            }
            if($shipnamee == 1) {
                $waittime = 10;
                //$_SESSION['waittime'] = $waittime;



            }

            if($shipnamee == 2) {
                $waittime = 6;
                //$_SESSION['waittime'] = $waittime;



            }*/


            $sql3 = "UPDATE users SET duration = $length WHERE id = :id";
            $prepare3 = $db->prepare($sql3);
            $prepare3->execute([
                ':id' => $id
            ]);



        }

        $sql5 = " SELECT * FROM ownedships WHERE shipid = $shipid";

//$sql0 = "select * from ownedships WHERE ownedships.userid=$userid left join ships on ownedships.shipid = ships.id";
        $query = $db->query($sql5);
        $shipinfo = $query->fetch(PDO::FETCH_ASSOC);



        if($shipinfo['cargo'] == 1) {
            $_SESSION['commodities'] = $commodities = 4800;
        }
        else {
            $_SESSION['commodities'] = $commodities = 3200;
        }

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




        $_SESSION["end_time2"]=$end_time;






        //header("location: tasks.php?id=$id");








        /*$sql = "UPDATE users  SET commodities = commodities + 3200 WHERE id = :id";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':id' => $id
        ]);*/

        header("location: index.php?id=$id");
    }

    if ($_POST['type'] === 'mine_saturnus') {

        session_start();

        $id = $_GET['id'];

        $shipid=$_POST['shipchoice'];

        // $waittime;

        $sql = "SELECT * FROM ships WHERE id = :shipid";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':shipid' => $shipid

        ]);

//$query = $db->query($sql);
        $shipnames = $prepare->fetchAll(PDO::FETCH_ASSOC);

        //var_dump($shipnames); die;

        foreach ($shipnames as $shipname) {
            $joblength = $shipname['joblengthsaturnus'];


            //var_dump($joblength);
            $sql5 = " SELECT * FROM ownedships WHERE shipid = $shipid";

//$sql0 = "select * from ownedships WHERE ownedships.userid=$userid left join ships on ownedships.shipid = ships.id";
            $query = $db->query($sql5);
            $shipinfo = $query->fetch(PDO::FETCH_ASSOC);


            if($shipinfo['cargo'] == 1) {
                $length = round($joblength / 3); // 3
            }
            else {
                $length = $joblength;
            }


            /*if($shipnamee == 3) {
                $waittime = 3;



            }
            if($shipnamee == 1) {
                $waittime = 15;
                //$_SESSION['waittime'] = $waittime;



            }

            if($shipnamee == 2) {
                $waittime = 9;
                //$_SESSION['waittime'] = $waittime;



            }*/


            $sql3 = "UPDATE users SET duration = $length WHERE id = :id";
            $prepare3 = $db->prepare($sql3);
            $prepare3->execute([
                ':id' => $id
            ]);

        }
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




        $_SESSION["end_time3"]=$end_time;





        $sql = "UPDATE users SET commodities = commodities + 4800 WHERE id = :id";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':id' => $id
        ]);

        header("location: index.php?id=$id");
    }


/*if ($_POST['type'] === 'buy_hispenia') {
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
    $sql5 = " SELECT *  FROM ownedships 
   LEFT JOIN ships
     ON ships.id = ownedships.shipid
 WHERE ownedships.userid = $id";
//$sql0 = "select * from ownedships WHERE ownedships.userid=$userid left join ships on ownedships.shipid = ships.id";
    $query = $db->query($sql5);
    $shipinfos = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($shipinfos
             as $shipinfo) {
        $usership = htmlentities($shipinfo['shipname']);
//echo $shipname;
    }
    if($usership == 'Hispenia') {
        echo "<script>
        alert('Je hebt dit schip al');
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
}*/




if ($_POST['type'] === 'buy_ship') {

    session_start();

    $id = $_GET['userid'];

    $shipid = $_GET['shipid'];


    $sql = "SELECT * FROM users WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id

    ]);

//$query = $db->query($sql);
    $userid = $prepare->fetch(PDO::FETCH_ASSOC);








        //$shipname = 'Millenium';
        //$price = 100000;


        //$Name = $users['username'];


    $sql = "SELECT * FROM ships WHERE id = $shipid";
    $query = $db->query($sql);
    $shipinfos = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($shipinfos as $shipinfo) {
        $shipname = $shipinfo['shipname'];
        $shippic = $shipinfo['shippic'];
        //$shipid = $shipinfo['id'];
        $shipdescription = $shipinfo['description'];
        //$time = $shipinfo['joblength'];
        $shipprice = $shipinfo['price'];

        $sql5 = " SELECT *  FROM ownedships 
   LEFT JOIN ships
     ON ships.id = ownedships.shipid
 WHERE ownedships.userid = $id";
//$sql0 = "select * from ownedships WHERE ownedships.userid=$userid left join ships on ownedships.shipid = ships.id";
        $query = $db->query($sql5);
        $shipinfos = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($shipinfos
                 as $shipinfo) {
            $usership = htmlentities($shipinfo['shipid']);
//echo $shipname;




        }


        if ($userid['cash'] < $shipprice) {
            echo "<script>
        alert('Je hebt te weinig geld');
        window.location.href='trading.php?id=$id';
        </script>";
            exit;
        }




        //$shipinfo = $prepare3->fetch();

        //$shipid = $shipinfo['id'];


        $sql = "INSERT INTO ownedships ( shipid, userid)
        VALUES ( :shipid, :userid)";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            //':Name' => $name,
            ':shipid' => $shipid,
            ':userid' => $id
        ]);

        $sql3 = "UPDATE users SET cash = cash - $shipprice WHERE id = :id";
        $prepare3 = $db->prepare($sql3);
        $prepare3->execute([
            ':id' => $id
        ]);

    }


        header("location: index.php?id=$id");




}





if ($_POST['type'] === 'upgrade_engine') {


    $id = $_GET['id'];

    /*$sql5 = " SELECT *  FROM ownedships
   LEFT JOIN ships
     ON ships.id = ownedships.shipid
 WHERE ownedships.userid = :id";

    $prepare = $db->prepare($sql5);
    $prepare->execute([
        ':id' => $id

    ]);

    //$query = $db->query($sql);
    $shipinfos = $prepare->fetch(PDO::FETCH_ASSOC);*/

    $sql = "SELECT * FROM users WHERE name=:username";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':username' => $username
    ]);

    $users = $prepare->fetch();

    $users = $users['id'];

    $sql = "SELECT * FROM ownedships WHERE shipid = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id

    ]);

    //$query = $db->query($sql);
    $shipinfos = $prepare->fetch(PDO::FETCH_ASSOC);

//$sql0 = "select * from ownedships WHERE ownedships.userid=$userid left join ships on ownedships.shipid = ships.id";






        $sql = "UPDATE ownedships SET engine = 1 WHERE shipid=:shipid";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            //':engine' => '1',
            ':shipid' => $id,
            //':userid' => $id

        ]);

    $sql = "SELECT * FROM ownedships WHERE shipid = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id

    ]);

    //$query = $db->query($sql);
    $shipinfos = $prepare->fetch(PDO::FETCH_ASSOC);

    $userid = $shipinfos['userid'];



    header("location: index.php?id=$userid");
}







if ($_POST['type'] === 'upgrade_cargo') {

    $id = $_GET['id'];

    /*$sql5 = " SELECT *  FROM ownedships
   LEFT JOIN ships
     ON ships.id = ownedships.shipid
 WHERE ownedships.userid = :id";

    $prepare = $db->prepare($sql5);
    $prepare->execute([
        ':id' => $id

    ]);

    //$query = $db->query($sql);
    $shipinfos = $prepare->fetch(PDO::FETCH_ASSOC);*/

    $sql = "SELECT * FROM users WHERE name=:username";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':username' => $username
    ]);

    $users = $prepare->fetch();

    $users = $users['id'];

    $sql = "SELECT * FROM ownedships WHERE shipid = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id

    ]);

    //$query = $db->query($sql);
    $shipinfos = $prepare->fetch(PDO::FETCH_ASSOC);

//$sql0 = "select * from ownedships WHERE ownedships.userid=$userid left join ships on ownedships.shipid = ships.id";






    $sql = "UPDATE ownedships SET cargo = 1 WHERE shipid=:shipid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        //':engine' => '1',
        ':shipid' => $id,
        //':userid' => $id

    ]);

    $sql = "SELECT * FROM ownedships WHERE shipid = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id

    ]);

    //$query = $db->query($sql);
    $shipinfos = $prepare->fetch(PDO::FETCH_ASSOC);

    $userid = $shipinfos['userid'];



    header("location: index.php?id=$userid");
}






