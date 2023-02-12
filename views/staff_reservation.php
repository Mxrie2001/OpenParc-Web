<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/page.css">
    
    <title>Reservations</title>
</head>
<body>
<?php
            $page="home";
            include 'header.php';
    ?>


<main>

    <h1 class="titre_partenaires">Reservations</h1>

    <div class="card_reservation_staff">
            
                
                    <?php
                        include '../controllers/affichageReservationStaff.php'
                    ?>
 
                    </div>

    </main>

    <?php
        include 'footer.php';
    ?>   

</body>
</html>