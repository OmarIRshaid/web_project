<?php 
    require("dbconfig.php") ;
    session_start() ; 
    if(isset($_SESSION['email'])) {
        if($_SESSION['role'] != 'admin') {
            
        } 
    }else {
        header("location:loginForm.php") ;
    }

    $sql = "SELECT * FROM user WHERE role=?" ;
    $stmt = $conn->prepare($sql);
    $role = 'author';
    $stmt->bind_param("s", $role);
    $stmt->execute();
    $result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<body class="adminDash">
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
            href="authorDashboard.php"
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
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['role']); ?></td>
                    <td><a href="deleteUser.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>