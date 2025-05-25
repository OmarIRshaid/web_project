<?php 
    require("dbconfig.php") ;
    
    if(!isset($_POST['name'])) {
        header("location:regForm.php") ;
    }
    try {
        $name = $_POST['name'] ;
        $email = $_POST['email'] ;
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $sql = "INSERT INTO user (name, email, password) VALUES (?, ?, ?)" ;
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $password);
    if($stmt->execute()) {
        header("location:loginForm.php") ;
    } else {
        echo "failed to add user" ;
    }
    } catch (Exception $e) {
        header("location:regForm.php?error=1") ;
    }


?>