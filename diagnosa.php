<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Diagnosa</title>
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

    <div class="question">
        <?php include "cf_process.php"; ?>
    </div>

    <div class="footer cf">
        <div class="grid">
            copyright Muhammad Yasir &copy; 2021
        </div>
    </div>
</body>
</html>