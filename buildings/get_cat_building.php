
<?php

include '../connection.php';

$postData = json_decode(file_get_contents('php://input'), true);

$cat = $postData['cat'];
$type= $postData['type'];

$sqlQuery = "SELECT * FROM buildings WHERE cat='$cat' AND type='$type'";

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
            "data"=>$clothItemRecored
        )
    );
}
else 
{
    echo json_encode(array("success"=>false));
}



