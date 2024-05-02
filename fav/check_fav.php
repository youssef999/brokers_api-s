<?php

include "../connection.php";
$postData = json_decode(file_get_contents('php://input'), true);

$user_id = $postData['user_id'];

$buildingId = $postData['building_id'];


$sqlQuery ="SELECT * FROM fav WHERE building_id='$buildingId' 
AND user_id='$user_id' ";

$resultOfQuery= $connectNow->query($sqlQuery);

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

// if($queryResult) {
//       echo json_encode(array("success"=>true));
// }
// else{
//     echo json_encode(array("success"=>false));
// }

