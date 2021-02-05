<?php 
    session_start();
    session_destroy();
    echo "
        <script>
            alert('YOU HAVE LOGGED OUT');
        </script>
    ";
    // header("Location: login.php");
    echo "<META HTTP-EQUIV='Refresh' Content='0; URL=login.php'>";
?>