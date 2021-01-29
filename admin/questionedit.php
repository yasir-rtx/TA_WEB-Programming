<?php 
    include "connection.php";
    $sql_question = mysqli_query($conn, "SELECT * FROM questions WHERE id_quest='$_GET[idq]'");
    $rq = mysqli_fetch_array($sql_question);
?>

<form name="" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo "$rq[id_quest]"; ?>">
    <input type="text" name="code" value="<?php echo "$rq[kode_quest]"; ?>">
    <textarea name="question" id="question"><?php echo "$rq[question]"; ?></textarea>
    <input type="submit" name="edit" value="EDIT">
</form>

<?php 
    if ($_POST["edit"]) {
        include "connection.php";
        if (isset($_POST["id"]) &&isset($_POST["code"]) && isset($_POST["question"])) {
            $id = $_POST["id"];
            $code = $_POST["code"];
            $quest = $_POST["question"];
        }

        if (!empty($id) && !empty($code) && !empty($quest)) {
            $sql_question = mysqli_query($conn, "UPDATE questions SET kode_quest='$code', question='$quest' WHERE id_quest='$id'");
            if ($sql_question) {
                echo "
                    <script>
                        alert('DATA HAS BEEN CHANGED SUCCESSFULLY');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=question'>
                ";
            } else {
                echo "
                    <script>
                        alert('DATA HAS FAILED TO CHANGED');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=question'>
                ";
            }
        } else {
            echo "
                    <script>
                        alert('INCOMPLETE DATA');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=questionedit'>
                ";
        }
    }
?>