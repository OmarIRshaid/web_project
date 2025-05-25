<?php
    session_start();
    if(isset($_SESSION['email'])){
        if($_SESSION['role'] != 'author'){
            header("location:dashboardCheck.php");
        }
    }else {
        header("location:loginForm.php");
    }
    require("dbconfig.php");
    $id = $_POST['id'];
    $sql = "DELETE FROM news WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if($stmt->execute()){
        header("location:authorDashboard.php");
    }else{
        echo "Error deleting news";
    }
?>