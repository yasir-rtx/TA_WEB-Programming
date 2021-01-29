
<?php 
include "connection.php";
    // Menentukan nilai CF setiap rule berdasarkan tabel rule dan penyakit (rule/pasien_penyakit)
        // $sql_rule = mysqli_query($conn, "SELECT * FROM rule");
        // $jumlah_pasien_rule = mysqli_num_rows($sql_rule); // Menghitung jumlah data dalam table rule
        // $pasien_rule = array(); // Menyediakan array kosong untuk menampung value pasien dari table rule
        // // Proses pemindahan value pasien ke array
        // for ($i=0; $i < $jumlah_pasien_rule; $i++) { 
        //     $rr = mysqli_fetch_array($sql_rule);
        //     $pasien_rule[$i] = $rr["pasien"];
        //     // echo "$pasien_rule[$i]<br>"; //Debug value pasien
        // }
        // // var_dump($pasien_rule); echo "<br>"; // debug array pasien_rule
        

        // $sql_penyakit = mysqli_query($conn, "SELECT * FROM penyakit");
        // $jumlah_pasien_penyakit = mysqli_num_rows($sql_penyakit);
        // $pasien_penyakit = array();
        // for ($i=0; $i < $jumlah_pasien_penyakit; $i++) { 
        //     $rp = mysqli_fetch_array($sql_penyakit);
        //     $pasien_penyakit[$i] = $rp["pasien"];
        //     // echo "$pasien_penyakit[$i]<br>"; // Debug
        // }
        // // var_dump($pasien_penyakit); echo "<br>"; // debug array pasien_penyakit

        // // Inisiasi Proses pencarian CF
        // $CF = array();
        // // for ($i=0; $i < $jumlah_pasien_rule; $i++) { 
        // //     $rr = mysqli_fetch_array($sql_rule);
        // //     // var_dump($pasien_rule[$i]);echo "<br>"; // Debug

        // //     for ($j=0; $j < $jumlah_pasien_penyakit; $j++) { 
        // //         $rp = mysqli_fetch_array($sql_penyakit);
        // //         var_dump($pasien_penyakit[$j]);echo "<br>";

        // //         if ($rr["id_penyakit"] == $rp["id_penyakit"]) {
        // //             $CF[$j] = $rr["pasien"] / $rp["pasien"];
        // //         }

        // //     }

        // //     echo "<br>";
        // //     // var_dump($CF[$j]);echo "<br>"; //debug
        // // }

        $CF = array();
        $sql_rule = mysqli_query($conn, "SELECT * FROM rule");
        $sql_penyakit = mysqli_query($conn, "SELECT * FROM penyakit");
        $jumlah_pasien_rule = mysqli_num_rows($sql_rule);
        $jumlah_pasien_penyakit = mysqli_num_rows($sql_penyakit);
        
        
        $pasien_penyakit = array();
        for ($j=0; $j < $jumlah_pasien_penyakit; $j++) { 
            $rp = mysqli_fetch_array($sql_penyakit);
            $pasien_rule[$j] = $rp["pasien"];
            // echo "$pasien_rule[$j]<br>"; // debug
        }

        for ($i=0; $i < $jumlah_pasien_rule; $i++) { 
            $rr = mysqli_fetch_array($sql_rule);
            $rp = mysqli_fetch_array($sql_penyakit);
            
            

            if ($rr["id_penyakit"] == 1) {
                // var_dump($rr["id_penyakit"]);echo "<br>"; // debug
                $CF[$i] = $rr["pasien"] / $rp["pasien"];
                echo "$CF[$i]<br>";
            }

            // if ($rr["id_penyakit"] == 2) {
            //     // var_dump($rr["id_penyakit"]);echo "<br>"; // debug

            // }
            // if ($rr["id_penyakit"] == 3) {
            //     // var_dump($rr["id_penyakit"]);echo "<br>"; // debug

            // }
        }

    // Rule
?>