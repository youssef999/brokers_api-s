




<?php

include'../connection.php';

$postData = json_decode(file_get_contents('php://input'), true);

$name = $postData['name'];

$userId= $postData['userId'];

$price = $postData['price'];

$lat = $postData['lat'];

$lng = $postData['lng'];

$cat= $postData['cat'];


$sqlQuery =" INSERT INTO orders SET name='$name' ,
 userId='$userId', price='$price', lat='$lat', lng='$lng', cat='$cat'
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