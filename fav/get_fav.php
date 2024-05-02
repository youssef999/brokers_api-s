

<?php

include "../connection.php";
$postData = json_decode(file_get_contents('php://input'), true);

$user_id = $postData['user_id'];

// $sqlQuery = "SELECT * FROM fav CROSS JOIN buildings WHERE 
// fav.user_id='$user_id' 
// AND fav.id = buildings.id ";

$sqlQuery = "SELECT * FROM fav CROSS JOIN buildings WHERE 
fav.user_id='$user_id' 
AND fav.user_id = buildings.id";


$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0) 

{
    $favRecored = array();
    
    while($rowFound = $resultOfQuery->fetch_assoc())
    {
        $favRecored[] = $rowFound;
    }

    echo json_encode(
        array(
            "success"=>true,
            "data"=>$favRecored
        )
    );
}
else //Do NOT allow user to login 
{
    echo json_encode(array("success"=>false));
}