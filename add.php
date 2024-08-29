<?php
session_start();
require 'backend.php';

// jika tidak ada session login silahkan login terlebih dahulu
if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}

//menangkap inputan user
if (isset($_POST["submit"])) {

    // validation user succecss
    if (add($_POST) > 0) {
        echo "<script>
            alert('successfull uploaded');
            window.location.href = 'table.php'; 
        </script>";
    }else{
        echo "error";
    };
}
?>













<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form add data</title>
    <style>
        input {
            display: block;
        }
    </style>
</head>

<body style="display:flex;justify-content:center;align-items:center;height:100vh;">
    <div class="container">
        <h1>Add data member</h1>
        <form action="" method="post" enctype="multipart/form-data">
            
            <label for="profile">
                <img src="imgJkt/avatar.png" alt="default" style="width:80px; height:100px;" class="imagepreview">
            </label>
            <input type="file" placeholder="upload profile" name="profile" id="profile" class="valueimage" onchange="previewImage()"><br>
            
            <label for="fullname">fullName</label>
            <input type="text" name="fullname" required id="fullname">
            
            <label for="birtday">Birtday</label>
            <input type="text" name="birtday" required id="birtday">
            
            <label for="generation">Generation</label>
            <input type="text" name="generation" required id="generation">
            
            <label for="nickname">Nickname</label>
            
            <input type="text" name="nickname" required id="nickname">
            <button type="submit" name="submit">submit</button>
        </form>
        <a href="table.php">home</a>
    </div>
    <script src="js/script.js"></script>
</body>

</html>