<?php 
    $sqlbuku = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$_GET[idb]'");
    $rb = mysqli_fetch_array($sqlbuku);
?>

<form name="" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo "$rb[id_buku]"; ?>">
    <table>  
        <tr>
            <td><label for="isbn">ISBN</label></td>
            <td> : </td>
            <td><input type="text" name="isbn" value="<?php echo "$rb[isbn]"; ?>"></td>
        </tr>

        <tr>
            <td><label for="judul">Judul</label></td>
            <td> : </td>
            <td><input type="text" name="judul" value="<?php echo "$rb[judul]"; ?>"></td>
        </tr>

        <tr>
            <td><label for="pengarang">Pengarang</label></td>
            <td> : </td>
            <td><input type="text" name="pengarang" value="<?php echo "$rb[pengarang]"; ?>"></td>
        </tr>

        <tr>
            <td><label for="penerbit">Penerbit</label></td>
            <td> : </td>
            <td><input type="text" name="penerbit" value="<?php echo "$rb[penerbit]"; ?>"></td>
        </tr>

        <tr>
            <td><label for="tahun">Tahun</label></td>
            <td> : </td>
            <td><input type="text" name="tahun" value="<?php echo "$rb[tahun]"; ?>"></td>
        </tr>

        <tr>
            <td><label for="stok">Stok</label></td>
            <td> : </td>
            <td><input type="text" name="stok" value="<?php echo "$rb[stok]"; ?>"></td>
        </tr>
    </table>
        
    <input type="submit" name="edit" value="UBAH">
</form>

<?php 
    $isbn = $_POST["isbn"];
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $tahun = $_POST["tahun"];
    $stok = $_POST["stok"];
    if ($_POST["edit"]) {
        include "connection.php";
        $sqlbuku = mysqli_query($conn, "UPDATE buku SET isbn='$isbn',
                                                        judul='$judul',
                                                        pengarang='$pengarang',
                                                        penerbit='$penerbit',
                                                        tahun='$tahun',
                                                        stok='$stok'
                                        WHERE id_buku='$_POST[id]'");;
        if($sqlbuku){
            echo "
                <script>
                    alert('Data BERHASIL diubah!');
                </script>
            ";
		}
		else {
			echo "
                <script>
                    alert('Data GAGAL diubah!!!');
                </script>
            ";
		}
		echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=buku'>";
    }
?>