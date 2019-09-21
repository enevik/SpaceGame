<?php

require 'config.php';




$sql = "SELECT * FROM `users`";
$query = $db->query($sql);
$users = $query->fetchAll(PDO::FETCH_ASSOC);




if($_POST['type'] == 'create') {

    session_start();

    //$id = $_GET['id'];
    $id = $_SESSION['id'];

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

    header("location: index.php");


}





if ($_POST['type'] == 'business') {
    session_start();

    if($_SESSION['busyjob'] > 0) {

        //$id = $_GET['id'];
        $id = $_SESSION['id'];

        echo "<script>
        //alert('Je hebt te weinig geld');
        alert('Job ongoing already');
        window.location.href='index.php?id=$id';
        </script>";
        exit;

    }
    else {


        //$id = $_GET['id'];
        $id = $_SESSION['id'];

        $sql3 = "UPDATE users SET job = 1440 WHERE id = :id";
        $prepare3 = $db->prepare($sql3);
        $prepare3->execute([
            ':id' => $id
        ]);

        $duration = "";
        //$id = 1;

        $sql = "SELECT * FROM `users` WHERE id=$id";
        $query = $db->query($sql);


        while ($users = $query->fetch(PDO::FETCH_ASSOC)) {
            $duration = $users["job"];
        }




        $_SESSION["start_time"]=date("Y-m-d H:i:s");

        $starttime = date("Y-m-d H:i:s");



        $end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$duration.'minutes', strtotime($starttime)));



        $sql6 = "UPDATE users SET job = :duration WHERE id = :id";
        //var_dump($sql6);
        $prepare4 = $db->prepare($sql6);
        $prepare4->execute([
            ':duration' => $end_time,

            ':id' => $id
        ]);






        echo "<script>
        //alert('Je hebt te weinig geld');
        alert('Job started');
        window.location.href='index.php';
        </script>";
        exit;


    }

}





    if ($_POST['type'] == 'material') {
        session_start();

        //$id = $_GET['id'];
        $id = $_SESSION['id'];
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

        header("location: index.php");


    }



    if ($_POST['type'] == 'createuser') {



        $username = $_POST['username'];
        $cash = 5000;

        $sql = "SELECT * FROM users WHERE name='$username' LIMIT 1";
        $query = $db->query($sql);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user['name'] === $username) {
            echo "<script>
        alert('Username already exists');
        window.location.href='create_login.php';
        </script>";
            exit;
        }
        else {


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

            //var_dump($userinfo);


            $sql = "INSERT INTO ownedships ( shipid, userid)
        VALUES ( :shipid, :userid)";
            $prepare = $db->prepare($sql);
            $prepare->execute([
                //':Name' => $name,
                ':shipid' => 7,
                ':userid' => $userid
            ]);

            session_start();


            $_SESSION['id'] = $userid;


            header("location: index.php");

            exit;
        }
    }

    if ($_POST['type'] == 'loginuser') {


            session_destroy();
            unset($_SESSION['id']);



        session_start();


        $username = $_POST['username'];

        $sql = "SELECT * FROM users WHERE name=:username";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':username' => $username
        ]);

        $users = $prepare->fetch();

        $users = $users['id'];
        $_SESSION['id'] = $users;


        header( "location: index.php");
        exit;
    }

    if ($_POST['type'] === 'mine_mars') {
        session_start();

        //$id = $_GET['id'];
        $id = $_SESSION['id'];

        $shipid=$_POST['shipchoice'];

        $sql = "SELECT * FROM ships WHERE id = :shipid";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':shipid' => $shipid

        ]);

