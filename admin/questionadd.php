<fieldset>
    <form name="" method="post" action="" enctype="multipart/form-data">
    <h1>TAMBAH PERTANYAAN</h1>
        <input type="text" name="code" placeholder="Kode Pertanyaan" autofocus>
        <textarea name="question" id="question"></textarea>
        <br>
        <input type="submit" name="save" value="SAVE">
    </form>
</fieldset>

<?php 
    if ($_POST["save"]) {
        include "connection.php";
        if (isset($_POST["code"]) && isset($_POST["question"])) {
            $code = $_POST["code"];
            $quest = $_POST["question"];
        }

        if (!empty($code) && !empty($quest)) {
            $sql_question = mysqli_query($conn, "INSERT INTO questions VALUES ('', '$code', '$quest')");
            if ($sql_question) {
                echo "
                    <script>
                        alert('DATA ADDED SUCCESSFULLY');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=question'>
                ";
            } else {
                echo "
                    <script>
                        alert('DATA FAILED TO BE ADDED');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=questionadd'>
                ";
            }
        } else {
            echo "
                    <script>
                        alert('INCOMPLETE DATA');
                    </script>
                    <META HTTP-EQUIV='Refresh' Content='0; URL=?p=questionadd'>
                ";
        }
    }
?>