<fieldset>
    <form name="" method="post" action="" enctype="multipart/form-data">
    <h1>TAMBAH PENYAKIT</h1>
        <input type="text" name="code" placeholder="Kode Penyakit...">
        <textarea name="penyakit" id="penyakit"></textarea>
        <input type="text" name="pasien" placeholder="Jumlah Pasien...">
        <input type="submit" name="save" value="SAVE">
    </form>
</fieldset>

<?php 
    if ($_POST["save"]) {
        include "connection.php";
        if (isset($_POST["code"]) && isset($_POST["penyakit"]) && isset($_POST["pasien"])) {
            $code = $_POST["code"];
            $penyakit = $_POST["penyakit"];
            $pasien = $_POST["pasien"];
        }

        if (!empty($code) && !empty($penyakit) && !empty($pasien)) {
            $sql_penyakit = mysqli_query($conn, "INSERT INTO penyakit VALUES ('', '$code', '$penyakit', '$pasien')");
            if ($sql_penyakit) {
                echo "
                    <script>
                        alert('DATA ADDED SUCCESSFULLY');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=penyakit'>
                ";
            } else {
                echo "
                    <script>
                        alert('DATA FAILED TO BE ADDED');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=penyakitadd'>
                ";
            }
        } else {
            echo "
                    <script>
                        alert('INCOMPLETE DATA');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=penyakitadd'>
                ";
        }
    }
?>