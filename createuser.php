<?php
/**
 * Created by PhpStorm.
 * User: Dani Kools
 * Date: 3-9-2019
 * Time: 13:16
 */

require 'header.php';
?>

<div class="container">
    <div class="content">
        <form action="databaseController.php" method="post">
            <input type="hidden" name="type" value="createuser">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>

            <input type="submit" value="Create user">

        </form>
    </div>
</div>



<?php
require 'footer.php';
