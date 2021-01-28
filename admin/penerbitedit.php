<?php 
    $sqlpenerbit = mysqli_query($conn, "SELECT * FROM penerbit WHERE id_penerbit='$_GET[idp]'");
    $rp = mysqli_fetch_array($sqlpenerbit);
?>

<form name="" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_penerbit" value="<?php echo "$rp[id_penerbit]"; ?>">

    <input type="text" name="nama" placeholder="Nama..." value="<?php echo "$rp[nama]"; ?>">
    <input type="text" name="alamat" placeholder="Alamat..." value="<?php echo "$rp[alamat]"; ?>">
    <input type="file" name="logo" placeholder="" value="<?php echo "$rp[logo]"; ?>">
    <input type="submit" name="ubah" value="UBAH">
</form>

<?php 
    if ($_POST["ubah"]) {
        include "connection.php";

        $nmfoto = $_FILES["logo"]["name"];
        $lokfoto = $_FILES["logo"]["tmp_name"];
        if (!empty($lokfoto)) {
            move_uploaded_file($lokfoto, "img/penerbit/$nmfoto");
            $logo = ", loho='$nmfoto'";
        } else {
            $logo = "";
        }

        $sqlpenerbit = mysqli_query($conn, "UPDATE penerbit SET nama='$_POST[nama]',
                                                                alamat='$_POST[alamat]'
                                                                $logo
                                            WHERE id_penerbit='$_POST[id_penerbit]'");
        if($sqlpenerbit){
			echo "
                <script>
                    alert('DATA BERHASIL DIUBAH');
                </script>
            ";
		}
		else {
			echo "
                <script>
                    alert('DATA GAGAL DIUBAH');
                </script>
            ";
		}
		echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=penerbit'>";
    }
?>