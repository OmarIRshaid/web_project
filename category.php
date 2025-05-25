<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    header('location:index.php');
}
require("dbconfig.php");

$sql = "SELECT * FROM news WHERE category_id = ? AND status = 'approved' order by dateposted desc limit 5";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
      crossorigin="anonymous"
    />
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="s.css" />
  </head>
  <body class="category">
    <nav class="navbar" data-bs-theme="light">
      <div class="container">
        <a class="navbar-brand text-white" href="logout.php">Log In/Log Out</a>
        <form class="d-flex" role="search">
          <input
            class="form-control me-2"
            type="search"
            placeholder="ادخل كلمة للبحث"
            aria-label="Search"
          />
        </form>
        <nav class="navbar navbar-expand-lg">
            <a
            class="navbar-brand text-white"
            href="dashboardCheck.php"
            >DASHBOARD</a
          >
          <a class="navbar-brand text-white" href="category.php?id=4"
            >صحة</a
          >
          <a class="navbar-brand text-white" href="category.php?id=3"
            >رياضة</a
          >
          <a class="navbar-brand text-white" href="category.php?id=2"
            >اقتصاد</a
          >
          <a class="navbar-brand text-white" href="category.php?id=1"
            >سياسة</a
          >
          <a
            class="navbar-brand text-white"
            href="index.php"
            >الرئيسة</a
          >
          
        </nav>
      </div>
    </nav>
    <div class="container">
        
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php   while($row = $result->fetch_assoc()) { ?>
        <a href="details.php?id=<?php echo htmlspecialchars($row['id']) ; ?>">
        <div class="col">
          <div class="card">
            <img
              src=<?php echo "images/".htmlspecialchars($row['image']) ; ?>
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($row['title']) ; ?></h5>
              <p class="card-text">
                <?php echo htmlspecialchars($row['short_desc']) ; ?>
              </p>
            </div>
          </div>
        </div>
        </a>
        <?php } ?>
      </div>
    </div>
  </body>
</html>