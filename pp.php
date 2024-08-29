<?php
    session_start();
    require "backend.php";

    if(!isset($_SESSION["login"])){
        header("location:login.php");
        exit;
    }
    
    $user_id = $_SESSION["login"];

    
    $sql_user = "SELECT username,fullname,thumbnail,profile,bio FROM users WHERE id = '$user_id'";
    $result = mysqli_query($conn,$sql_user);
    
    if($result && mysqli_num_rows($result) > 0){
        $r = mysqli_fetch_assoc($result);
        $username = $r["username"];
        $fullname = $r["fullname"];
        $thumbnail = $r["thumbnail"];
        $profile = $r["profile"];
        $bio = $r["bio"];
    }


?>
















<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Page</title>
    <link rel="shortcut icon" href="imgJkt/JKT48.webp" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <div class="contentProfile">
        <div class="container d-flex align-items-center justify-content-center">
            <div>
                <?php if($thumbnail) : ?>
                    <img src="imgJkt/<?= $thumbnail; ?>" alt="." class="thumbnail">
                <?php else : ?>
                    <img src="imgJkt/backgroundDefault.webp" alt="." class="thumbnail">
                <?php endif; ?>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center ">
            <?php if($profile) :?>
                <img src="imgJkt/<?= $profile; ?>" alt="" class="pp">
                <h5 class="text-center mt-2 fw-semibold">@<?= htmlspecialchars($username); ?></h5>
            <?php else : ?>
                <img src="imgJkt/avatar.png" alt="" class="pp">
                <h5 class="text-center mt-2 fw-semibold">@<?= htmlspecialchars($username); ?></h5>
            <?php endif; ?>
        </div>
        <div class="text-center mt-3">
            <h3><?= htmlspecialchars($fullname); ?></h3>
        </div>
        <div class="text-center mt-4">
            <h6><?= $bio; ?></h6>
        </div>
        <div class="text-center mt-5">
            <button class="btn btn-success"><a href="editprofile.php?" class="link-light link-offset-2 link-underline link-underline-opacity-0">edit profile</a></button>
            <button class="btn btn-warning"><a href="table.php" class="link-dark link-offset-2 link-underline link-underline-opacity-0">Home</a></button>
            <button class="btn btn-danger"><a href="deleteAcc.php" class="link-light link-offset-2 link-underline link-underline-opacity-0">delete akun</a></button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>