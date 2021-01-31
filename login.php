<?php 
    session_start();
    // if (isset($_SESSION["login"])) {
    //     header("Location: index.php");
    //     exit;
    // }
    
    include "connection.php";

    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        /* Cek username */
        $sql_user = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

        if (mysqli_num_rows($sql_user) === 1) {
            /* Cek Password */
            $result = mysqli_fetch_array($sql_user);
            if ($password == $result["password"]) {
                /* Set Session */
                $_SESSION["login"] = true;
                $_SESSION["user"] = $username;
                $_SESSION["pass"] = $password;
                echo "
                    <script>
                        alert('YOU HAVE SUCCESSFULLY LOGGED IN');
                    </script>
                ";
                /* Mengarahkan ke index.php */
                echo "<META HTTP-EQUIV='Refresh' Content='0; URL=index.php'>";
                exit;
            }
        }
        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesignin.css">
    <title>Login</title>
</head>
<body>
    <div id="signin">
        <fieldset>
            <img src="img/accounts_user.png" alt="" width="120px">
            <form name="" method="post" action="" enctype="multipart/form-data">
                <h3>USER</h3>
                <p>Please login here...</p>

                <input type="text" name="username" placeholder="Username...">
                <input type="password" name="password" placeholder="Password...">
                <button type="submit" name="login">LOGIN</button>

                <?php if (isset($error)) : ?>
                    <p style="color: red; font-style: italic;">Username/Password SALAH</p>
                <?php endif; ?>
            </form>
        </fieldset>
    </div>
</body>
</html>