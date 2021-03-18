<?php
class ShowDAO {
    function getShow($show){
        require_once('./utilities/connection.php');
        require_once('./show/show.php');

        $sql = "SELECT showName, showDescription, showRating, show_id FROM show WHERE show_id =" . $show->getShowId();
          $result = $conn->query($sql);
            
          if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              $show->setShowName($row["showName"]);
              $show->setShowDescription($row["showDescription"]);
              $show->setShowRating($row["showRating"]);
          }
          } else {
              echo "0 results";
          }
          $conn->close();
    }

    function getAllShows(){
        require_once('./utilities/connection.php');
        require_once('./show/show.php');

        $sql = "SELECT showName, showDescription, showRating, show_id FROM `show`";
        $result = $conn->query($sql);

        $shows;
        $index = 0;
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $show->setShowName($row["showName"]);
                $show->setShowDescription($row["showDescription"]);
                $show->setShowRating($row["showRating"]);
                $shows[$index] = $show;
                $index++;
            }
        } else {
            echo "0 results";
        }
        $conn->close();

        return $shows;
    }

    function createShow($show){
        require_once('./utilities/connection.php');
    
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO `cs3620-project`.`show` (`showName`,
        `showDescription`,
        `showRating`) VALUES (?, ?, ?)");
    
        $sn = $show->getShowName();
        $sd = $show->getShowDescription();
        $sr = $show->getShowRating();
    
        $stmt->bind_param("sss", $sn, $sd, $sr);
        $stmt->execute();
    
        $stmt->close();
        $conn->close();
      }
}
?>