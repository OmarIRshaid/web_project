<?php 
    if(isset($_SESSION['email'])){
        if($_SESSION['role'] != 'editor'){
            header("location:dashboardCheck.php") ;
        }
    }else {
        header("location:loginForm.php") ;
    }

    require("dbconfig.php") ;
    if(!isset($_POST['id'])){
        header("location:editorDashboard.php") ;
    }
    
    $id = $_POST['id'] ;
    $sql = "UPDATE news SET status = 'approved' WHERE id = ?" ;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("location:editorDashboard.php") ;
?>