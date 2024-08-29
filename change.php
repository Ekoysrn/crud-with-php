<?php
session_start();
require 'backend.php';

// jika tidak ada session login silahkan login terlebih dahulu
if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

$id = $_GET["id"];

$data = query("SELECT * FROM memberjkt48 WHERE id = $id")[0];


if (isset($_POST["submit"])) {

  if (change($_POST) > 0) {
    echo "<script>
                alert('success updated data');
                window.location.href = 'table.php';
            </script>";
  } else {
    echo "<script>
                alert('error')
            </script>";
  }
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>change data of Member Jkt48</title>
  <link rel="shortcut icon" href="imgJkt/JKT48.webp" type="image/x-icon">
  <style>
    input {
      display: block;
    }
  </style>
</head>

<body>
  <h1>Change data member</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <label for="id"></label>
    <input type="hidden" name="id" id="id" value="<?= $data["id"]; ?>">
    <input type="hidden" name="profile_last" value="<?= $data["profile"]; ?>">

    <label for="profile">
      <img src="imgJkt/<?= $data["profile"]; ?>" alt="" style="width: 80px; height:100px;" class="imagepreview">
    </label>
    <input type="file" placeholder="upload profile" name="profile" id="profile" class="valueimage" onchange="previewImage()"><br>

    <label for="fullname">fullName</label>
    <input type="text" name="fullname" required id="fullname" value="<?= $data["fullname"]; ?>">
    <label for="birtday">Birtday</label>
    <input type="text" name="birtday" required id="birtday" value="<?= $data["birtday"]; ?>">
    <label for="generation">Generation</label>
    <input type="text" name="generation" required id="generation" value="<?= $data["generation"]; ?>">
    <label for="nickname">Nickname</label>
    <input type="text" name="nickname" required id="nickname" value="<?= $data["nickname"]; ?>">
    <button type="submit" name="submit">submit</button>
  </form>
  <a href="table.php">home</a>
  <script src="js/script.js"></script>
</body>

</html>