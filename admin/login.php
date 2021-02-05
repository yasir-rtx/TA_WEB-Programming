<?php 
    error_reporting (E_ALL ^ E_NOTICE); 
    session_start();
    if (isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }

    if (isset($_POST["login"])) {
        include "connection.php";
        $sql_admin = mysqli_query($conn, "SELECT * FROM admin WHERE username='$_POST[username]' AND password='$_POST[password]'");
        $admin = mysqli_fetch_array($sql_admin);
        $row = mysqli_num_rows($sql_admin);
        
        if ($row > 0) {
            session_start();
            $_SESSION["login"] = true;
            $_SESSION["username"] = $admin["username"];
            $_SESSION["password"] = $admin["password"];
            echo "
                <script>
                    alert('YOU HAVE SUCCESSFULLY LOGGED IN');
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('YOU HAVE FAILED LOGGED IN');
                </script>
            ";
        }
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=index.php'>";
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
            <img src="../img/accounts_admin.png" alt="" width="120px">
            <form name="" method="post" action="" enctype="multipart/form-data">
                <h3>Administrator</h3>
                <p>Please login here...</p>

                <input type="text" name="username" placeholder="Username..." autofocus maxlength="16">
                <input type="password" name="password" placeholder="Password..." maxlength="16">
                <button type="submit" name="login">LOGIN</button>

                <?php if (isset($error)) : ?>
                    <p style="color: red; font-style: italic;">Username/Password SALAH</p>
                <?php endif; ?>
            </form>
        </fieldset>
    </div>
</body>
</html>