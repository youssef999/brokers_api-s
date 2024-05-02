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
name= '$Name',frontImage= '$FrontImage',
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
        
        )
    );
    }
    
    
    else{
        echo json_encode(array("success"=>false,
        "message"=>"wrong data email or password error")); 
    }




}


