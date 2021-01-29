<?php 
    include "connection.php";
    $sql_gejala = mysqli_query($conn, "DELETE FROM gejala WHERE id_gejala='$_GET[idg]'");
    if ($sql_gejala) {
        echo "
            <script>
                alert('DATA DELETED SUCCESSFULLY');
            </script>
        ";
    } else {
        echo "
            <script>
                alert('DATA FAILED TO DELETE');
            </script>
        ";
    }
    echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=gejala'>";
?>