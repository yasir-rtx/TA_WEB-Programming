<?php 
    include "connection.php";
    include "konsultasi.php";
    /* Menentukan nilai CF setiap rule berdasarkan tabel rule dan penyakit (rule/pasien_penyakit) : */
        $sql_rule = mysqli_query($conn, "SELECT * FROM rule");
        $sql_penyakit = mysqli_query($conn, "SELECT * FROM penyakit");
        $jumlah_pasien_rule = mysqli_num_rows($sql_rule);
        $jumlah_pasien_penyakit = mysqli_num_rows($sql_penyakit);
        
        // Menampung value pasien dari tabel penyakit ke array $pasien_penyakit[]
        $pasien_penyakit = array();
        for ($j=0; $j < $jumlah_pasien_penyakit; $j++) { 
            $rp = mysqli_fetch_array($sql_penyakit);
            $pasien_rule[$j] = $rp["pasien"];
            // echo "$pasien_rule[$j]<br>"; // debug
        }

        // Menentukan nilai CF setiap rule
        $CF_rule = array();
        for ($i=0; $i < $jumlah_pasien_rule; $i++) { 
            $rr = mysqli_fetch_array($sql_rule);
            
            // CF P01
            if (($rr["id_penyakit"] == 1) && $i<3) {
                // var_dump($rr["id_penyakit"]); var_dump($rr["pasien"]); echo "<br>"; // debug
                $CF_sementara= $rr["pasien"] / $pasien_rule[0];
                $CF_rule[$i] = round($CF_sementara,4);
                // echo "$CF_rule[$i]<br>"; // Debug nilai cf_rule
            }
            
            // CF P02
            if (($rr["id_penyakit"] == 2) && $i>2 && $i<6) {
                // var_dump($rr["id_penyakit"]); var_dump($rr["pasien"]); echo "<br>"; // debug
                $CF_sementara= $rr["pasien"] / $pasien_rule[1];
                $CF_rule[$i] = round($CF_sementara,4);
                // echo "$CF_rule[$i]<br>"; // Debug nilai cf_rule
            }

            // CF P03
            if (($rr["id_penyakit"] == 3) && $i>5 && $i<9) {
                // var_dump($rr["id_penyakit"]); var_dump($rr["pasien"]); echo "<br>"; // debug
                $CF_sementara= $rr["pasien"] / $pasien_rule[2];
                $CF_rule[$i] = round($CF_sementara,4);
                // echo "$CF_rule[$i]<br>"; // Debug nilai cf_rule
            }
        }

    /* Menampung nilai CF_user ke variabel array $G */
    for ($i=0; $i < $jumlah_data_quest; $i++) { 
        $j = $i +1;
        $G[$j] = $CF_user[$i] ;
        // echo "G".$j." $CF_user[$i]"."<br>";
    }

    /* Certainty Factor Process : */
        // Rule 01 : IF G03 AND G04 AND G06 AND G09 AND G15 THEN P01
        $CF01 = min($G[3],$G[4],$G[6],$G[9],$G[15]) * $CF_rule[0];
        // echo "CF01 "." $CF01<br>";

        // Rule 02 : IF G03 AND G06 AND G15 AND G19 THEN P01
        $CF02 = min($G[3],$G[6],$G[15],$G[19]) * $CF_rule[1];
        // echo "CF02 "." $CF02<br>";

        // Rule 03 : IF G03 AND G04 AND G09 AND G12 AND G18 THEN P01
        $CF03 = min($G[3],$G[4],$G[9],$G[12],$G[18]) * $CF_rule[2];
        // echo "CF03 "." $CF03<br>";

        // Rule 04 : IF G02 AND G03 AND G04 AND G08 THEN P02
        $CF04 = min($G[2],$G[3],$G[4],$G[8]) *$CF_rule[3];
        // echo "CF04 "." $CF04<br>";

        // Rule 05 : IF G03 AND G04 AND G07 AND G16 THEN P02
        $CF05 = min($G[3],$G[4],$G[7],$G[16]) *$CF_rule[4];
        // echo "CF05 "." $CF05<br>";

        // Rule 06 : IF G03 AND G05 AND G06 AND G10 AND G11 THEN P02
        $CF06 = min($G[3],$G[5],$G[6],$G[10],$G[11]) * $CF_rule[5];
        // echo "CF06 "." $CF06<br>";

        // Rule 07 : IF G01 AND G06 AND G14 AND G16 AND G17 THEN P03
        $CF07 = min($G[1],$G[6],$G[14],$G[16],$G[17]) * $CF_rule[6];
        // echo "CF07 "." $CF07<br>";

        // Rule 08 : IF G01 AND G04 AND G16 AND G17 THEN P03
        $CF08 = min($G[1],$G[4],$G[16],$G[17]) * $CF_rule[7];
        // echo "CF08 "." $CF08<br>";

        // Rule 09 : IF G01 AND G04 G11 AND G13 THEN P03
        $CF09 = min($G[1],$G[4],$G[11],$G[13]) * $CF_rule[8];
        // echo "CF09 "." $CF09<br>";
        
    /* Menggabungkan CF yang penyakitnya sama */
        /* CF P01 => CF01,CF02,CF03 : */
            $CF_P01 = $CF01 + $CF02 * (1 - $CF01);
            $CF_P01 = $CF_P01 + $CF03 * (1 - $CF_P01);
            $CF_P01 = round($CF_P01,4);
            // echo "$CF_P01<br>"; // debug
            $CF_P01 = $CF_P01 * 100;
            // echo "$CF_P01<br>"; // debug

        /* CF P02 => CF04,CF05,CF06 : */
            $CF_P02 = $CF04 + $CF05 * (1- $CF04);
            $CF_P02 = $CF_P02 + $CF06 * (1 - $CF_P02);
            $CF_P02 = round($CF_P02,4);
            // echo "$CF_P02<br>"; // debug
            $CF_P02 = $CF_P02 * 100;
            // echo "$CF_P02<br>"; // debug


        /* CF P03 => CF07,CF08,CF09 : */
            $CF_P03 = $CF7 + $CF8 * (1 - $CF7);
            $CF_P03 = $CF_P03 + $CF9 * (1 - $CF_P03);
            $CF_P03 = round($CF_P03,4);
            // echo "$CF_P03<br>"; // debug
            $CF_P03 = $CF_P03 * 100;
            // echo "$CF_P03<br>"; // debug

    /* Menyimpan Hasil ke database */
    $sql_history = mysqli_query($conn, "INSERT INTO history VALUES ('', '', NOW(), '$CF_P01', '$CF_P02', '$CF_P03')");

    
?>