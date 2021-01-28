<?php 
    session_start();
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Administrator</title>
</head>
<body>

    <div class="header">
        <a href="?p=home"><p>Liechanstain Library </p></a>
    </div>

    <div class="sidebar"><hr>
        <a href="<?php echo "?p=buku"; ?>">BUKU</a><hr>
        <a href="<?php echo "?p=penerbit"; ?>">PENERBIT</a><hr>
    </div>

    <div class="mainbar">
        <?php 
            include "connection.php";
            if ($_GET["p"] == "buku") {
                include "buku.php";
            } elseif ($_GET["p"] == "bukuadd") {
                include "bukuadd.php";
            } elseif ($_GET["p"] == "bukuedit") {
                include "bukuedit.php";
            } elseif ($_GET["p"] == "bukudelete") {
                include "bukudelete.php";
            } elseif ($_GET["p"] == "penerbit") {
                include "penerbit.php";
            } elseif ($_GET["p"] == "penerbitadd") {
                include "penerbitadd.php";
            } elseif ($_GET["p"] == "penerbitedit") {
                include "penerbitedit.php";
            } elseif ($_GET["p"] == "penerbitdelete") {
                include "penerbitdelete.php";
            } else {
                include "home.php";
            }
        ?>

        <div class="footer">Copyright &copy; Muhammad Yasir 2021</div>
    </div>

</body>
</html>