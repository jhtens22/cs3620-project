<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once('./header.php');
?>

<form method="POST" action="show_insert.php">
    Show Name: <input type="text" name="showName" /> <br />
    Description: <input type="text" name="showDescription" /> <br />
    Rating: <input type="text" name="showRating" /> <br/>
    <input type="submit" value="Add Show" />
</form>

<a href="logout.php">Logout</a>

<?php 
    require_once('./footer.php');
?>