<?php 
// if(isset($_GET["nama"])||
//     !isset($_GET["birtday"])||
//     !isset($_GET["generation"])||
//     !isset($_GET["profile"])){
    
//     header("location:index.php");
//     exit;
//     }
?>


<!-- get use $_GET -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add data of member JKT48</title>
    <link rel="shortcut icon" href="imgJkt/JKT48.webp" type="image/x-icon">
</head>
<body>
    <h1>Data member JKT48</h1>
    <ul>
        <li><img src="imgjkt/<?= $_GET["profile"]; ?>" alt=""></li>
        <li><?= $_GET["fullname"]; ?></li>
        <li><?= $_GET["birtday"]; ?></li>
        <li><?= $_GET["generation"]; ?></li>
        <li><?= $_GET["nickname"]; ?></li>
    </ul>
    <a href="index.php">Home</a>
</body>
</html>