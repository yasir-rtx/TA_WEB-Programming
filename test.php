<?php 
    $X1 = 108;
    $X2 = 738;
    $X3 = 982;

    $array = array(
        array( // 0
                  // 0
            "CF" => $X1,  // 1
            "id" => 1
        ),
        array( // 1
                  // 0
            "CF" => $X2,  // 1
            "id" => 2
        ),
        array( // 2
                  // 0
            "CF" => $X3,  // 1
            "id" => 3
        )
    );

    var_dump($array[0]);echo"<br>";
    var_dump($array[1]);echo"<br>";
    var_dump($array[2]);echo"<br>";

    rsort($array);
    var_dump($array);echo"<br>";echo"<br>";

    var_dump($array[0]);echo"<br>";
    var_dump($array[1]);echo"<br>";
    var_dump($array[2]);echo"<br>";echo"<br>";

    $id = $array[0]["id"];
    $cf = $array[0]["CF"];
    echo "Nilai tertinggi adalah $id dengan CF : $cf";
?>