//$query = $db->query($sql);
        $shipnames = $prepare->fetchAll(PDO::FETCH_ASSOC);


        foreach ($shipnames as $shipname) {
            $joblength = $shipname['joblengthmars'];

            $rightshipname = $shipname['shipname'];
            $_SESSION["shipname"] = $rightshipname;

            $sql5 = " SELECT * FROM ownedships WHERE shipid = $shipid";

//$sql0 = "select * from ownedships WHERE ownedships.userid=$userid left join ships on ownedships.shipid = ships.id";
            $query = $db->query($sql5);
            $shipinfo = $query->fetch(PDO::FETCH_ASSOC);




            if($shipinfo['engine'] == 1) {
                $length = round($joblength / 7 *2); // 3
            }
            else {
                $length = $joblength;
            }


            $sql3 = "UPDATE users SET duration = $length WHERE id = :id";
            $prepare3 = $db->prepare($sql3);
            $prepare3->execute([
                ':id' => $id
            ]);



        }

        $sql5 = " SELECT * FROM ownedships WHERE shipid = $shipid";

        $query = $db->query($sql5);
        $shipinfo = $query->fetch(PDO::FETCH_ASSOC);



        if($shipinfo['cargo'] == 1) {
            $_SESSION['commoditiesmars'] = $commodities = 1800;
        }
        else {
            $_SESSION['commoditiesmars'] = $commodities = 1200;
        }

        $duration="";
        //$id = 1;

        $sql = "SELECT * FROM `users` WHERE id=$id";
        $query = $db->query($sql);


        while($users = $query->fetch(PDO::FETCH_ASSOC))
        {
            $duration=$users["duration"];
        }

        //$_SESSION["duration"]=$duration;

        $_SESSION["start_time"]=date("Y-m-d H:i:s");

        $starttime = date("Y-m-d H:i:s");

        //$end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));

        $end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$duration.'minutes', strtotime($starttime)));



        $sql6 = "UPDATE ownedships SET endtime = :endtime WHERE shipid = :shipid AND userid = :userid";
        //var_dump($sql6);
        $prepare4 = $db->prepare($sql6);
        $prepare4->execute([
            ':endtime' => $end_time,
            ':shipid' => $shipid,
            ':userid' => $id
        ]);


        $_SESSION["end_time2"]=$end_time;



        header("location: index.php");
    }

    if ($_POST['type'] === 'mine_jupiter') {



        session_start();

        //$id = $_GET['id'];
        $id = $_SESSION['id'];


        $shipid=$_POST['shipchoice'];


        $sql = "SELECT * FROM ships WHERE id = :shipid";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':shipid' => $shipid

        ]);

        $shipnames = $prepare->fetchAll(PDO::FETCH_ASSOC);



        foreach ($shipnames as $shipname) {
            $joblength = $shipname['joblengthjupiter'];

            $rightshipname = $shipname['shipname'];
            $_SESSION["shipname"] = $rightshipname;


            //var_dump($joblength);
            $sql5 = " SELECT * FROM ownedships WHERE shipid = $shipid";

            $query = $db->query($sql5);
            $shipinfo = $query->fetch(PDO::FETCH_ASSOC);




            if($shipinfo['engine'] == 1) {
                $length = round($joblength / 5 * 2); // 3
            }
            else {
                $length = $joblength;
            }

            $sql3 = "UPDATE users SET duration = $length WHERE id = :id";
            $prepare3 = $db->prepare($sql3);
            $prepare3->execute([
                ':id' => $id
            ]);



        }

        $sql5 = " SELECT * FROM ownedships WHERE shipid = $shipid";

        $query = $db->query($sql5);
        $shipinfo = $query->fetch(PDO::FETCH_ASSOC);



        if($shipinfo['cargo'] == 1) {
            $_SESSION['commoditiesjupiter'] = $commodities = 4800;
        }
        else {
            $_SESSION['commoditiesjupiter'] = $commodities = 3200;
        }

        $duration="";
        //$id = 1;

        $sql = "SELECT * FROM `users` WHERE id=$id";
        $query = $db->query($sql);


        while($users = $query->fetch(PDO::FETCH_ASSOC))
        {
            $duration=$users["duration"];
        }

        //$_SESSION["duration"]=$duration;

        $_SESSION["start_time"]=date("Y-m-d H:i:s");

        $starttime = date("Y-m-d H:i:s");

        //$end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));

        $end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$duration.'minutes', strtotime($starttime)));



        $sql6 = "UPDATE ownedships SET endtime2 = :endtime WHERE shipid = :shipid AND userid = :userid";
        //var_dump($sql6);
        $prepare4 = $db->prepare($sql6);
        $prepare4->execute([
            ':endtime' => $end_time,
            ':shipid' => $shipid,
            ':userid' => $id
        ]);

        $_SESSION["end_time2"]=$end_time;


        header("location: index.php");
    }

    if ($_POST['type'] === 'mine_saturnus') {
        session_start();

        //$id = $_GET['id'];
        $id = $_SESSION['id'];

        $shipid=$_POST['shipchoice'];


        $sql = "SELECT * FROM ships WHERE id = :shipid";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':shipid' => $shipid

        ]);

        $shipnames = $prepare->fetchAll(PDO::FETCH_ASSOC);



        foreach ($shipnames as $shipname) {
            $joblength = $shipname['joblengthsaturnus'];

            $rightshipname = $shipname['shipname'];
            $_SESSION["shipname"] = $rightshipname;


            //var_dump($joblength);
            $sql5 = " SELECT * FROM ownedships WHERE shipid = $shipid";

            $query = $db->query($sql5);
            $shipinfo = $query->fetch(PDO::FETCH_ASSOC);




            if($shipinfo['engine'] == 1) {
                $length = round($joblength / 3 *2); // 3
            }
            else {
                $length = $joblength;
            }



            $sql3 = "UPDATE users SET duration = $length WHERE id = :id";
            $prepare3 = $db->prepare($sql3);
            $prepare3->execute([
                ':id' => $id
            ]);



        }

        $sql5 = " SELECT * FROM ownedships WHERE shipid = $shipid";

        $query = $db->query($sql5);
        $shipinfo = $query->fetch(PDO::FETCH_ASSOC);



        if($shipinfo['cargo'] == 1) {
            $_SESSION['commoditiessaturnus'] = $commodities = 7800;
        }
        else {
            $_SESSION['commoditiessaturnus'] = $commodities = 5200;
        }

        $duration="";
        //$id = 1;

        $sql = "SELECT * FROM `users` WHERE id=$id";
        $query = $db->query($sql);


        while($users = $query->fetch(PDO::FETCH_ASSOC))
        {
            $duration=$users["duration"];
        }

        //$_SESSION["duration"]=$duration;

        //$_SESSION["start_time"]=date("Y-m-d H:i:s");

        $starttime = date("Y-m-d H:i:s");

        //$end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));

        $end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$duration.'minutes', strtotime($starttime)));



        $sql6 = "UPDATE ownedships SET endtime3 = :endtime WHERE shipid = :shipid AND userid = :userid";
        //var_dump($sql6);
        $prepare4 = $db->prepare($sql6);
        $prepare4->execute([
            ':endtime' => $end_time,
            ':shipid' => $shipid,
            ':userid' => $id
        ]);


        $_SESSION["end_time2"]=$end_time;




        header("location: index.php");
    }







