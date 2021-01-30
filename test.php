<form name="" method="post" action="" enctype="multipart/form-data">
    <?php for ($i=0; $i < 3; $i++) : ?>
        <?php echo "CF".$i; ?>
        <?php $name = "cf".$i; ?>
        <input type="radio" id="1" name="<?php echo "$name"; ?>" value="0.1">
        <input type="radio" id="2" name="<?php echo "$name"; ?>" value="0.2">
        <input type="radio" id="3" name="<?php echo "$name"; ?>" value="0.3">
        <?php echo "<br>"; ?>
    <?php endfor; ?>
    <input type="submit" name="tampil" value="tampil">
</form>

<?php 
    if (isset($_POST["tampil"])) {
        $cf = array();
        for ($i=0; $i < 3; $i++) { 
            $cf[$i] = $_POST["cf".$i];
            echo "CF".$i." $cf[$i]<br>";
        }
    }
    echo min($cf[0],$cf[1],$cf[2]);
?>