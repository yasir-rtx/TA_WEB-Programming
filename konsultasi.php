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
        <?php echo "$question[$i]"."<br>"; ?>
        <?php $name = "CF".$i; ?>
        <input type="radio" id="1" name="<?php echo "$name"; ?>" value="0.0">
        <input type="radio" id="2" name="<?php echo "$name"; ?>" value="0.1">
        <input type="radio" id="3" name="<?php echo "$name"; ?>" value="0.2">
        <input type="radio" id="0" name="<?php echo "$name"; ?>" value="0.3">
        <input type="radio" id="4" name="<?php echo "$name"; ?>" value="0.4">
        <input type="radio" id="5" name="<?php echo "$name"; ?>" value="0.5">
        <input type="radio" id="6" name="<?php echo "$name"; ?>" value="0.6">
        <input type="radio" id="7" name="<?php echo "$name"; ?>" value="0.7">
        <input type="radio" id="8" name="<?php echo "$name"; ?>" value="0.8">
        <input type="radio" id="9" name="<?php echo "$name"; ?>" value="0.9">
        <input type="radio" id="10" name="<?php echo "$name"; ?>" value="1.0">
        <?php // $j = $i +1; echo "CF".$j; ?> <!-- debug -->
        <?php echo "<br>"; ?>
    <?php endfor; ?>
    <input type="submit" name="diagnosa" value="DIAGNOSA">
</form>

<?php 
    /* Menampung nilai CF dari user ke array $CF_user */
    if (isset($_POST["diagnosa"])) {
        $CF_user = array();
        for ($i=0; $i < $jumlah_data_quest; $i++) { 
            $CF_user[$i] = $_POST["CF".$i];
            $j = $i +1;
            // echo "$CF_user[$i]"." CF".$j."<br>";
        }
    }
?>