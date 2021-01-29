<form name="" method="post" action="" enctype="multipart/form-data">
    <input type="text" name="code" placeholder="Kode Rule...">
    <textarea name="rule" id="rule" placeholder="Gejala-gejala yang dimiliki penyakit..."></textarea>

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

    <input type="text" name="pasien" placeholder="Jumlah Pasien...">
    <input type="submit" name="save" value="SAVE">
</form>

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
            $sql_rule = mysqli_query($conn, "INSERT INTO rule VALUES ('', '$code', '$rule', '$id_penyakit', '$pasien')");
            if ($sql_rule) {
                echo "
                    <script>
                        alert('DATA ADDED SUCCESSFULLY');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=rule'>
                ";
            } else {
                echo "
                    <script>
                        alert('DATA FAILED TO BE ADDED');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=ruleadd'>
                ";
            }
        } else {
            echo "
                    <script>
                        alert('INCOMPLETE DATA');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=ruleadd'>
                ";
        }
    }
?>