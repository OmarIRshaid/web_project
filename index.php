<?php 
  require("dbconfig.php");
  $sql = "SELECT * FROM news WHERE status = ? ORDER BY dateposted DESC LIMIT 5";
  $stmt = $conn->prepare($sql);
  $status = 'approved';
  $stmt->bind_param("s", $status);
  $stmt->execute();
  $result = $stmt->get_result();
  $news = $result->fetch_all(MYSQLI_BOTH);
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
  <body class="index">
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
            >DASHBOARD
            </a>
          <a
            class="navbar-brand text-white"
            href="category.php?id=4"
            >صحة</a
          >
          <a
            class="navbar-brand text-white"
            href="category.php?id=3"
            >رياضة</a
          >
          <a
            class="navbar-brand text-white"
            href="category.php?id=2"
            >اقتصاد</a
          >
          <a
            class="navbar-brand text-white"
            href="category.php?id=1"
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
      <div class="row">
        <div class="col col-7">
          <div class="row">
            <div class="col col-5">
              <a href="details.php?id=<?php echo htmlspecialchars($news[1]['id']) ; ?>" class="text-black">
                <div class="card">
                  <img
                    src=<?php echo "images/".htmlspecialchars($news[1]['image']); ?>
                    class="card-img-top"
                    alt="..."
                  />
                  <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($news[1]['title']) ; ?></h5>
                    <p class="card-text">
                      <?php echo htmlspecialchars($news[1]['short_desc']) ; ?>
                    </p>
                  </div>
                </div>
              </a>
            </div>

            <div class="col col-5">
              <a href="details.php?id=<?php echo htmlspecialchars($news[2]['id']) ; ?>" class="text-black">
                <div class="card">
                  <img
                    src=<?php echo "images/".htmlspecialchars($news[2]['image']); ?>
                    class="card-img-top"
                    alt="..."
                  />
                  <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($news[2]['title']) ; ?></h5>
                    <p class="card-text">
                      <?php echo htmlspecialchars($news[2]['short_desc']) ; ?>
                    </p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col col-5">
              <a href="details.php?id=<?php echo htmlspecialchars($news[3]['id']) ; ?>" class="text-black">
                <div class="card">
                  <img
                    src=<?php echo "images/".htmlspecialchars($news[3]['image']); ?>
                    class="card-img-top"
                    alt="..."
                  />
                  <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($news[3]['title']) ; ?></h5>
                    <p class="card-text">
                      <?php echo htmlspecialchars($news[3]['short_desc']) ; ?>
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col col-5">
              <a href="details.php?id=<?php echo htmlspecialchars($news[4]['id']) ; ?>" class="text-black">
                <div class="card">
                  <img
                    src=<?php echo "images/".htmlspecialchars($news[4]['image']); ?>
                    class="card-img-top"
                    alt="..."
                  />
                  <div class="card-body">
                    <h5 class="card-title "><?php echo htmlspecialchars($news[4]['title']) ; ?></h5>
                    <p class="card-text">
                      <?php echo htmlspecialchars($news[4]['short_desc']) ; ?>
                    </p>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col col-5">
          <a href="details.php?id=<?php echo htmlspecialchars($news[0]['id']) ; ?>" class="text-black">
            <div
              class="card"
              style="
                height: 100%;
                background-color: rgb(0, 0, 70);
              "
            >
              <img
                src="<?php echo "images/".htmlspecialchars($news[0]['image']); ?>"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h1 class="card-title text-white display-5 text-center"><?php echo htmlspecialchars($news[0]['title']) ; ?></h1>
                <p class="card-text text-white fs-3 text-center ">
                  <?php echo htmlspecialchars($news[0]['short_desc']) ; ?>
                </p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </body>
</html>
