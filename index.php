<?php 
    error_reporting (E_ALL ^ E_NOTICE); 
    session_start();
    include "connection.php";
    $sql_user = mysqli_query($conn, "SELECT * FROM user WHERE username='$_SESSION[username]' && password='$_SESSION[password]'");
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
    
    <div class="header">
        <div class="grid">
            <div class="topnav" id="myTopnav">
                <div class="dh6">
                    <div class="left">
                        <a href="index.php"><b>M.E.S</b></a>
                        <a href="javascript:void(0);" class="icon" style="font-size:14px;" onClick="myFunction()">&#9776;</a>
                        <a href="index.php">Beranda</a>
                        <a href="diagnosa.php">Diagnosa</a>
                    </div>
                </div>
                <div class="dh6">
                    <div class="right">
                    <?php 
                        if (!empty($_SESSION["username"]) && !empty($_SESSION["password"])) {
                            echo "<a>Selamat datang &nbsp;&nbsp;&nbsp;<b>$result[name]</b></a>";
                            echo "<a href='riwayat.php?id=$result[id_user]'>Riwayat</a>";
                            echo "<a href='logout.php'>Logout</a>";
                        } else {
                            echo "<a href='register.php'>Register</a>";
                            echo "<a href='login.php'>Login</a>";
                        }
                    ?>
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

    <div class="main">
        <div class="grid">
            <div class="dh12">
                <div class="opening">
                    <img src="img/nyamuk.jpeg" alt="" class="img">
                    <h1>Mosquito-borne disease Expert System</h1><br>
                    <p>M.E.S merupakan sistem pakar yang dikembangkan untuk mendiagnosa penyakit yang disebabkan oleh nyamuk. 
                        Dimana nyamuk sendiri menempati peringkat pertama sebagai hewan penyebab penyakit yang mematikan bagi manusia.
                        Ditambah lagi kemampuan hewan ini dalam beradaptasi dan berkembang biak sehinnga menjadi patut untuk diwaspadai.
                        M.E.S merupakan sistem pakar yang dikembangkan untuk mendiagnosa penyakit yang disebabkan oleh nyamuk. 
                        Dimana nyamuk sendiri menempati peringkat pertama sebagai hewan penyebab penyakit yang mematikan bagi manusia.
                        Ditambah lagi kemampuan hewan ini dalam beradaptasi dan berkembang biak sehinnga menjadi patut untuk diwaspadai.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="batas"></div>

    <div class="footer">
        <div class="grid">
            copyright Muhammad Yasir &copy; 2021
        </div>
    </div>

</body>
</html>