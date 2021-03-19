<?php 
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    require_once('./show/show.php');
    require_once('./sessioncheck.php');

    $show = new show();
    $show->setShowName($_POST["showName"]);
    $show->setShowDescription($_POST["showDescription"]);
    $show->setShowRating($_POST["showRating"]);
    $show->setUserId($_SESSION["user_id"]);
    $show->createShow();

    //header("Location: dashboard.php");
?>