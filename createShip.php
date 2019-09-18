<?php
require 'config.php';

require  'header.php'
?>



<form action="databaseController.php" method="post">
    <input type="hidden" name="type" value="create">
    <div class="container">
        <div class="createshipflex">
            <div class="form-group">
                    <label for="shipname">Shipname:</label>
                    <input type="text" name="shipname" id="shipname">
            </div>

            <div class="form-group">
                <label for="price">price:</label>
                <input type="text" name="price" id="price">
            </div>

            <div class="form-group">
                <label for="description">description:</label>
                <input type="text" name="description" id="description">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="text" name="image" id="image">
            </div>

            <div class="form-group">
                <label for="length">Taakduur:</label>

                <select name="timechoice">
                    <option value="5">5 min</option>
                    <option value="10">10 min</option>
                    <option value="15">15 min</option>
                    <option value="20">20 min</option>
                    <option value="25">25 min</option>
                </select>
            </div>
            <input type="submit" value="Verzenden" class="blueButton createshipbutton">
        </div>
</form>
