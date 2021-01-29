<form name="" method="post" action="" enctype="multipart/form-data">
    <input type="text" name="code" placeholder="Kode Pertanyaan">
    <textarea name="question" id="question"></textarea>
    <input type="submit" name="save" value="SAVE">
</form>

<?php 
    if ($_POST["save"]) {
        // if (isset($_POST["code"]) && isset($_POST["question"])) {
            $code = $_POST["code"];
            $quest = $_POST["question"];
        // }

        // if (!empty($code) && !empty($quest)) {
            $sql_pertanyaan = mysqli_query($conn, "INSERT INTO questions (kode_quest, question) VALUES ('$code', '$quest')");
            if ($sql_pertanyaan) {
                echo "
                    <script>
                        alert('DATA ADDED SUCCESSFULLY');
                        document.location.href = 'question.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('DATA FAILED TO BE ADDED');
                        document.location.href = 'questionadd.php';
                    </script>
                ";
            }
        // } else {
        //     echo "
        //             <script>
        //                 alert('INCOMPLETE DATA');
        //                 document.location.href = 'questionadd.php';
        //             </script>
        //         ";
        // }
    }
?>