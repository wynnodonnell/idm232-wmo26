<?php
//Open a connection to DB file.
    require 'include/db.php';

    $filter = $_GET['filter'];

    if (isset($_POST['submit'])) {
        $table = 'recipes';
        $search = $_POST['search'];
        $query = "SELECT * FROM {$table} WHERE title LIKE '%{.$search.}%' OR subtitle LIKE '%{.$search.}%'";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die ('Search query failed');
        } 
    }
    else if (isset($filter)){
        print_r('weee');
        $query = "SELECT * FROM {$table} WHERE proteine LIKE '%{$filter}%'";
        $result = mysqli_query($connection, $query);
    } else {
      //pull information from database table
      $table = 'recipes';
      $query = "SELECT * FROM {$table}";
      $result = mysqli_query($connection, $query);
  
      //check for errors
      if (!$result ) {
          die ('Database query failed');
      }     
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/jpg" href="images/logo2.jpg"><!--Favicon that appears on the tab in the browser is selected here-->
        <title>OTPR | Main</title><!--The text that appears next to the favicon in the browser tab is here-->
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
            <form class="formsearch" action="index.php" method="POST">
            <input type="submit" name="submit" value="Submit" class="sub">
                <input type="text" placeholder="Search Recipes">

            </form>
                <select id="filters" onchange="location = this.value;">
                    <option>Filters</option>
                    <option>Vegetarian</option>
                    <option value="index.php?filter=Chicken">Chicken</option>
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


        <?php 
        while($row = mysqli_fetch_assoc($result)) {


            ?>
            <div class="main3">


            <?php 
                $id = $row['id'];

                echo "<a href=\"recipe.php?id={$id}\">";
            ?>

                    <img class="indeximage" src="images/<?php echo $row['main_img'] ?>" alt="The Main Recipe image for this recipe.">
                </a>
                <p  class="with">
            <?php 
                $id = $row['id'];
                
                echo "<a href=\"recipe.php?id={$id}\">";
            ?>
                        <?php echo $row['title'] ?></a>
                    <div>
                    <p class="subtitle"><?php echo $row['subtitle'] ?></p>
                    </div>
                </p>

            </div>
            <?php 
        } //end php while loop

        //RELEASE THE DATA
        mysqli_free_result($result);

        //Unrelease the data :(
        mysqli_close($connection);
    ?>
           
        <footer>
            <p>
                <a href="index.php#top">Return to Top</a>
             </p>

             <p>
                <a href="help.html">Help</a>
             </p>
             <p>
                   Off The Plate Recipes&#8482
             </p>
        </footer>
    </body>
</html>