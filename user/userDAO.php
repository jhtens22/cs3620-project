<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
    class UserDAO {
        function getUser($user){

          require_once('./utilities/connection.php');
          
          $sql = "SELECT firstName, lastName, username, user_id FROM user WHERE user_id =" . $user->getUserId();
          $result = $conn->query($sql);
            
          if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              $user->setFirstName($row["firstName"]);
              $user->setLastName($row["lastName"]);
              $user->setUsername($row["username"]);
          }
          } else {
              echo "0 results";
          }
          $conn->close();
        }

        function createUser($user){
            session_start();
            require_once('./utilities/connection.php');
            
            $sql = "INSERT INTO user
            (
            `username`,
            `password`,
            `firstName`,
            `lastName`)
            VALUES
            ('" . $user->getUsername() . "',
            '" . $user->getPassword() . "',
            '" . $user->getFirstName() . "',
            '" . $user->getLastName() . "'
            );";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
            $conn->close();
          }

          function deleteUser($un){
            session_start();
            require_once('./utilities/connection.php');
            
            $sql = "DELETE FROM user WHERE username = '" . $un . "';";
            if ($conn->query($sql) === TRUE) {
              echo "user deleted";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
            $conn->close();
          }
      }
