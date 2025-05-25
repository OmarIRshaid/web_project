<?php 
    session_start() ;
    if(isset($_SESSION['email'])) {
        if($_SESSION['role'] != 'admin') {
            header("location:test.php") ;
        }
    }else {
        header("location:loginForm.php") ;
    }
    require("dbconfig.php") ;
    $id = $_GET['id'] ;
    $sql = "DELETE FROM user WHERE id = ?" ;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if($stmt->execute()) {
        header("location:adminDashboard.php") ;
    }else {
        echo "Error deleting user: " . $conn->error ;
    }
    
?>