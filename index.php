<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MUSQUITO EXPERT SYSTEM</title>
</head>
<body>
    <div class="header">
        <div class="grid">
            <div class="topnav" id="myTopnav">
                <div class="">
                    <a href="index.php">epwm OnlineShop</a>
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
                        if (!empty($_SESSION["userag"]) && !empty($_SESSION["passag"])) {
                            echo "<a><b>$rag[nama]</b></a>";
                            echo "<a href='?p=konfirmasi&idag=$rag[id_anggota]'>Konfirmasi</a>";
                            echo "<a href='?p=riwayat&idag=$rag[id_anggota]'>Riwayat</a>";
                            echo "<a href='?p=keranjangbelanja&idag=$rag[id_anggota]'>Keranjang Belanja</a>";
                            echo "<a href='?p=logout&idag=$rag[id_anggota]'>Logout</a>";
                        } else {
                            echo "<a href='?p=register'>Register</a>";
                            echo "<a href='?p=login'>Login</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="main">

    </div>
    
    <div class="footer">
        <div class="grid">
            copyright Muhammad Yasir &copy; 2021    
        </div>
    </div>
</body>
</html>