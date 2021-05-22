<?php

    $server = "DESKTOP-MS6VCIA"; 
    $user = "root";   
    $password = "abcd1234";  
    $database = "inventory"; 

    $connectionInfo = array( 
        "UID"=>$user,                            
        "PWD"=>$password,                            
        "Database"=>$database
    ); 

    /* Connect using SQL Server Authentication. */  
    $conn = sqlsrv_connect( $server, $connectionInfo);  

?>  