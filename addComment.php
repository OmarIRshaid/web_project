<?php
    session_start();
    
    if(isset($_SESSION['email'])) {
        if($_SESSION['role'] == 'editor' || $_SESSION['role'] == 'admin') {
            header('Location:index.php');
            exit();
        }
    } else {
        header('Location:loginForm.php');
    }
    require("dbconfig.php");
    $comment = $_POST['comment'];
    $news_id = $_POST['news_id'];
    $user_id = $_SESSION['id'];
    $sql = "INSERT INTO comments (comment, news_id, user_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $comment, $news_id, $user_id);
    $stmt->execute();
    header('Location: details.php?id='.$news_id);

?>