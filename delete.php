 <?php
    session_start();
    require 'backend.php';

    if (!isset($_SESSION["login"])) {
        header("location: login.php");
        exit;
    }
    // menagkap get dari inputan user
    $id = $_GET["id"];

    // if function data lebih besar dari 0 yang berasal dari backend.php mysqli_affected_rows
    if (dell($id) > 0) {
        echo "<script>
            confirm('you want delete data?');
            window.location.href ='table.php';
        </script>";
    } else {
        echo "erorr";
    }
    ?>