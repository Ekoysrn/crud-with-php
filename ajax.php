<?php

require 'backend.php';
$dt = search($_GET["keyword"]);


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
    <title>Search</title>
    <link rel="shortcut icon" href="imgJkt/JKT48.webp" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <div>
        <img class="loader" src="imgJkt/Animation - 1722925031755.gif" alt="">
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

<script src="jquery-3.7.1.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>