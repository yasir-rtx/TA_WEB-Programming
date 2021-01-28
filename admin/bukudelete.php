<?php 
    $sqlbuku = mysqli_query($conn, "DELETE FROM buku WHERE id_buku='$_GET[idb]'");
    if ($sqlbuku) {
        echo "
                <script>
                    alert('DATA BERHASIL DIHAPUS');
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('DATA GAGAL DIHAPUS!!!');
                </script>
            ";
    }
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=buku'>";
?>