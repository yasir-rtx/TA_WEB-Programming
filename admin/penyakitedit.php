<?php 
    include "connection.php";
    $sql_penyakit = mysqli_query($conn, "SELECT * FROM penyakit WHERE id_penyakit='$_GET[idp]'");
    $rp = mysqli_fetch_array($sql_penyakit);
?>

<form name="" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo "$rp[id_penyakit]"; ?>">
    <input type="text" name="code" value="<?php echo "$rp[kode_penyakit]"; ?>">
    <textarea name="penyakit" id="penyakit"><?php echo "$rp[penyakit]"; ?></textarea>
    <input type="text" name="pasien" value="<?php echo "$rp[pasien]"; ?>">
    <input type="submit" name="save" value="SAVE">
</form>

<?php 
    if ($_POST["save"]) {
        include "connection.php";
        if (isset($_POST["code"]) && isset($_POST["penyakit"]) && isset($_POST["pasien"])) {
            $code = $_POST["code"];
            $penyakit = $_POST["penyakit"];
            $pasien = $_POST["pasien"];
        }

        if (!empty($code) && !empty($penyakit) && !empty($pasien)) {
            $sql_penyakit = mysqli_query($conn, "UPDATE penyakit SET kode_penyakit='$code', penyakit='$penyakit', pasien='$pasien' WHERE id_penyakit='$_GET[idp]'");
            if ($sql_penyakit) {
                echo "
                    <script>
                        alert('DATA HAS BEEN CHANGED SUCCESFULLY');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=penyakit'>
                ";
            } else {
                echo "
                    <script>
                        alert('DATA has FAILED TO CHANGE');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=penyakit'>
                ";
            }
        } else {
            echo "
                    <script>
                        alert('INCOMPLETE DATA');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=penyakitedit'>
            ";
        }
    }
?>