<form name="" method="post" action="" enctype="multipart/form-data">
    <!-- Menampung value question ke array $question -->
    <?php 
        include "connection.php";

        $sql_question = mysqli_query($conn, "SELECT * FROM questions");
        $jumlah_data_quest = mysqli_num_rows($sql_question);

        $no=0; 
        $question = array();
        while ($rq = mysqli_fetch_array($sql_question)) {
            // echo "$no "; var_dump($rq["question"]); echo "<br>";
            $question[$no] = $rq["question"];
            // echo "$question[$no]<br>";
            $no++;
        }
    ?>

    <!-- Menampilkan seluruh pertanyaan terkait gejala beserta form untuk menjawab -->
    <?php for ($i=0; $i < $jumlah_data_quest; $i++) : ?>

        <div class="dh12">
            <div class="question">
                <div class="questionbox">
                    <?php echo "$question[$i]"."<br>"; ?>
                </div>
                
                <div class="answerbox">
                    <?php $name = "CF".$i; ?>
                        <input type="radio" id="0" class="form-radio" name="<?php echo "$name"; ?>" value="0.0">
                        <input type="radio" id="1" class="form-radio" name="<?php echo "$name"; ?>" value="0.1">
                        <input type="radio" id="2" class="form-radio" name="<?php echo "$name"; ?>" value="0.2">
                        <input type="radio" id="3" class="form-radio" name="<?php echo "$name"; ?>" value="0.3">
                        <input type="radio" id="4" class="form-radio" name="<?php echo "$name"; ?>" value="0.4">
                        <input type="radio" id="5" class="form-radio" name="<?php echo "$name"; ?>" value="0.5">
                        <input type="radio" id="6" class="form-radio" name="<?php echo "$name"; ?>" value="0.6">
                        <input type="radio" id="7" class="form-radio" name="<?php echo "$name"; ?>" value="0.7">
                        <input type="radio" id="8" class="form-radio" name="<?php echo "$name"; ?>" value="0.8">
                        <input type="radio" id="9" class="form-radio" name="<?php echo "$name"; ?>" value="0.9">
                        <input type="radio" id="10" class="form-radio" name="<?php echo "$name"; ?>" value="1.0">
                    <?php // $j = $i +1; echo "CF".$j; ?> <!-- debug -->
                </div>
            </div>
        </div>
    <?php endfor; ?>
    <div class="tombol">
    <input type="submit" class="diag" name="diagnosa" value="DIAGNOSA">
    </div>
</form>