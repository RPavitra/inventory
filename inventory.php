<?php
    
    include_once 'includes/db.inc.php';

    // global variable
    global $conn;

    // variables
    $id = $_POST['id'];
    $name =  $_POST['name'];
    $branch = $_POST['branch'];
    $quantity = $_POST['quantity'];
    $timeSlot = $_POST['time'];
    $code = "DSE1233"; 

    //json array for api
    $apiData =  json_encode(array_merge($_REQUEST,["code"=>$code]));

    insertIntoServiceTable($id,$name,$branch,$quantity,$timeSlot,$apiData);
    
    // insert to db 
    function insertIntoServiceTable($id,$name,$branch,$quantity,$timeSlot,$apiData)
    {
        // inserting into db
        $sql = "INSERT INTO service VALUES(?,?,?,?,?)";
        $values = array($id,$name,$branch,$quantity,$timeSlot);
        $query = sqlsrv_query($GLOBALS['conn'],$sql,$values);

        // dies if query fails
        if($query === false) {
            die( print_r( sqlsrv_errors(), true) );
        }

        sendDataToApi($apiData);
    }

    // send data to api
    function sendDataToApi($apiData)
    {
        //fake jason server url
        $url = 'https://my-json-server.typicode.com/RPavitra/inventory/services';

        //curl initialize
        $ch = curl_init($url);

        //curl set option as post request
        curl_setopt($ch, CURLOPT_POST, 1);

        //attaching api json data
        curl_setopt($ch, CURLOPT_POSTFIELDS, $apiData);

        //setting the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
        
        //curl execution
        $result = curl_exec($ch);
    }

?>