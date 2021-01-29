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
        } elseif ($_GET["p"] == "questionedit") {
            include "questionedit.php";
        } elseif ($_GET["p"] == "questiondelete") {
            include "questiondelete.php";
        } elseif ($_GET["p"] == "gejala") {
            include "gejala.php";
        } elseif ($_GET["p"] == "gejalaadd") {
            include "gejalaadd.php";
        } elseif ($_GET["p"] == "gejalaedit") {
            include "gejalaedit.php";
        } elseif ($_GET["p"] == "gejaladelete") {
            include "gejaladelete.php";
        } elseif ($_GET["p"] == "penyakit") {
            include "penyakit.php";
        } elseif ($_GET["p"] == "penyakitadd") {
            include "penyakitadd.php";
        } elseif ($_GET["p"] == "penyakitedit") {
            include "penyakitedit.php";
        } elseif ($_GET["p"] == "penyakitdelete") {
            include "penyakitdelete.php";
        } elseif ($_GET["p"] == "rule") {
            include "rule.php";
        } elseif ($_GET["p"] == "ruleadd") {
            include "ruleadd.php";
        } elseif ($_GET["p"] == "ruleedit") {
            include "ruleedit.php";
        } elseif ($_GET["p"] == "ruledelete") {
            include "ruledelete.php";
        } else {
            include "home.php";
        }
    ?>

</body>
</html>