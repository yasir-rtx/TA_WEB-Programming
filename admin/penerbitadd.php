<form name="" method="post" action="" enctype="multipart/form-data">
    <input type="text" name="nama" placeholder="Nama...">
    <input type="text" name="alamat" placeholder="Alamat...">
    <input type="file" name="logo" placeholder="">
    <input type="submit" name="tambah" value="TAMBAH">
</form>

<?php 
    if ($_POST["tambah"]) {
        include "connection.php";

        $nmfoto = $_FILES["logo"]["name"];
        $lokfoto = $_FILES["logo"]["tmp_name"];
        if (!empty($lokfoto)) {
            move_uploaded_file($lokfoto, "img/penerbit/$nmfoto");
        }

        $sqlpenerbit = mysqli_query($conn, "INSERT INTO penerbit VALUES ('', '$_POST[nama]', '$_POST[alamat]', '$nmfoto')");
        if($sqlpenerbit){
			echo "
                <script>
                    alert('DATA BERHASIL DITAMBAHKAN');
                </script>
            ";
		}
		else {
			echo "
                <script>
                    alert('DATA GAGAL DITAMBAHKAN');
                </script>
            ";
		}
		echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=penerbit'>";
    }
?>