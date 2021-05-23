<?php

    $server = ""; 
    $user = "";   
    $password = "";  
    $database = "inventory"; 

    $connectionInfo = array( 
        "UID"=>$user,                            
        "PWD"=>$password,                            
        "Database"=>$database
    ); 

    /* Connect using SQL Server Authentication. */  
    $conn = sqlsrv_connect( $server, $connectionInfo);  

?>  