if ($_POST['type'] === 'buy_ship') {

    session_start();

    //$id = $_GET['userid'];
    $id = $_SESSION['id'];

    $shipid = $_GET['shipid'];


    $sql = "SELECT * FROM users WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id

    ]);

    $userid = $prepare->fetch(PDO::FETCH_ASSOC);




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
        window.location.href='trading.php';
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


        header("location: index.php");




}





if ($_POST['type'] === 'upgrade_engine') {
    session_start();


    $id = $_GET['id'];
    $userid = $_SESSION['id'];





    $sql = "SELECT * FROM ownedships WHERE shipid = :id AND userid=:userid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id,
        ':userid' => $userid

    ]);


    $shipinfos = $prepare->fetch(PDO::FETCH_ASSOC);

    if($shipinfos['engine'] == 1) {

        echo "<script>
        //alert('Je hebt te weinig geld');
        alert('Engine already upgraded');
        window.location.href='index.php';
        </script>";
        exit;
    }
    else {


        $sql = "UPDATE ownedships SET engine = 1 WHERE shipid=:shipid AND userid=:userid";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            //':engine' => '1',
            ':shipid' => $id,
            ':userid' => $userid

        ]);



        $sql = "UPDATE users SET cash = cash - 1000 WHERE id = :id";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':id' => $userid

        ]);

        $alert = "Engine upgraded, your ship will now mine faster!";

        echo "<script>
        //alert('Je hebt te weinig geld');
        alert('$alert');
        window.location.href='index.php';
        </script>";
        exit;
    }




    //header("location: index.php?id=$userid");
}







if ($_POST['type'] === 'upgrade_cargo') {
    session_start();


    $id = $_GET['id'];
    $userid = $_SESSION['id'];




    $sql = "SELECT * FROM ownedships WHERE shipid = :id AND userid=:userid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id,
        ':userid' => $userid

    ]);


    $shipinfos = $prepare->fetch(PDO::FETCH_ASSOC);

    if($shipinfos['cargo'] == 1) {

        echo "<script>
        //alert('Je hebt te weinig geld');
        alert('Cargo hold already upgraded');
        window.location.href='index.php';
        </script>";
        exit;
    }
    else {


        $sql = "UPDATE ownedships SET cargo = 1 WHERE shipid=:shipid AND userid=:userid";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            //':engine' => '1',
            ':shipid' => $id,
            ':userid' => $userid

        ]);


        $sql = "UPDATE users SET cash = cash - 1000 WHERE id = :id";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':id' => $userid

        ]);


        $alert = "Cargo hold upgraded, your ship can now hold more commodities!";

        echo "<script>
        //alert('Je hebt te weinig geld');
        alert('$alert');
        window.location.href='index.php';
        </script>";
        exit;
    }



    //header("location: index.php?id=$userid");
}






