

<?php

include "../connection.php";
$postData = json_decode(file_get_contents('php://input'), true);

$user_id = $postData['user_id'];

$buildingId = $postData['building_id'];


$sqlQuery ="DELETE FROM fav WHERE user_id =$user_id AND 
building_id = $buildingId";

$queryResult = $connectNow->query($sqlQuery);

if($queryResult) {
      echo json_encode(array("success"=>true));
}
else{

    echo json_encode(array("success"=>false));
}

