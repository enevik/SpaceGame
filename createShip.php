<?php
require 'config.php';

$id = $_GET['id'];

require  'header.php'
?>



<form action="databaseController.php?id=<?=$id?>" method="post">
    <input type="hidden" name="type" value="create">
<!--<<<<<<< HEAD-->
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

    <!--Stashed changes-->
        <div class="form-group">
            <label for="length">Taakduur Mars:</label>

                <select name="timechoicemars">
                    <option value="1">1 min</option>
                    <option value="2">2 min</option>
                    <option value="3">3 min</option>
                    <option value="5">5 min</option>
                    <option value="10">10 min</option>
                    <option value="15">15 min</option>
                    <option value="20">20 min</option>


                </select>



        </div>

        <div class="form-group">
            <label for="length">Taakduur Jupiter:</label>

            <select name="timechoicejupiter">
                <option value="1">1 min</option>
                <option value="2">2 min</option>
                <option value="3">3 min</option>
                <option value="5">5 min</option>
                <option value="10">10 min</option>
                <option value="15">15 min</option>
                <option value="20">20 min</option>


            </select>



        </div>

        <div class="form-group">
            <label for="length">Taakduur Saturnus:</label>

            <select name="timechoicesaturnus">
                <option value="1">1 min</option>
                <option value="2">2 min</option>
                <option value="3">3 min</option>
                <option value="5">5 min</option>
                <option value="10">10 min</option>
                <option value="15">15 min</option>
                <option value="20">20 min</option>


            </select>



        </div>


        <input type="submit" value="Verzenden" class="blueButton createshipbutton">
    </div>
<!-- Updated upstream-->
</form>
