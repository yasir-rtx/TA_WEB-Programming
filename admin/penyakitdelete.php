<?php 
    include "connection.php";
    $sql_penyakit = mysqli_query($conn, "DELETE FROM penyakit WHERE id_penyakit='$_GET[idp]'");
    if ($sql_penyakit) {
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
    echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=penyakit'>";
?>