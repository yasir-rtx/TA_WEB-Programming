<form name="" method="post" action="" enctype="multipart/form-data">
    <input type="text" name="code" placeholder="Kode Gejala...">
    <textarea name="gejala" id="gejala"></textarea>
    <input type="submit" name="save" value="SAVE">
</form>

<?php 
    if ($_POST["save"]) {
        include "connection.php";
        if (isset($_POST["code"]) && isset($_POST["gejala"])) {
            $code = $_POST["code"];
            $gejala = $_POST["gejala"];
        }

        if (!empty($code) && !empty($gejala)) {
            $sql_gejala = mysqli_query($conn, "INSERT INTO gejala VALUES ('', '$code', '$gejala')");
            if ($sql_gejala) {
                echo "
                    <script>
                        alert('DATA ADDED SUCCESSFULLY');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=gejala'>
                ";
            } else {
                echo "
                    <script>
                        alert('DATA FAILED TO BE ADDED');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=gejalaadd'>
                ";
            }
        } else {
            echo "
                    <script>
                        alert('INCOMPLETE DATA');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=gejalaadd'>
                ";
        }
    }
?>