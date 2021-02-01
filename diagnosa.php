<?php 
    error_reporting (E_ALL ^ E_NOTICE); 
    session_start();
    if (!isset($_SESSION["login"])) {
        echo "
            <script>
                alert('YOU MUST LOG IN TO USE THIS FEATURE!!!');
            </script>
        ";
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=login.php'>";
        exit;
    }

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
                        <a href="index.php">M.E.S</a>
                        <a href="javascript:void(0);" class="icon" style="font-size:14px;" onClick="myFunction()">&#9776;</a>
                        <a href="index.php">Beranda</a>
                        <a href="diagnosa.php">Diagnosa</a>
                    </div>
                </div>
                <div class="dh6">
                    <div class="right">
                    <?php 
                        if (!empty($_SESSION["username"]) && !empty($_SESSION["password"])) {
                            echo "<a><b>$result[name]</b></a>";
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

    <div class="quest">
    <?php 
        include "konsultasi.php";
        /* Menampung nilai CF dari user ke array $CF_user */
        if (isset($_POST["diagnosa"])) {
            $CF_user = array();
            for ($i=0; $i < $jumlah_data_quest; $i++) {
                $CF_user[$i] = $_POST["CF".$i];
                $j = $i +1;
                // echo "$CF_user[$i]"." CF".$j."<br>";
            }
            include "cf_process.php";
            echo "<META HTTP-EQUIV='Refresh' Content='0; URL=hasil.php'>";
        }
    ?>

    </div>

    <div class="batas"></div>

    <div class="footer">
        <div class="grid">
            copyright Muhammad Yasir &copy; 2021
        </div>
    </div>

</body>
</html>