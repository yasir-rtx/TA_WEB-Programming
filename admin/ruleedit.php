<?php 
    include "connection.php";
    $sql_rule = mysqli_query($conn, "SELECT * FROM rule WHERE id_rule='$_GET[idr]'");
    $rr = mysqli_fetch_array($sql_rule);
?>

<fieldset>
    <form name="" method="post" action="" enctype="multipart/form-data">
    <h1>EDIT RULE</h1>
        <input type="text" name="code" value="<?php echo "$rr[kode_rule]"; ?>">
        <textarea name="rule" id="rule"><?php echo "$rr[rule]"; ?></textarea>

        <!-- input id_penyakit -->
        <?php 
            include "connection.php";
            $sql_penyakit = mysqli_query($conn, "SELECT * FROM penyakit ORDER BY kode_penyakit ASC");
        ?>
        <select name="id_penyakit">
            <option value="">PENYAKIT</option>
            <?php while ($rp = mysqli_fetch_array($sql_penyakit)) : ?>
                <option value="<?php echo "$rp[id_penyakit]"; ?>"><?php echo "$rp[kode_penyakit] | $rp[penyakit]"; ?></option>
            <?php endwhile; ?>
        </select>

        <input type="text" name="pasien" value="<?php echo "$rr[pasien]"; ?>"><br>
        <input type="submit" name="save" value="EDIT">
    </form>
</fieldset>

<?php 
    if ($_POST["save"]) {
        include "connection.php";
        if (isset($_POST["code"]) && isset($_POST["rule"]) && isset($_POST["pasien"])) {
            $code = $_POST["code"];
            $rule = $_POST["rule"];
            $id_penyakit = $_POST["id_penyakit"];
            $pasien = $_POST["pasien"];
        }

        if (!empty($code) && !empty($rule) && !empty($pasien)) {
            $sql_rule = mysqli_query($conn, "UPDATE rule SET kode_rule='$code', rule='$rule', id_penyakit='$id_penyakit', pasien='$pasien' WHERE id_rule='$_GET[idr]'");
            if ($sql_rule) {
                echo "
                    <script>
                        alert('DATA HAS BEEN CHANGED SUCCESFULLY');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=rule'>
                ";
            } else {
                echo "
                    <script>
                        alert('DATA has FAILED TO CHANGE');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=rule'>
                ";
            }
        } else {
            echo "
                    <script>
                        alert('INCOMPLETE DATA');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=ruleedit'>
            ";
        }
    }
?>