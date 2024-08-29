<?php 
    session_start();
    session_destroy();

    setcookie("id","",time()-3600);
    setcookie("key","",time()-3600);

    echo "<script>
        window.location.href = 'login.php';
    </script>"
?>