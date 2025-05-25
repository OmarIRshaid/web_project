<?php
    session_start();
    if(isset($_SESSION['email'])){
        if($_SESSION['role'] == 'admin'){
            header('location:adminDashboard.php');
        } else if($_SESSION['role'] == 'author'){
            header('location:authorDashboard.php');
        } else if($_SESSION['role'] == 'editor'){
            header('location:editorDashboard.php');
        } else {
            header('location:index.php');
        }
    } else {
        header('location:login.php');
    }
?>