<?php 
    require_once('./header.php');
?>

<?php 
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