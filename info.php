<?php
session_start();
require 'backend.php';

// jika tidak ada session login silahkan login terlebih dahulu
if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}

// ambil id dari parameter Url
$id = $_GET['id'];

$data = query("SELECT * FROM memberjkt48 WHERE id = $id")[0];
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>info member</title>
    <link rel="shortcut icon" href="imgJkt/JKT48.webp" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 600px;
            margin: auto;
        }

        img {
            height: 175px;
        }

        p {
            border-bottom: 1px solid black;
        }

        span {
            font-weight: 600;
        }

        /* the start navbar */
        nav ul {
            width: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            background-color: #333;
            position: fixed;
            z-index: 1;
            top: 0;
        }


        li {
            display: inline-block;
            list-style-type: none;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: inline-block;
            color: white;
            text-decoration: none;
            text-align: center;
            padding: 14px 17px;
        }

        a:hover {
            background-color: rgb(28, 29, 28);
        }

        a:active {
            background-color: red;
        }

        .active {
            background-color: red;
        }
    </style>
</head>


<body>
    <nav>
        <ul>
            <li><a href="profile.php">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1 class="m-5 text-center">info member jkt48</h1>
        <div class="row d-flex justify-content-around align-items-center">
            <div class="col-2">
                <img src="imgjkt/<?= $data["profile"]; ?>" alt="">
            </div>
            <div class="col-6">
                <p><span>name: </span> <?= $data["fullname"]; ?></p>
                <p><span>birtday: </span> <?= $data["birtday"]; ?></p>
                <p><span>generation: </span> <?= $data["birtday"]; ?></p>
                <p><span>nickname: </span> <?= $data["nickname"]; ?></p>
            </div>
        </div>
    </div>
</body>

</html>