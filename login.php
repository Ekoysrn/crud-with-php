<?php 
    // memulai sebuah session;
    session_start();
    require 'backend.php';

    if(isset($_COOKIE["id"]) && isset(($_COOKIE["key"]))){

        // menyimpan cookie
        $id = $_COOKIE["id"];
        $key = $_COOKIE["key"];

        // mencari username
        $result = mysqli_query($conn, "SELECT username FROM users WHERE id = '$id'");

        // mengembalikan assosiative array;
        $r = mysqli_fetch_assoc($result);
        
        // if key sama dengan hash sha256 from username
        if($r !== null && $key == hash('sha256',$r["username"])){
            // session login berisi true
            $_SESSION["login"] = true;
        }

    }

    // jika ada session "login" maka arahkan halaman menuju table.php
    if(isset($_SESSION["login"])){
        header("location: table.php");
        exit;
    }

    // jika ada login post from post method
    if(isset($_POST["login"])){
        
        // menyimpan data user yang login
        $username = $_POST["username"];
        $password = $_POST["password"];

        // mencari username
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
        
        // jika mengembalika baris baru = 1
        if(mysqli_num_rows($result) === 1){
        
            // ubah ke assosiative array
            $r = mysqli_fetch_assoc($result);

            // jika password yang sudah di verify sama dengan database
            if(password_verify($password,$r["password"])){
                
                // jika session login ada atau true
                if(isset($_POST["agree"])){
                    // setcookie
                    setcookie("id",hash('sha256',$r["id"]),time() + 86400);
                    setcookie("key",hash('sha256',$r["username"]),time() + 86400);
                }
                // generate session id
                session_regenerate_id(true);

                // set session id
                $_SESSION["login"] = $r["id"];

                // hash session
                $session_id = session_id();
                $session_hash = hash('sha256',$session_id);

                // save session on database
                $user_id = $r["id"];
                $sql = "UPDATE users SET session ='$session_hash' WHERE id = '$user_id'";
                mysqli_query($conn,$sql);

                // session berisi true
                // $_SESSION["login"] = true;


                echo "<script>
                    window.location.href = 'table.php';
                </script>";
            }
        }

        // error login
        $error = true;

    }


?>











<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="imgJkt/JKT48.webp" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background-color: #eaeaea;
            font-family: Arial, Helvetica, sans-serif;
            background: #e96443;  /* fallback for old browsers */
            background: linear-gradient(to right, #904e95, #e96443); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */;
            overflow-y:hidden;
        }

        .container {
            background-color: aliceblue;
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            font-weight: bold;
            text-align: center;
            background-image: linear-gradient(to top, #904e95 0%, #e96443 100%);
            background-clip: text;
            color: transparent;
            transition: .3s cubic-bezier(0.075, 0.82, 0.165, 1);
        }

        h1:hover {
            font-weight: bold;
            text-align: center;
            background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
            background-clip: text;
            color: transparent;
        }

        label {
            display: block;
            margin: 5px;
            font-weight: 500;
        }

        .input {
            display: block;
            margin-left: 10px;
            margin: 10px 0 10px 0;
            position:relative;
        }

        .input input {
            border: none;
            width: 95%;
            padding: 5px;
            border-radius: 5px;
        }

        a {
            text-decoration: none;
        }

        button {
            margin: 10px 0 10px 0;
            width: 100%;
            border: none;
            background-color: #7952b3;
            padding: 7px;
            color: #fff;
            border-radius: 5px;
        }

        button:hover {
            background-position: 100% 0;
            transition: all .4s ease-in-out;
        }

        p{
            text-align: center;
        }

        .bi{
            position:absolute;
            top :28px;
            right: 10px;
            cursor: pointer;
        }

        .check{
            vertical-align:text-top;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form action="" method="post">
            <div class="input">
                <label for="username">username</label>
                <input type="text" name="username" id="username" placeholder="username">
            </div>
            <div class="input">
                <label for="password">password</label>
                <input type="password" name="password" id="password" placeholder="password"><span class="eye"><i class="bi bi-eye-slash"></i></span>
            </div>
            <div>
                <label for="agree">
                    <input type="checkbox" name="agree" id="agree" checked class="check">I agree with the
                    <a href="">term of services</a>
                </label>
                <button type="submit" name="login" style="cursor:pointer;">login</button>
                <?php if(isset($error)) :?>
                    <p style="color:red; line-height:10px; text-align:center;">Sorry, your password was incorrect.</p>
                <?php endif ?>
                <p>don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </form>
    </div>
    <script>
        const pass = document.querySelector('#password');
        const eye = document.querySelector('.eye');
        
        pass.type = 'password';
        eye.innerHTML = `<i class="bi bi-eye-slash"></i>`;

        eye.addEventListener('click',function(){
            if(pass.type === 'password'){
                pass.type = 'text';
                eye.innerHTML = `<i class="bi bi-eye"></i>`;
            }else{
                pass.type = 'password';
                eye.innerHTML = `<i class="bi bi-eye-slash"></i>`;
            }
        })

    </script>
</body>

</html>

