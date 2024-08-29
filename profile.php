<?php
session_start();
require('backend.php');

// jika tidak ada session login silahkan login terlebih dahulu
if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}



$data = query("SELECT * FROM memberjkt48");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>member</title>
  <link rel="shortcut icon" href="imgJkt/JKT48.webp" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .container-fluid {
      width: 600px;
      margin: auto;
    }

    li {
      list-style-type: none;
    }

    img {
      height: 175px;
      box-sizing: border-box;
      width: 130px;
    }

    figcaption {
      text-align: center;
      margin: 2px 0 10px 0;
    }

    a {
      text-decoration: none;
    }

    .profile {
      border: 1px solid gold;
      box-sizing: border-box;
      gap: 10px;
      height: 230px;
    }

    figcaption:hover {
      text-align: center;
      background-color: red;
      color: white;
    }
  </style>
</head>
          
<body>
  <div class="container-fluid">
    <h1 class="text-center mt-2 mb-5">Darashinai Aishikata (2021)</h1>
    <p><b>Darashinai Aishikata</b> is the 22nd single released by JKT48. This is also JKT48's first single after their group restructurization.</p>
    <div class="row g-3">
      <?php foreach ($data as $d) : ?>
        <div class="col-3">
          <div class="profile">
            <a href="info.php?id=<?= $d['id']; ?>">
              <img src="imgjkt/<?= $d['profile']; ?>" alt="">
              <figcaption><?= $d['nickname']; ?></figcaption>
            </a>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
  <button type="button"><a href="table.php">member</a></button>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body> 

        
</html>