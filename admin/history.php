<?php 
    error_reporting (E_ALL ^ E_NOTICE); 
    session_start();
    include "connection.php";
    $id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylehasil.css">
    <title>Riwayat</title>
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
    
    <div class="hasil">
        <table>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">Tanggal dan Waktu</th>
                <th colspan="3">Hasil</th>
            </tr>

            <tr>
                <th>Deman berdarah</th>
                <th>Malaria</th>
                <th>Chikungunya</th>
            </tr>
                
            <?php $no=1; ?>
            <?php $sql_riwayat = mysqli_query($conn, "SELECT * FROM history WHERE id_anggota='$id' ORDER BY waktu DESC"); ?>
            <?php while ($riwayat = mysqli_fetch_array($sql_riwayat)) : ?>
                <tr>
                    <th><?php echo "$no"; ?></th>
                    <td><?php echo "$riwayat[waktu]"; ?></td>
                    <td><?php echo "$riwayat[CF_P01]%"; ?></td>
                    <td><?php echo "$riwayat[CF_P02]%"; ?></td>
                    <td><?php echo "$riwayat[CF_P03]%"; ?></td>
                </tr>
                <?php $no++; ?>
            <?php endwhile; ?>

            <tr>
                <th></th>
            </tr>

        </table>
    </div>

    <div class="footer">
        <div class="grid">
            copyright Muhammad Yasir &copy; 2021
        </div>
    </div>
</body>
</html>