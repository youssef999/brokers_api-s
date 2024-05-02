<?php

include "../connection.php";
$postData = json_decode(file_get_contents('php://input'), true);

$user_id = $postData['user_id'];

$buildingId = $postData['building_id'];


$sqlQuery ="INSERT INTO fav SET  building_id='$buildingId',
 user_id='$user_id' ";

$queryResult = $connectNow->query($sqlQuery);

if($queryResult) {
      echo json_encode(array("success"=>true));
}
else{

    echo json_encode(array("success"=>false));
}

