<?php
session_start();
require 'backend.php';

// jika tidak ada session login silahkan login terlebih dahulu
if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

if (!isset($_COOKIE["id"])) {
  header("location: logout.php");
  exit;
}

$user_id = $_SESSION["login"];


$sql_user = "SELECT username,fullname,thumbnail,profile,bio FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql_user);

if ($result && mysqli_num_rows($result) > 0) {
  $r = mysqli_fetch_assoc($result);
  $username = $r["username"];
  $fullname = $r["fullname"];
  $thumbnail = $r["thumbnail"];
  $profile = $r["profile"];
  $bio = $r["bio"];
}


// get keyword input name
$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";

// setup pagination
$awal_page = 3;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$active_page = ($awal_page * $page) - $awal_page;

// setup query
if (!empty($keyword)) {
  $jumlah_page = count(query("SELECT * FROM memberjkt48 WHERE fullname LIKE '%$keyword%' OR generation LIKE '%$keyword%'"));
  $dt = query("SELECT * FROM memberjkt48 WHERE fullname LIKE '%$keyword%' OR generation LIKE '%$keyword%' LIMIT $active_page, $awal_page");
} else {
  $jumlah_page = count(query("SELECT * FROM memberjkt48"));
  $dt = query("SELECT * FROM memberjkt48 LIMIT $active_page, $awal_page");
}

$hasil_page = ceil($jumlah_page / $awal_page);



?>









<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JKT48 Member</title>
  <link rel="shortcut icon" href="imgJkt/JKT48.webp" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/script.js"></script>
</head>

<body>
  <nav class="nav">
    <i class="uil uil-bars navOpenBtn"></i>
    <div class="logo">
      <a href="#">
        Jkt48 Member
    </div>

    <ul class="navlinks">
      <i class="uil uil-times navCloseBtn"></i>
      <li><a href="#">Home</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Products</a></li>
      <li><a href="profile.php">About Us</a></li>
      <li><a href="#">Contact Us</a></li>
    </ul>
    <div>
      <i class="uil uil-search search-icon" id="searchIcon"></i>
      <i class="uil uil-signout search-icon" id="logoutIcon"></i>
      <i class="uil uil-user search-icon" id="profileIcon"></i>
      <form action="" method="get">
        <div class="icon">
          <div class="search-box">
            <i class="uil uil-search search-icon"></i>
            <input type="text" name="keyword" placeholder="mau cari apa..." autocomplete="off" value="<?= htmlspecialchars($keyword); ?>" class="input">
          </div>
        </div>
      </form>
    </div>
  </nav>
  <img class="loader" src="imgJkt/Animation - 1722925031755.gif" alt="">
  <div class="profilecont">
    <!-- <div class="container d-flex justify-content-center align-items-center bg-info"> -->

    <div class="card">
      <div class="upper">
        <?php if ($thumbnail) : ?>
          <img src="imgJkt/<?= $thumbnail; ?>" class="img-fluid" style="height: 100px; width: 100%;background-size:cover;object-fit:cover;">
        <?php else : ?>
          <img src="imgJkt/backgroundDefault.webp" class="img-fluid" style="height: 100px; width: 100%;background-size:cover;object-fit:cover;">
        <?php endif; ?>
      </div>

      <div class="user text-center">
        <div class="profile">
          <?php if ($profile) : ?>
            <img src="imgJkt/<?= $profile; ?>" class="rounded-circle" width="100px" style="object-fit: cover;border:3px solid #ddd;">
          <?php else : ?>
            <img src="imgJkt/avatar.png" class="rounded-circle" width="100px" style="object-fit: cover;border:3px solid #ddd;">
          <?php endif; ?>
        </div>
      </div>

      <div class="mt-5 text-center">
        <h4 class="mb-0">@<?= $username; ?></h4>
        <span class="text-muted d-block mb-2"><?= $fullname; ?></span>
        <button class="btn profileButton btn-sm follow"><a href="pp.php" style="color:#fff;">profile</a></button>
        <div class="d-flex justify-content-center align-items-center mt-4 px-4">
          <div class="stats">
            <h6><?= $bio; ?></h6>
          </div>
        </div>
      </div>
      <!-- </div> -->

    </div>
  </div>
  <?php if (!empty($dt)) : ?>
    <div class="container">
      <table cellpadding="10" cellspacing="0" style="border-radius:10px;border:3px solid #ddd;">
        <tr style="background-color:#36304a;color:#fff;z-index:1;">
          <th style="border-top-left-radius:7px;">no</th>
          <th>profile</th>
          <th>fullname</th>
          <th>birtday</th>
          <th>generation</th>
          <th>nickname</th>
          <th style="border-top-right-radius:7px;">action</th>
        </tr>
        <?php $id = 1; ?>
        <?php foreach ($dt as $data) : ?>
          <tr class="inti" style="cursor:pointer;">
            <td> <a href="info.php?id=<?= $data["id"]; ?>" style="color:black;"><?= $id; ?></a></td>
            <td> <a href="info.php?id=<?= $data["id"]; ?>" style="color:black;"><img src="imgjkt/<?= $data["profile"]; ?>" alt="" style="width: 50px;"></a></td>
            <td> <a href="info.php?id=<?= $data["id"]; ?>" style="color:black;"><?= $data["fullname"]; ?></a></td>
            <td> <a href="info.php?id=<?= $data["id"]; ?>" style="color:black;"><?= $data["birtday"]; ?></a></td>
            <td> <a href="info.php?id=<?= $data["id"]; ?>" style="color:black;"><?= $data["generation"]; ?></a></td>
            <td> <a href="info.php?id=<?= $data["id"]; ?>" style="color:black;"><?= $data["nickname"]; ?></a></td>
            <td>
              <div class="action">
                <a href="add.php"><img src="imgJkt/add.png" alt="" style="width: 28px;height:28px;"></a>
                <a href="change.php?id=<?= $data["id"]; ?>"><img src="imgJkt/refresh.png" alt="" style="width: 25px;height:25px;"></a>
                <a href="delete.php?id=<?= $data["id"]; ?>" onclick="return confirm('you want to delete data?')"><img src="imgJKT/x-button.png" alt="" style="width: 25px;height:25px;"></a>
              </div>

            </td>
          </tr>
    </div>
    <?php $id++ ?>
  <?php endforeach; ?>
  </table>
