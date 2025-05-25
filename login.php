<?php 
    session_start() ;
    require("dbconfig.php") ;

    if(!isset($_POST['email'])) {
        header("location:loginForm.php") ;
    }
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;
    $sql = "SELECT * FROM user WHERE email=?" ;
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($row = $result->fetch_assoc()) {
        if(password_verify($password , $row['password'])) {
            $_SESSION['role'] = $row['role'] ;
            $_SESSION['email'] = $row['email'] ;
            $_SESSION['id'] = $row['id'] ;
            header("location:index.php") ;
            
        } else {
        header("location:loginForm.php?error=1") ;
        }
        
    } else {
        header("location:loginForm.php?error") ;
    }

?>