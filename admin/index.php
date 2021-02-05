<?php 
    error_reporting (E_ALL ^ E_NOTICE);
    session_start();
    include "connection.php";
    if (!isset($_SESSION["login"])) {
        echo "
            <script>
                alert('YOU MUST LOG IN TO USE THIS FEATURE!!!');
            </script>
        ";
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=login.php'>";
        exit;
    }

    $sql_admin = mysqli_query($conn, "SELECT * FROM admin WHERE username='$_SESSION[username]' AND password='$_SESSION[password]'");
    $admin = mysqli_fetch_array($sql_admin);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>M.E.S Administrator</title>
</head>
<body>
    <div class="header">
        <div class="grid">
            <div class="topnav" id="myTopnav">
                <div class="dh6">
                    <div class="left">
                        <a href="index.php"><b>M.E.S</b></a>
                        <a href="javascript:void(0);" class="icon" style="font-size:14px;" onClick="myFunction()">&#9776;</a>
                        <a href="index.php">Beranda</a>
                        <!-- <a href="diagnosa.php">Diagnosa</a> -->
                    </div>
                </div>
                <div class="dh6">
                    <div class="right">
                        <a>Selamat datang &nbsp;&nbsp;&nbsp;<b><?php echo "$admin[name]"; ?></b></a>
                        <a href='?p=user'>USER LIST</a>
                        <a href='logout.php'>Logout</a>
                    </div>
                </div>
            </div>
            <script>
                function myFunction() {
                    var x = document.getElementById("myTopnav");
                    if (x.className === "topnav") {
                        x.className += " responsive";
                    } else {
                        x.className = "topnav";
                    }
                }
            </script>
        </div>
    </div>
    
   <div class="grid">
        <div class="dh12">
            <div class="main">
            <?php 
                error_reporting (E_ALL ^ E_NOTICE);
                if ($_GET["p"] == "question") {
                    include "question.php";
                } elseif ($_GET["p"] == "questionadd") {
                    include "questionadd.php";
                } elseif ($_GET["p"] == "questionedit") {
                    include "questionedit.php";
                } elseif ($_GET["p"] == "questiondelete") {
                    include "questiondelete.php";
                } elseif ($_GET["p"] == "gejala") {
                    include "gejala.php";
                } elseif ($_GET["p"] == "gejalaadd") {
                    include "gejalaadd.php";
                } elseif ($_GET["p"] == "gejalaedit") {
                    include "gejalaedit.php";
                } elseif ($_GET["p"] == "gejaladelete") {
                    include "gejaladelete.php";
                } elseif ($_GET["p"] == "penyakit") {
                    include "penyakit.php";
                } elseif ($_GET["p"] == "penyakitadd") {
                    include "penyakitadd.php";
                } elseif ($_GET["p"] == "penyakitedit") {
                    include "penyakitedit.php";
                } elseif ($_GET["p"] == "penyakitdelete") {
                    include "penyakitdelete.php";
                } elseif ($_GET["p"] == "rule") {
                    include "rule.php";
                } elseif ($_GET["p"] == "ruleadd") {
                    include "ruleadd.php";
                } elseif ($_GET["p"] == "ruleedit") {
                    include "ruleedit.php";
                } elseif ($_GET["p"] == "ruledelete") {
                    include "ruledelete.php";
                } elseif ($_GET["p"] == "user") {
                    include "user.php";
                } elseif ($_GET["p"] == "history") {
                    include "history.php";
                } else {
                    include "home.php";
                }
            ?>
        </div>
        </div>
   </div>

    <div class="footer">
        <div class="grid">
            copyright Muhammad Yasir &copy; 2021
        </div>
    </div>

</body>
</html>