<?php else : ?>
  <img src="imgJkt/notfound.gif" alt="">
  <p style="color:red;text-align:center;">404 Not Found</p>
  </div>
<?php endif; ?>

<div class="paginaton" style="margin-top: 50px;">
  <!-- privious pagination start -->
  <?php if ($active_page > 1) : ?>
    <div class="page">
      <a href="?page=<?= $page - 1; ?>&keyword=<?= htmlspecialchars($keyword); ?>">&laquo;</a>
    </div>
  <?php else : ?>
    <div class="page">
      <a href="page=<?= $page ?>" style="pointer-events:none">&laquo;</a>
    </div>
  <?php endif ?>
  <!-- privious pagination end -->

  <!-- number of pagination start -->
  <?php for ($i = 1; $i <= $hasil_page; $i++) : ?>
    <?php if ($i == $page) : ?>
      <div class="page active">
        <a href="?page=<?= $i; ?>&keyword=<?= htmlspecialchars($keyword); ?>"><?= $i; ?></a>
      </div>
    <?php else : ?>
      <div class="page">
        <a href="?page=<?= $i; ?>&keyword=<?= htmlspecialchars($keyword); ?>"> <?= $i ?></a>
      </div>
    <?php endif; ?>
  <?php endfor; ?>
  <!-- number of pagination end -->

  <!-- next of pagination start -->
  <?php if ($page < $hasil_page) : ?>
    <div class="page">
      <a href="?page=<?= $page + 1; ?>&keyword=<?= htmlspecialchars($keyword); ?>">&raquo;</a>
    </div>
  <?php else : ?>
    <div class="page">
      <a href="?page=<?= $page; ?>" style="pointer-events:none;">&raquo;</a>
    </div>
  <?php endif ?>
  <!-- next of pagination end -->
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
  const nav = document.querySelector(".nav"),
    searchIcon = document.querySelector("#searchIcon"),
    navOpenBtn = document.querySelector(".navOpenBtn"),
    navCloseBtn = document.querySelector(".navCloseBtn"),
    profileBtn = document.querySelector("#profileIcon"),
    card = document.querySelector(".card"),
    input = document.querySelector('.input');

  function toggleIcon() {
    card.classList.toggle("noneCard");
    const icon = card.classList.contains("noneCard") ? "uil-times" : "uil-user";
    profileBtn.classList.replace(profileBtn.classList[1], icon)
  }

  profileBtn.addEventListener("click", toggleIcon);

  profileBtn.addEventListener("mouseover", toggleIcon);

  searchIcon.addEventListener("click", () => {
    input.focus();
    nav.classList.toggle("openSearch");
    nav.classList.remove("openNav");
    if (nav.classList.contains("openSearch")) {
      return searchIcon.classList.replace("uil-search", "uil-times");
    }
    searchIcon.classList.replace("uil-times", "uil-search");
  });

  navOpenBtn.addEventListener("click", () => {
    nav.classList.add("openNav");
    nav.classList.remove("openSearch");
    searchIcon.classList.replace("uil-times", "uil-search");
  });
  navCloseBtn.addEventListener("click", () => {
    nav.classList.remove("openNav");
  });
</script>
</body>

</html>