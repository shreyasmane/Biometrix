<?php
 

$response = array();
 

require_once __DIR__ . '/db_connect.php';
 

$db = new DB_CONNECT();
 

if (isset($_GET['data'])) {
    $data = $_GET['data'];
 
    
    $result = mysql_query("SELECT *FROM aadharcard WHERE data = '$data'");
 
    if (!empty($result)) {
       
        if (mysql_num_rows($result) > 0) {
 
            $result = mysql_fetch_array($result);
 
            $product = array();
            $product["name"] = $result["name"];
            $product["birthdate"] = $result["birthdate"];
            $product["sex"] = $result["sex"];
            $product["aadharcardnumber"] = $result["aadharcardnumber"];
            $product["address"] = $result["address"];
            
            $response["success"] = 1;
     
            $response["product"] = array();
 
            array_push($response["product"], $product);
            
            echo json_encode($response);
        } else {
            
            $response["success"] = 0;
            $response["message"] = "No product found";
            
            echo json_encode($response);
        }
    } else {
        
        $response["success"] = 0;
        $response["message"] = "No product found";
        
        echo json_encode($response);
    }
} else {
    
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
   
    echo json_encode($response);
}
?>