<?php 
    session_start();
    include "connection.php";

    $sql_user = mysqli_query($conn, "SELECT * FROM user WHERE username='$_SESSION[username]' && password='$_SESSION[password]'");
    $result = mysqli_fetch_array($sql_user);
    // var_dump($result["id_user"]);
    $sql_history = mysqli_query($conn, "SELECT * FROM history WHERE id_anggota='$result[id_user]' ORDER BY waktu DESC LIMIT 0,1;");
    $hasil = mysqli_fetch_array($sql_history);

    /* Menentukan penyakit dengan CF tertinggi */
    $x = array(
        array(
            "CF" => $hasil["CF_P01"],
            "id" => 1
        ),
        array(
            "CF" => $hasil["CF_P02"],
            "id" => 2
        ),
        array(
            "CF" => $hasil["CF_P03"],
            "id" => 3
        )
    );
    rsort($x);
    $id_penyakit = $x[0]["id"];
    $CF_penyakit = $x[0]["CF"];

    $sql_penyakit = mysqli_query($conn, "SELECT penyakit FROM penyakit WHERE id_penyakit='$id_penyakit'");
    $disease = mysqli_fetch_array($sql_penyakit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylehasil.css">
    <title>HASIL</title>
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

    <div class="hasil">
        
        <table class="max">
            <tr>
                <th colspan="2">
                    <p>Kemungkinan besar anda mengalami <b><?php echo "$disease[penyakit]"; ?></b> dengan tingkat kepastian <b><?php echo "$CF_penyakit"; ?>%</b></p>
                </th>
            </tr>
        </table>

        <table>
            <tr>
                <th></th>
                <th>Nilai Certainty Factor</th>
            </tr>

            <tr>
                <th>Demam Berdarah</th>
                <td><?php echo "$hasil[CF_P01]"; ?> %</td>
            </tr>

            <tr>
                <th>Malaria</th>
                <td><?php echo "$hasil[CF_P02]"; ?> %</td>
            </tr>

            <tr>
                <th>Chikungunya</th>
                <td><?php echo "$hasil[CF_P03]"; ?> %</td>
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