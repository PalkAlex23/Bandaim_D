<?php
    include_once "Adatbazis.php";
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sz-M. A. PHP Dolgozat - Bandáim</title>
    <link rel="stylesheet" href="stilus.css">
</head>
<body>
    <main>
        <?php
            $adatbazis = new Adatbazis();

            // metódusok

            //$adatbazis->adatBeszurOrszag(1, "Magyarország");
            //$adatbazis->adatBeszurOrszag(2, "Szlovákia");



            $matrix = $adatbazis->adatLeker("egyuttes", "egyuttesAzon", "tagSzam", "nev");
            $adatbazis->adatMegjelenit($matrix);
            $adatbazis->adatTorol("orszag", "orszagAzon", "2");

            $adatbazis->kapcsolatBezar();
        ?>
    </main>
    
</body>
</html>