<?php
    class UserDAO {
        function getUser($user){
          session_start();
          require_once('./utilities/connection.php');
          
          $sql = "SELECT first_name, last_name, username, user_id FROM user WHERE user_id =" . $user->getUserId();
          $result = $conn->query($sql);
          echo $result;
            
          if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              $user->setFirstName($row["first_name"]);
              $user->setLastName($row["last_name"]);
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
            $result = $conn->query($sql);
        
            $conn->close();

            echo "user deleted";
          }
      }

      
?>