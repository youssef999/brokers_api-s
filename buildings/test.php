//TEST

<?php

include "../connection.php";

$postData = json_decode(file_get_contents('php://input'), true);
//buildings
$name =$postData['name'];
$lat= $postData['lat'];
$lng= $postData['lng'];
$locationName= $postData['location_name'];
$image= $postData['image'];
$price= $postData['price'];
$userId= $postData['user_id'];
$RoleId= $postData['role_id'];
$type= $postData['type'];

$sqlQuery ="INSERT INTO buildings SET name='$name',
lat='$lat',
lng='$lng'
,location_name='$locationName',image='$image',price='$price'
,user_id='$userId',RoleId='$RoleId',type='$type'

";
//$sqlQuery = "SELECT * FROM buildings";

$queryResult = $connectNow->query($sqlQuery);

if($queryResult) {
      echo json_encode(array("success"=>true));
}

else{
    echo json_encode(array("success" => false, "error" => $connectNow->error));
}

