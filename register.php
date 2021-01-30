<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleregister.css">
    <title>REGISTRASI</title>
</head>
<body>
    <div class="card">
        <div class="cardbody">
            <div class="cardhead">SIGNUP</div>
                <form name="" method="post" action="" enctype="multipart/form-data">
                    <input type="text" name="username" placeholder="Username..." maxlength="20" required>
                    <input type="password" name="password" placeholder="Password..." maxlength="16" required>
                    <input type="password" name="password2" placeholder="Confirm Password..." maxlength="16" required>
                    <input type="text" name="name" placeholder="Name..." required><br>
                    <div class="radio">
                        <input type="radio" name="jk" id="l" value="l" required><label for="l">Laki-laki</label>
                        <input type="radio" name="jk" id="p" value="p" required><label for="p">Perempuan</label>
                    </div>
                    <input type="text" name="email" placeholder="Email..." required>
                    <input type="text" name="nohp" placeholder="No Handphone..." maxlength="12" required><br><br>
                    <button type="submit" name="signup">SIGNUP</button>
                </form>

                <?php 
                    include "connection.php";
                    if (isset($_POST["signup"])) {
                        $username = strtolower(stripslashes($_POST["username"]));
                        $password = $_POST["password"];
                        $password2 = $_POST["password2"];
                        $name = $_POST["name"];
                        $jk = $_POST["jk"];
                        $email = $_POST["email"];
                        $nohp = $_POST["nohp"];

                        // Cek username
                        $sql_user = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
                        if (mysqli_fetch_assoc($sql_user)) {
                            echo "
                                <script>
                                    alert('USERNAME SUDAH TERDAFTAR!');
                                </script>
                            "; exit;
                        }

                        // Cek password
                        if ($password != $password2) {
                            echo "
                                <script>
                                    alert('Password tidak sesuai!!!');
                                </script>
                            "; exit;
                        }

                        // cek name, jk, email, hohp
                        if (empty($name) && empty($jk) && empty($email) && empty($nohp)) {
                            echo "
                                <script>
                                    alert('DATA TIDAK LENGKAP');
                                </script>
                            "; exit;
                        }

                        $sql_user = mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password', '$name', '$jk', '$email', '$nohp', NOW())");

                        if ($sql_user) {
                            echo "
                                <script>
                                    alert('REGISTRASI BERHASIL');
                                </script>
                                <META HTTP-EQUIV='Refresh' Content='0; URL=index.php'>;
                            ";
                        } else {
                                echo "
                                <script>
                                    alert('REGISTRASI GAGAL');
                                </script>
                            ";
                        }
                    } 
                ?>
        </div>
    </div>
</body>
</html>