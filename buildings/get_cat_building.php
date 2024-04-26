




<?php

include '../connection.php';


$cat = $_POST['cat'];

$sqlQuery = "SELECT * FROM buildings WHERE cat='$cat' ";

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



