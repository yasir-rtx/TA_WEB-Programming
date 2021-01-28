<?php 
    $sqlpenerbit = mysqli_query($conn, "DELETE FROM penerbit WHERE id_penerbit='$_GET[idp]'");
    if ($sqlpenerbit) {
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
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=penerbit'>";
?>