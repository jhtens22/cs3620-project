<?php 
    require_once('./header.php');
?>

<main role="main" class="container">
    <h1 class="mt-5">Jaythan's Favorite Shows</h1>
    
    <a href="add_show.php">Create Show</a>

    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('./show/show.php');

    $show = new show();
    $shows = $show->getAllShows();  

    $arrlength = count($shows);

    for($x = 0; $x < $arrlength; $x++) {            
        echo '<div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">' . $shows[$x]->getShowName() . '</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rating: ' . $shows[$x]->getShowRating() . '</h6>
                    <p class="card-text">' . $shows[$x]->getShowDescription() . '</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
                </div>
                <br />';
    }
    ?>

    <a href="logout.php">Logout</a>
</main>


<?php 
    require_once('./footer.php');
?>