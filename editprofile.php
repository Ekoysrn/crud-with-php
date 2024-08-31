<?php
session_start();
require 'backend.php';

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

$id = $_SESSION["login"];

$data = query("SELECT * FROM users WHERE id = '$id'")[0];


if (isset($_POST["submit"])) {
  if (change_profile($_POST) > 0 || change_datauser($_POST) > 0) {
    echo "<script>
                alert('update profile successfull');
                window.location.href = 'pp.php';
            </script>";
  } else {
    echo "error";
  }
}
?>









<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link rel="stylesheet" href="css/editpp.css">
  <script src="js/jquery-3.7.1.min.js"></script>
</head>

<body>
  <!-- content -->
  <div class="container">
    <h1>Edit Profile</h1>
    <a href="pp.php" class="closeBtn"><i class=" uil uil-times"></i></a>

    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $data["id"]; ?>">
      <input type="hidden" name="thumbnail_last" value="<?= $data["thumbnail"]; ?>">
      <input type="hidden" name="profile_last" value="<?= $data["profile"]; ?>">

      <div class="thumbnail">
        <div class="contentThumb">
          <input type="file" name="thumbnail" id="tInput" accept=".png, .jpg, .jpeg, .webp">
          <label for="tInput"></label>
        </div>
        <div class="thumbnail-preview">
          <?php if ($data["thumbnail"]) : ?>
            <div id="cover" <?= 'style="background-image: url(imgJkt/', $data["thumbnail"], ');"' ?>></div>
          <?php else : ?>
            <div id="cover" style="background-image: url(imgJkt/backgroundDefault.webp)"></div>
          <?php endif; ?>
        </div>
      </div>
      <!-- profile start-->
      <div class="avatar-upload">
        <div class="avatar-edit">
          <input type='file' id="imageUpload" name="profile" accept=".png, .jpg, .jpeg .webp" />
          <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
          <?php if ($data["profile"]) : ?>
            <div id="imagePreview" <?= 'style="background-image: url(imgJkt/', $data["profile"], ');"' ?>></div>
          <?php else : ?>
            <div id="imagePreview" style="background-image: url(imgJkt/avatar.png);"></div>
          <?php endif; ?>
        </div>
      </div>
      <!-- profile end -->

      <!-- username -->
      <div class="center">
        <div class="inputbox">
          <input type="text" required="required" name="username" value="<?= $data["username"]; ?>">
          <span>username</span>
        </div>
        <div class="inputbox">
          <input type="text" required="required" name="fullname" value="<?= $data["fullname"]; ?>">
          <span>fullname</span>
        </div>
        <div class="inputbox">
          <textarea name="bio" id="bio" placeholder="Describe who you are"><?= $data["bio"]; ?></textarea>
          <span>Bio</span>
        </div>
        <div class="inputbox" style="margin-top:100px;">
          <!-- <input type="button" name="submit" value="submit"> -->
          <button type="submit" name="submit">submit</button>
        </div>
      </div>
    </form>
    <!-- username -->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>

</html>