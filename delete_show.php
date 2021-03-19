<?php 
    require_once('./header.php');
?>

<?php
    echo $_GET["show_id"];

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('./sessioncheck.php');
    require_once('./show/show.php');

    $show = new show();
    $shows = $show->deleteShow($_SESSION["user_id"], $_GET["show_id"]);

    header("Location: dashboard.php?del=true");
?>

<?php 
    require_once('./footer.php');
?>