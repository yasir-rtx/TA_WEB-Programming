<form name="" method="post" action="" enctype="multipart/form-data">
    <label for="isbn">ISBN</label>
    <input type="text" name="isbn">

    <label for="judul">Judul</label>
    <input type="text" name="judul">

    <label for="pengarang">Pengarang</label>
    <input type="text" name="pengarang">
    
    <?php $sqlpenerbit = mysqli_query($conn, "SELECT * FROM penerbit ORDER BY nama ASC"); ?>
    <select name="id_penerbit" id="id_penerbit">
        <option value="">Penerbit</option>
        <?php while ($rp = mysqli_fetch_array($sqlpenerbit)) : ?>
            <option value="$<?php echo "$rp[id_penerbit]"; ?>"><?php echo "$rp[nama]"; ?></option>
        <?php endwhile; ?>
    </select>

    <label for="tahun">Tahun</label>
    <input type="text" name="tahun">

    <label for="stok">Stok</label>
    <input type="text" name="stok">
        
    <input type="submit" name="tambah" value="TAMBAH">
</form>

<?php 
    if ($_POST["tambah"]) {
        include "connection.php";
        $sqlbuku = mysqli_query($conn, "INSERT INTO buku VALUES ('', '$_POST[isbn]', '$_POST[judul]', '$_POST[pengarang]', '$_POST[penerbit]', '$_POST[tahun]', '$_POST[stok]')");
        if($sqlbuku){
			echo "
                <script>
                    alert('DATA BERHASIL DITAMBAH');
                </script>
            ";
		}
		else {
			echo "
                <script>
                    alert('DATA GAGAL DITAMBAH');
                </script>
            ";
		}
		echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=buku'>";
    }
?>