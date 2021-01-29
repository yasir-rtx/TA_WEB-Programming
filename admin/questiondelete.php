<?php 
    $sql_question = mysqli_query($conn, "DELETE FROM questions WHERE id_question='$_GET[idq]'");
    if ($sql_question) {
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
    echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=question'>";
?>