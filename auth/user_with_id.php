

<?php


include '../connection.php';

//POST = send/save data to mysql db
//GET = retrieve/read data from mysql db
$postData = json_decode(file_get_contents('php://input'), true);
$userId = $postData['user_id'];

// if(strlen($userPassword)>5&&
// strpos($userEmail, "@") !== true
// ){

    $sqlQuery = "SELECT * FROM users WHERE user_id = '$userId' ";
   
   $resultOfQuery = $connectNow->query($sqlQuery);
   
   if($resultOfQuery->num_rows > 0) //allow user to login 
   {
       $userRecord = array();
       while($rowFound = $resultOfQuery->fetch_assoc())
       {
           $userRecord[] = $rowFound;
       }
       echo json_encode(
           array(
               "success"=>true,
               "data"=>$userRecord[0],
           )
       );
   }
   else //Do NOT allow user to login 
   {
       echo json_encode(array("success"=>false));
   }
// }

// else{

//     echo json_encode(array("success"=>false,
//     "message"=>"wrong data email or password error")); 

// }
