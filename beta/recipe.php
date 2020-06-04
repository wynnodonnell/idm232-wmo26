<?php
//Open a connection to DB file.
    require 'include/db.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/jpg" href="images/logo2.jpg"><!--Favicon that appears on the tab in the browser is selected here-->
        <title>OTPR | Recipe</title><!--The text that appears next to the favicon in the browser tab is here-->
        <link rel="stylesheet" href="./index_files/normalize.css"><!--Calls the normalization css file so everything is standard-->
        <link rel="stylesheet" href="index_files/styles.css"><!--Calls my css styles sheet to override the normalization file-->
    </head>

    <body>
        <!--This is the menu bar on desktop-->
        <header>
            <div class="topbar">
                <a href="index.php">
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
                </div>
            </div>
    </header>

        <!--This is the main content for the page-->
        <div class="topbar3"></div>
        <div class="intro">
    <?php
        // Get the ID number passed to this page by the index
        $id = $_GET['id'];
        
        //Queary for that ID number
        $table = 'recipes';
        $query = "SELECT * FROM {$table} WHERE id={$id}";
        $result = mysqli_query($connection, $query);

        //extract record information
        if (!result ) {
            die ('Database Queary Failed');
        } else {
            $row = mysqli_fetch_assoc($result);
        }
    ?>

            <p class="top">
                <?php echo $row['title']; ?>
            </p>
        </div>
        <div class="top2">
            <p><?php echo $row['subtitle']; ?></p>
        </div>
        <div>
            <img class="image" src="images/<?php echo $row['main_img']; ?>" alt="The Main Recipe image for this recipe.">
        </div>
        <div class="intro">
            <button class="sub2"><?php echo $row['cook_time']; ?></button><button class="sub2"><?php echo $row['servings']; ?> Servings</button><button class="sub2"><?php echo $row['cal_per_serving']; ?> Cal</button>
            
        </div>
    <div class="intro">
        <div class="main"><p>
        <?php echo $row['description']; ?></p>
        </div>
    </div>
        <div class=intro>
        <div class="main">
            <p>Ingredients:</p>
            <ul>
            <?php 
            $ingredStr = $row['all_ingredients'];

            //Convert String into an array
            $ingredArray = explode("*", $ingredStr);

            for($lp = 0; $lp < count($ingredArray); $lp++) {
                $oneIngred = $ingredArray[$lp];
                echo "<li>" . $oneIngred . "</li>";
            }
            ?>
            </ul>
        </div>



        <div class="main">
            <img class="image" src="images/<?php echo $row['ingredients_img']; ?>" alt="ingredient image.">
        </div>
        <?php 
            $stepImgs = $row['step_imgs'];
            $allSteps = $row['all_steps'];
            $allHeaders = $row['all_steps'];
    
            
            // Convert string into an array
        // all step array has twice as much lines as all images array
            $stepImgsArray = explode("*", $stepImgs);
    
            $allStepsArray = explode("*", $allSteps);
    
            $allHeadersArray = explode("*", $allHeaders);
            
            
            for($i = 0; $i < count($stepImgsArray); $i++){
                $oneImg = $stepImgsArray[$i];
                $oneStep = $allStepsArray[$i*2+1];
                $oneHeader = $allHeadersArray[$i*2];
               // echo $oneImg . "<br>";
                echo "<div class=\"main\">";
                echo "<img src=\"images\stepimage/" . $oneImg . "\" class=\"image\">";
                
                echo "<div>";
                
                echo "<p>" . $oneHeader . "</p>";
                echo "<p>" . $oneStep . "</p>";
                
                echo "</div>";
                
                echo "</div>";
                
    }


    ?>



        </div>
        <footer>

             <p>
                <a href="help.html">Help</a>
             </p>
             <p>
                   Off The Plate Recipes
             </p>
        </footer>
    </body>
</html>