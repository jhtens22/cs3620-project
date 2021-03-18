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

        function checkLogin($passedinusername, $passedinpassword){
          require_once('./utilities/connection.php');
          $user_id = 0;
          $sql = "SELECT user_id FROM user WHERE username = '" . $passedinusername . "' AND password = '" . hash("sha256", trim($passedinpassword)) . "'";
      
          $result = $conn->query($sql);
      
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $user_id = $row["user_id"];
            }
          }
          else {
              echo "0 results";
          }
          $conn->close();
          return $user_id;
        }

        function createUser($user){
          require_once('./utilities/connection.php');
      
          // prepare and bind
          $stmt = $conn->prepare("INSERT INTO `cs3620-project`.`user` (`username`,
          `password`,
          `firstName`,
          `lastName`) VALUES (?, ?, ?, ?)");
      
          $un = $user->getUsername();
          $pw = $user->getPassword();
          $fn = $user->getFirstName();
          $ln = $user->getLastName();
      
          $stmt->bind_param("ssss", $un, $pw, $fn, $ln);
          $stmt->execute();
      
          $stmt->close();
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
