<?php
require 'header.php';
?>

    <div class="container">
        <div class="maingrid">
            <div class="personalinformation">
                <h2>Persoonlijke informatie</h2>
                <div>
                    <p>Name: <?php echo $userid['name'] ?></p>
                    <p>schepen</p>
                    <p>Cash: <?php echo $userid['cash'] ?></p>
                </div>
            </div>
            <div class="gif">
                <img src="Images/saturnus.gif" alt="hier is een gif van saturnus">
            </div>
            <div class="tasks">
                <h2>Tasks</h2>
                <div>
                    <p>mars</p>
                    <p>jupiter</p>
                </div>
            </div>
        </div>
    </div>
<?php
require 'footer.php';
?>