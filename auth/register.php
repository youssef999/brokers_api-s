<?php

include'../connection.php';

$postData = json_decode(file_get_contents('php://input'), true);

$name = $postData['name'];

$email = $postData['email'];

$phone= $postData['phone'];

$frontImage = $postData['frontImage'];
$backImage = $postData['backImage'];

$userPassword = $postData['pass'];

$roleId = $postData['roleId'];


$sqlQuery =" INSERT INTO users SET name='$name' , email='$email',
 frontImage ='$frontImage', backImage ='$backImage', roleId='$roleId'
, phone='$phone' ,pass='$userPassword'
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