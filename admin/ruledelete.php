<?php 
    include "connection.php";
    $sql_rule = mysqli_query($conn, "DELETE FROM rule WHERE id_rule='$_GET[idr]'");
    if ($sql_rule) {
        echo "
            <script>
                alert('DATA DELETED SUCCESSFULLY');
            </script>
        ";
    } else {
        echo "
            <script>
                alert('DATA DELETED SUCCESSFULLY');
            </script>
        ";
    }
    echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=rule'>";
?>