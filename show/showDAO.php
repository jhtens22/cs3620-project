<?php
class ShowDAO {
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
                $show = new show();

                $show->setShowId($row["show_id"]);
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

    function getShowsByUserId($user_id){
        require_once('./utilities/connection.php');
        require_once('./show/show.php');

        $sql = "SELECT showName, showDescription, showRating, show_id FROM `show` WHERE `user_id`=" . $user_id;
        $result = $conn->query($sql);

        $shows;
        $index = 0;
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $show = new show();

                $show->setShowId($row["show_id"]);
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