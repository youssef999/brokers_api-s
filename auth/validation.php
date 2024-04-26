
<?php

include '../connection.php';

$postData = json_decode(file_get_contents('php://input'), true);

$userEmail = $postData['email'];

$sqlQuery = "SELECT * FROM users WHERE email='$userEmail'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0) 
{
  //num rows length == 1 --- email already in someone else use 
    echo json_encode(array("success"=>false));   
}

else
{
    //num rows length == 0 --- email is NOT already in someone else use
    // a user will allowed to signUp Successfully
    echo json_encode(array("success"=>true));

}


//  01   |    John      |   john@gmail.com   |   WIOQEUSABHDAS
//  02   |  John Parker |   john22@gmail.com   |  eqweqWIOQEUSABHDAS

