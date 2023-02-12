<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/page.css">
    
    <title>Services Offert</title>
</head>
<body>
    <?php
        $page="services";
        include 'header.php';
    ?>
    <main>

    <h2 class="titre_partenaires">Services Offerts</h2>

        <div class="card">
            
            <div>
            
            <?php
                include '../controllers/affichageServiceHotel.php';
            ?>

            <?php 
                include '../controllers/deleteService.php';
            ?>
                
            </div>
           
        </div>
        
        
        <div id="ajout_service">
            <button class="open-button" onclick="openForm()">+</button>
            <div>
                <p id="plus_part">Ajouter un Service</p>
            </div>
                    </div>

        <div class="form-popup" id="myForm">
            <form action="service.php" class="form-container">
                <h1>Ajouter un Service</h1>

                <label for="nom"><b>Nom du Service</b></label>
                <input type="text" placeholder="nom" name="nom" required>

                <label for="description"><b>Description</b></label>
                <input type="text" placeholder="description" name="description" required>

                <button type="submit" class="btn">Ajouter</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>



        <?php
            include '../controllers/ajoutService.php';
    
        ?>
     
    </main>
    <?php
        include 'footer.php';
    ?>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>