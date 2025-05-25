<?php 
  session_start() ;
  if($_SESSION['role'] != 'author') {
    header("location:test.php") ;
  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="s.css">
</head>
<body class="loginForm">
  <div class="container">
    <form action="addNews.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Short Description</label>
        <input name="short_desc" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Body</label>
        <input name="body" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
      </div>
      
      <select name="category" class="form-control">
        <option value="1">سياسة</option>
        <option value="2">اقتصاد</option>
        <option value="3">رياضة</option>
        <option value="4">صحة</option>
      </select>

      <div class="mb-3 visually-hidden" class="visually-hidden">
        <label for="exampleInputEmail1" class="form-label">id</label>
        <input value="<?php echo htmlspecialchars($_SESSION['id']) ?>" name="author_id" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
      </div>

      <div class="form-group">
        <input  name="image" type="file" class="form-control-file" id="exampleFormControlFile1" required>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
</body>
</html>