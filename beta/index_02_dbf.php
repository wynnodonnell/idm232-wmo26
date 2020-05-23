<?php
//Open a connection to DB file.
    require 'include/db.php';

    //pull information from database table
    $table = 'recipes';
    $query = "SELECT * FROM {$table}";
    $result = mysqli_query($connection, $query);

    //check for errors
    if (!$result ) {
        die ('Database query failed');
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/jpg" href="images/logo2.jpg"><!--Favicon that appears on the tab in the browser is selected here-->
        <title>OTPR | Main</title><!--The text that appears next to the favicon in the browser tab is here-->
        <link rel="stylesheet" href="./index_files/normalize.css"><!--Calls the normalization css file so everything is standard-->
        <link rel="stylesheet" href="index_files/styles.css"><!--Calls my css styles sheet to override the normalization file-->
    </head>

    <body>

    <?php 
        while($row = mysqli_fetch_assoc($result)) {
            //var_dump($row);
            $title = $row['title'];
            $subtitle = $row['subtitle'];
            echo $title;
            echo $subtitle;
            echo "<hr>";
        }

        //RELEASE THE DATA
        mysqli_free_result($result);

        //Unrelease the data :(
        mysqli_close($connection);
    ?>

        <!--This is the menu bar on desktop-->
        <header>
            <div class="topbar">
                <a href="alpha.html">
                    <img class="logo" src="images/logo.jpg" alt="Off the Plate Recipes Logo">
                </a>
                <div class="topbar2">
                <input type="text" placeholder="Search Recipes">
                <a href="search.html"> <button class="sub" type="submit">Search</button></a>
                <select id="filters">
                    <option>Filters</option>
                    <option>Vegetarian</option>
                    <option>Chicken</option>
                    <option>Beef</option>
                    <option>Pork</option>
                    <option>Vegan</option>
                </select>
                </div>
            </div>
        </header>
        <!--This is the main content for the page-->
        <div class="topbar3"></div>
        <div class="intro">
            <p class="top">
                Welcome to Off the Plate Recipes, simply select a recipe to begin.
            </p>
        </div>
        <div class="intro">

            <div class="main3">
                <a href="recipe.html">
                    <img class="indeximage" src="images/main.jpg" alt="The Main Recipe image for this recipe.">
                </a>
                <p  class="with">
                    <a href="recipe.html">Ancho-Orange Chicken with Kale and Rice.</a>
                </p>

            </div>

            <div class="main3">
                <a href="recipe.html">
                    <img class="indeximage" src="images/main.jpg" alt="The Main Recipe image for this recipe.">
                </a>
                <p  class="with">
                    <a href="recipe.html">Ancho-Orange Chicken with Kale and Rice.</a>
                </p>

            </div>

            <div class="main3">
                <a href="recipe.html">
                    <img class="indeximage" src="images/main.jpg" alt="The Main Recipe image for this recipe.">
                </a>
                <p  class="with">
                    <a href="recipe.html">Ancho-Orange Chicken with Kale and Rice.</a>
                </p>

            </div>

            <div class="main3">
                <a href="recipe.html">
                    <img class="indeximage" src="images/main.jpg" alt="The Main Recipe image for this recipe.">
                </a>
                <p  class="with">
                    <a href="recipe.html">Ancho-Orange Chicken with Kale and Rice.</a>
                </p>

            </div>

            <div class="main3">
                <a href="recipe.html">
                    <img class="indeximage" src="images/main.jpg" alt="The Main Recipe image for this recipe.">
                </a>
                <p  class="with">
                    <a href="recipe.html">Ancho-Orange Chicken with Kale and Rice.</a>
                </p>

            </div>

            <div class="main3">
                <a href="recipe.html">
                    <img class="indeximage" src="images/main.jpg" alt="The Main Recipe image for this recipe.">
                </a>
                <p  class="with">
                    <a href="recipe.html">Ancho-Orange Chicken with Kale and Rice.</a>
                </p>

            </div>

            <div class="main3">
                <a href="recipe.html">
                    <img class="indeximage" src="images/main.jpg" alt="The Main Recipe image for this recipe.">
                </a>
                <p  class="with">
                    <a href="recipe.html">Ancho-Orange Chicken with Kale and Rice.</a>
                </p>

            </div>

            <div class="main3">
                <a href="recipe.html">
                    <img class="indeximage" src="images/main.jpg" alt="The Main Recipe image for this recipe.">
                </a>
                <p  class="with">
                    <a href="recipe.html">Ancho-Orange Chicken with Kale and Rice.</a>
                </p>

            </div>


        <footer>
            <p>
                <a href="alpha.html#top">Return to Top</a>
             </p>
            <p>
                   Off The Plate Recipes
             </p>
             <p>
                <a href="help.html">Help</a>
             </p>
        </footer>
    </body>
</html>