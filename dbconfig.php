<?php 
    try {
        $conn = mysqli_connect("localhost" , "root" , null , "web_project") ;
    }catch(mysqli_sql_exception) {
        die("Connection error"); 
    }
    

?>