<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/page.css">
    <title>Modification Hotel Partenaire</title>
</head>
<body>
    <?php
            $page="home";
            include 'header.php';
    ?>


<main>
        
            <?php
                include '../controllers/traitementModifService.php';

            ?>
        
            <?php
                include '../controllers/recupModifService.php';
            ?>
         

    </main>

    <?php
        include 'footer.php';
    ?>

</body>
</html>


