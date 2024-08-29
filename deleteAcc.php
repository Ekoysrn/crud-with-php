<?php
    session_start();
    require 'backend.php';

    if (!isset($_SESSION["login"])) {
        header("location: login.php");
        exit;
    }
    // menagkap get dari inputan user
    $id = $_SESSION["login"];
    var_dump($id);

    // if function data lebih besar dari 0 yang berasal dari backend.php mysqli_affected_rows
    if (delete_user($id) > 0) {
        session_destroy();

        setcookie("id","",time()-3600);
        setcookie("key","",time()-3600);
        echo "<script>
            confirm('you want delete account?');
            window.location.href ='signup.php';
        </script>";
    } else {
        echo "erorr";
    }
    ?>                 
    