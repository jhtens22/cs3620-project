<?php
require_once('./show/showDAO.php');

class Show implements \JsonSerializable {
    private $show_id;
    private $showName;
    private $showDescription;
    private $showRating;

    function __construct() {
    }
    function getUsername(){
        return $this->username;
    }
    function setUsername($username){
        $this->username = $username;
    }
    function getUserId(){
        return $this->user_id;
    }
    function setUserId($user_id){
        $this->user_id = $user_id;
    }
    function getFirstName() {
        return $this->firstName;
    }
    function setFirstName($firstName){
        $this->firstName = $firstName;
    }
    function getLastName() {
        return $this->lastName;
    }
    function setLastName($lastName){
        $this->lastName = $lastName;
    }
    function setPassword($password){
        $this->password = hash("sha256", $password);
    }
    function getPassword(){
         return $this->password;
    }

    function getUser($user_id){
        $this->user_id = $user_id;
        $userDAO = new userDAO();
        $userDAO->getUser($this);
        return $this;
    }

    function createUser(){
        $userDAO = new userDAO();
        $userDAO->createUser($this);
    }
    function deleteUser($username){
        $userDAO = new userDAO();
        $userDAO->deleteUser($username);
    }

    function checkLogin($username, $password){
        $userDAO = new userDAO();
        return $userDAO->checkLogin($username, $password);
    }

    function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
}
?>