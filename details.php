<?php 
    session_start();
require("dbconfig.php") ;
    if(isset($_GET['id'])) {
        $id = $_GET['id'] ;
        $sql = "SELECT * FROM news WHERE id = ? AND status = 'approved'" ;
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 0) {
            $sql = "SELECT * FROM news WHERE id = ?" ;
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows != 0) {
                if($_SESSION['role'] != 'author' && $_SESSION['role'] != 'editor') {
                  header("location:index.php") ;
                }
            } else {
              header("location:index.php") ;
            }
        }
        $row = $result->fetch_assoc() ;
        $sql = "SELECT * FROM comments join user on comments.user_id = user.id WHERE news_id = ?" ;
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    }
    
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="s.css" />
  </head>
  <body class="details">
    <nav class="navbar" data-bs-theme="light">
      <div class="container">
        <a class="navbar-brand text-white" href="logout.php">Log In/Log Out</a>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="ادخل كلمة للبحث" aria-label="Search" />
        </form>
        <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand text-white" href="dashboardCheck.php">Dashboard</a>
          <a class="navbar-brand text-white" href="category.php?id=4">صحة</a>
          <a class="navbar-brand text-white" href="category.php?id=3">رياضة</a>
          <a class="navbar-brand text-white" href="category.php?id=2">اقتصاد</a>
          <a class="navbar-brand text-white" href="category.php?id=1">سياسة</a>
          <a class="navbar-brand text-white" href="index.php">الرئيسة</a>
        </nav>
      </div>
    </nav>

    <div class="container">
      <img src="<?php echo "images/" .htmlspecialchars($row['image']) ?>" class="img-fluid" alt="..." />

      <h2 ><?php echo htmlspecialchars($row['title']) ?></h2>

      <p class="text-uppercase fw-medium lh-lg fs-4 ">
         <?php echo htmlspecialchars($row['body']) ?>
      </p>
      <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'author') { ?>
      <form action="addComment.php" method="post">
        <div class="form-group">
          <label class="fs-2" for="exampleFormControlTextarea1">Add a Comment</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
          <input type="hidden" name="news_id" value="<?php echo htmlspecialchars($id) ?>">
        </div>
        <button type="submit" class="btn btn-outline-primary">Add Comment</button>
      </form>
      <?php } ?>
      <h1 class="fs-2 text-center">Comments</h1>
      <div class="comments">
    <?php while($row = $result->fetch_assoc()) { ?>
     <p class="text-start fs-4 fw-medium"><span class="text-uppercase text-nowrap bg-body-secondary border fs-2"><?php echo htmlspecialchars($row['name']) ?></span>  <?php echo " : " . htmlspecialchars($row['comment'])  ; ?></p>
      <?php
    }
    ?>
    </div>
  </body>
</html>

