<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Oblivious World</title>
</head>
<body>
    
    <?php 
        if ($_GET["p"] == "question") {
            include "question.php";
        } elseif ($_GET["p"] == "questionadd") {
            include "questionadd.php";
        } else {
            include "home.php";
        }
    ?>

</body>
</html>