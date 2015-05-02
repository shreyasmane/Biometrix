<?php
$response = array();

require_once __DIR__ . '/db_connect.php';
 
$db = new DB_CONNECT();
 
if (isset($_POST['adminKey'])) {
    $username = $_POST['adminKey'];
	 
    $result = mysql_query("SELECT *FROM admin WHERE adminKey = '$adminKey'");
	  
        if (mysql_num_rows($result) > 0) {
            $response["success"] = 1;
			$response["message"] = "Valid User";
            echo json_encode($response);
        } 
		else 
		{            
            $response["success"] = 0;
            $response["message"] = "Invalid User";
            echo json_encode($response);
        }
    } 
	else {
    // required field is missing
    $response["success"] = 0;
	  $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
   echo json_encode($response);
}
?>