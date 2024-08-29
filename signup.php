<?php
    require 'backend.php';
    

    // jika tombol register click
    if(isset($_POST["register"])){
        if(register($_POST) > 0){
            echo "<script>
                alert('your account success added');
                window.location.href = 'login.php';
            </script>";
        }else{
            echo "<script>
                alert('silahkan mengisi data dengan benar')
            </script>";
        } 
    }




?>






















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
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
            background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            background-color: aliceblue;
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            font-weight: bold;
            text-align: center;
            background-image: linear-gradient(to top, #fbc2eb 0%, #a18cd1 100%);
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
            width: 97%;
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

        .bi{
            position:absolute;
            top :28px;
            right: 10px;
            cursor: pointer;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Sign Up</h1>
        <form action="" method="post">
            <div class="input">
                <label for="username">username</label>
                <input type="text" name="username" id="username" placeholder="username" required>
            </div>
            <div class="input">
                <label for="fullname">fullname</label>
                <input type="text" name="fullname" id="fullname" placeholder="fullname" required>
            </div>
            <div class="input">
                <label for="password">password</label>
                <input type="password" name="password" id="password" placeholder="password" class="passw" required><span class="eye"><i class="bi bi-eye-slash"></i></span>
            </div>
            <div class="input">
                <label for="pass">confirm password</label>
                <input type="password" name="pass" id="pass" placeholder="confirm password" class="passw" required><span class="eye"><i class="bi bi-eye-slash"></i></span>
            </div>
            <div>
                <label for="agree">
                    <input type="checkbox" name="agree" id="agree" value="yes" checked>I agree with the
                    <a href="">term of services</a>
                </label>
                <button type="submit" name="register">register</button>
                <p>you have an account? <a href="login.php">login here</a></p>
            </div>
        </form>
    </div> 
    <script>
        // menangkap element input dan icon eye 
        const pass = document.querySelectorAll('.passw');
        const eye = document.querySelectorAll('.eye');

        // looping for nodelist eye icon 
        eye.forEach( (e,index) => e.addEventListener('click',function(){

            // jika password pada indek yang di click type password 
            if(pass[index].type === 'password'){
                pass[index].type = 'text'; // change password type
                e.innerHTML = `<i class="bi bi-eye"></i>`; //change icon eye
                
            }else{
                pass[index].type = 'password'; //else password type text -> password
                e.innerHTML = `<i class="bi bi-eye-slash"></i>`; // change icon eye -> slash
            }
        }))
        

        


    </script>
</body>

</html>