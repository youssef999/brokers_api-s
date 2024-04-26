




<?php

include '../connection.php';

$postData = json_decode(file_get_contents('php://input'), true);

$userId= $postData['user_id'];


$sqlQuery = "SELECT * FROM orders WHERE user_id='$userId' ";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0) 

{
    $clothItemRecored = array();
    
    while($rowFound = $resultOfQuery->fetch_assoc())
    {
        $clothItemRecored[] = $rowFound;
    }

    echo json_encode(
        array(
            "success"=>true,
            "Data"=>$clothItemRecored
        )
    );
}
else //Do NOT allow user to login 
{
    echo json_encode(array("success"=>false));
}



