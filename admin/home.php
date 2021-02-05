<?php 
    $sql_gejala = mysqli_query($conn, "SELECT * FROM gejala");
    $rowg = mysqli_num_rows($sql_gejala);

    $sql_penyakit = mysqli_query($conn, "SELECT * FROM penyakit");
    $rowp = mysqli_num_rows($sql_penyakit);

    $sql_question = mysqli_query($conn, "SELECT * FROM questions");
    $rowq = mysqli_num_rows($sql_question);

    $sql_rule = mysqli_query($conn, "SELECT * FROM rule");
    $rowr = mysqli_num_rows($sql_rule);
?>

<div class="grid">
    <div class="dh3">
       <a href="?p=gejala">
            <div class="box">
                <p>GEJALA</p>
                <h3><?php echo "$rowg"; ?></h3>
            </div>
       </a>
    </div>

    <div class="dh3">
       <a href="?p=penyakit">
            <div class="box">
                <p>PENYAKIT</p>
                 <h3><?php echo "$rowp"; ?></h3>
            </div>
       </a>
    </div>

    <div class="dh3">
       <a href="?p=question">
            <div class="box">
                <p>PERTANYAAN</p>
                 <h3><?php echo "$rowq"; ?></h3>
            </div>
       </a>
    </div>

    <div class="dh3">
       <a href="?p=rule">
            <div class="box">
                <p>RULE</p>
                 <h3><?php echo "$rowr"; ?></h3>
            </div>
       </a>
    </div>
</div>