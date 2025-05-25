<?php

    session_start();
    if(isset($_SESSION['email'])) {
        if($_SESSION['role'] != 'author') {
            header('location:dashboardCheck.php');
        }
    }
    else {
        header('location:index.php');
    }

    require("dbconfig.php");
    if(isset($_FILES['image'])) {
        $id = $_POST['id'];
        $short_desc = $_POST['short_desc'] ;
        $category_id = $_POST['category'] ;
        $title = $_POST['title'] ;
        $body = $_POST['body'] ;
        $file_name = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'images/'.$file_name;


        
        if (move_uploaded_file($tempname, $folder)) {
            $sql = "UPDATE news SET title = ?, short_desc = ?, body = ?, image = ?, category_id = ? WHERE id = ?" ;
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssii", $title, $short_desc, $body, $file_name, $category_id, $id);

            if($stmt->execute()) {
                header("location:authorDashboard.php") ;
            } else {
                echo "Database error: " . $conn->error;
            }
        } else {
            echo "Failed to upload image";
        }
    } else {
        echo "No image was uploaded";
    }
    
?>