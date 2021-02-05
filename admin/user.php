<?php 
    session_start();
    include "connection.php";

    $sql_user = mysqli_query($conn, "SELECT * FROM user ORDER BY terdaftar");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>HASIL</title>
</head>
<body>
    <div class="hasil">
        <table>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>JK</th>
                <th>EMAIL</th>
                <th>NOHP</th>
                <th>RIWAYAT</th>
                <th>TERDAFTAR</th>
            </tr>
            <?php $no=1; while ($user = mysqli_fetch_array($sql_user)) : ?>
                <tr>
                    <td><?php echo "$no"; ?></td>
                    <td><?php echo "$user[name]"; ?></td>
                    <td><?php echo "$user[username]"; ?></td>
                    <td><?php echo "$user[password]"; ?></td>
                    <td><?php echo "$user[jk]"; ?></td>
                    <td><?php echo "$user[email]"; ?></td>
                    <td><?php echo "$user[nohp]"; ?></td>
                    <td><a href="?p=history&id=<?php echo "$user[id_user]"; ?>">Riwayat</a></td>
                    <td><?php echo "$user[terdaftar]"; ?></td>
                </tr>
                <?php $no++; ?>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>