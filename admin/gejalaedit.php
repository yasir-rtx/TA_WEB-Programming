<?php 
    include "connection.php";
    $sql_gejala = mysqli_query($conn, "SELECT * FROM gejala WHERE id_gejala='$_GET[idg]'");
    $rg = mysqli_fetch_array($sql_gejala);
?>
<form name="" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo "$rg[id_gejala]"; ?>">
    <input type="text" name="code" value="<?php echo "$rg[kode_gejala]"; ?>">
    <textarea name="gejala" id="gejala"><?php echo "$rg[gejala]"; ?></textarea>
    <input type="submit" name="edit" value="EDIT">
</form>

<?php 
    if ($_POST["edit"]) {
        include "connection.php";
        if (isset($_POST["id"]) && isset($_POST["code"]) && isset($_POST["gejala"])) {
            $id = $_POST["id"];
            $code = $_POST["code"];
            $gejala = $_POST["gejala"];
        }

        if (!empty($code) && !empty($gejala)) {
            $sql_gejala = mysqli_query($conn, "UPDATE gejala SET kode_gejala='$code', gejala='$gejala' WHERE id_gejala='$id'");
            if ($sql_gejala) {
                echo "
                    <script>
                        alert('DATA HAS BEEN CHANGED SUCCESFULLY');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=gejala'>
                ";
            } else {
                echo "
                    <script>
                        alert('DATA has FAILED TO CHANGE');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=gejala'>
                ";
            }
        } else {
            echo "
                    <script>
                        alert('INCOMPLETE DATA');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=gejalaedit'>
            ";
        }
    }
?>