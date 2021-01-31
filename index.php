<?php 
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    include "connection.php";
    $sql_user = mysqli_query($conn, "SELECT * FROM user WHERE username='$_SESSION[user]' && password='$_SESSION[pass]'");
    $result = mysqli_fetch_array($sql_user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>M.E.S</title>
</head>
<body>
    <div class="header cf">
        <div class="grid">
            <div class="topnav" id="myTopnav">
                <div class="">
                    <a href="index.php">M.E.S</a>
                    <a href="javascript:void(0);" class="icon" style="font-size:14px;" onClick="myFunction()">&#9776;</a>
                        <?php 
                            if ($_GET["p"] == "beranda") {
                                $pilih = " class='pilih'";
                            } else {
                                $pilih = "";
                            }
                        ?>
                    <a href="index.php">Beranda</a>
                </div>
                <div class="right cf">
                    <?php 
                        if (!empty($_SESSION["user"]) && !empty($_SESSION["pass"])) {
                            echo "<a><b>$result[name]</b></a>";
                            echo "<a href='riwayat.php&id=$result[id_user]'>Riwayat</a>";
                            echo "<a href='logout.php&id=$result[id_user]'>Logout</a>";
                        } else {
                            echo "<a href='register.php'>Register</a>";
                            echo "<a href='login.php'>Login</a>";
                        }
                    ?>
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
    
    <div class="menu">
        <a href="diagnosa.php">DIAGNOSA</a>
        <a href="">PENYAKIT</a>
    </div>

    <div class="main cf">
        <div class="opening">
            <img src="img/nyamuk.jpeg" alt="" class="img cf">
            <h1>Mosquito-borne disease Expert System</h1><br>
            <p>M.E.S merupakan sistem pakar yang dikembangkan untuk mendiagnosa penyakit yang disebabkan oleh nyamuk. 
                Dimana nyamuk sendiri menempati peringkat pertama sebagai hewan penyebab penyakit yang mematikan bagi manusia.
                Ditambah lagi kemampuan hewan ini dalam beradaptasi dan berkembang biak sehinnga menjadi patut untuk diwaspadai.
            </p>
        </div>
    </div>
    
    <div class="footer cf">
        <div class="grid">
            copyright Muhammad Yasir &copy; 2021
        </div>
    </div>
</body>
</html>