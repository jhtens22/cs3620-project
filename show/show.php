<?php
require_once('./show/showDAO.php');

class Show implements \JsonSerializable {
    private $show_id;
    private $showName;
    private $showDescription;
    private $showRating;
    private $user_id;

    function __construct() {
    }
    function getUserId(){
        return $this->user_id;
    }
    function setUserId($user_id){
        $this->user_id = $user_id;
    }
    function getShowName(){
        return $this->showName;
    }
    function setShowName($showName){
        $this->showName = $showName;
    }
    function getShowId(){
        return $this->show_id;
    }
    function setShowId($show_id){
        $this->show_id = $show_id;
    }
    function getShowDescription() {
        return $this->showDescription;
    }
    function setShowDescription($showDescription){
        $this->showDescription = $showDescription;
    }
    function getShowRating() {
        return $this->showRating;
    }
    function setShowRating($showRating){
        $this->showRating = $showRating;
    }

    function getMyShows($user_id){
        $showDAO = new showDAO();
        return $showDAO->getShowsByUserId($user_id);
    }

    function createShow(){
        $showDAO = new showDAO();
        $showDAO->createShow($this);
    }

    function deleteShow($user_id, $show_id){
        $showDAO = new showDAO();
        return $showDAO->deleteShow($user_id, $show_id);
    }

    function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
}
?>