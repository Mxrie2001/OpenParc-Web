<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/page.css">
    <link rel="stylesheet" href="../assets/css/hotel.css">
    <title>Disponibilités</title>
</head>
<body>
<?php
        $page="home";
        include 'header.php';
    ?>
    <main>

    <h2 class="titre_partenaires">Disponibilités</h2>
</br>

    <?php
        include '../controllers/dispoMois.php';
    ?>
    
    
    </main>
    <?php
        include 'footer.php';
    ?>

</body>
</html>