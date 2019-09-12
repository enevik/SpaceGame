<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 10-9-2019
 * Time: 13:00
 */

require 'header.php';

$sql = "SELECT * from users";
$query = $db->query($sql);
$users = $query->fetchAll(PDO::FETCH_ASSOC);


?>
<div class="container">
    <div class="grid-container">
        <div class="grid-item">
            <ol>
                <h2>Name</h2>
                <?php
                foreach ($users as $user) {
                    $userfilter = htmlentities($user['name']);

                    echo "<li>$userfilter</li>";
                }
                ?>
            </ol>
        </div>
        <div class="grid-item">
            <ol>
                <h2>Money</h2>
                <?php
                foreach ($users as $user) {
                    $userfilter = htmlentities($user['cash']);

                    echo "<li>$userfilter</li>";
                }
                ?>
            </ol>
        </div>
    </div>
</div>
<?php
require 'footer.php';
