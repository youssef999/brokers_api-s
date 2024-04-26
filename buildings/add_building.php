

<?php

include'../connection.php';

$postData = json_decode(file_get_contents('php://input'), true);


$name = $postData['name'];

$locationName = $postData['location_name'];

$phone= $postData['phone'];

$whats = $postData['whats'];

$image = $postData['image'];

$price = $postData['price'];

$lat = $postData['lat'];

$lng = $postData['lng'];

$sqlQuery =" INSERT INTO buildings SET name='$name' , location_name='$locationName',

 phone ='$phone', whats='$whats', image ='$image', price='$price'
, lat='$lat' ,lng='$lng'
";

$queryResult = $connectNow->query($sqlQuery);

if($queryResult) {
    echo json_encode(array("success"=>true));
     // echo json_encode(array("Success"=>true));
}

else{
    echo json_encode(array("success"=>false));
}


?>