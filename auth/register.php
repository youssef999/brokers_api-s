<?php


include '../connection.php';

$postData = json_decode(file_get_contents('php://input'), true);
$userEmail = $postData['email'];
$userPassword = $postData['pass']; 
$Name = $postData['name']; 
$FrontImage = $postData['frontImage']; 
$BackImage = $postData['backImage'];
$Phone = $postData['phone'];
$RoleId= $postData['roleId'];

$characters = '0123456789abcdefghi(j)klmnopqrstu_vwxyzABCDEFGHIJKLMNOP*&@!QRSTUVWXYZ';
   
$charactersLength = strlen($characters);
    $token = '';
    // Generate token by randomly selecting characters from the allowed set
    for ($i = 0; $i < 33; $i++) {
        $token .= $characters[rand(0, $charactersLength - 1)];
    }

$sqlQuery = "SELECT * FROM users WHERE email='$userEmail'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0 ) 
{
  //num rows length == 1 --- email already in someone else use 
    echo json_encode(array("success"=>false,
    "message"=>"email already in someone else use"));   
}

else
{
    if(strlen($userPassword)>5&&
    strpos($string, "@") !== true
    ){
        $sqlQuery2 = "INSERT INTO users SET email = '$userEmail',
name= '$Name',frontImage= '$FrontImage',token= '$token',
backImage= '$BackImage',phone= '$Phone',roleId= '$RoleId',
pass= '$userPassword' ";
$resultOfQuery2 = $connectNow->query($sqlQuery2);

    $userRecord2 = array();
    while($rowFound = $resultOfQuery->fetch_assoc())
    {
        $userRecord2[] = $rowFound;
    }
    echo json_encode(
        array(
            "success"=>true,
            "token"=>$token
        )
    );
    }
else{
        echo json_encode(array("success"=>false,
        "message"=>"wrong data email or password error")); 
    }
}


