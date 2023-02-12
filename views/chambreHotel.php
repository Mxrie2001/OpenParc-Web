<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/page.css">
    <link rel="stylesheet" href="../assets/css/hotel.css">
    <title>Chambre Hotel</title>
</head>
<body>
    <?php
        $page="home";
        include 'header.php';
    ?>
    <main>

    <h1>Chambres de l'Hotel</h1>

            <?php
                    include '../controllers/chambreHotel.php';

            ?>

        <div id="ajout_chambre">
            
            <button class="open-button" onclick="openForm()">+</button>
            
                <p id="plus_part">Ajouter une Chambre</p>
            </div>
                    </div>

        <div class="form-popup" id="myForm">
            <form action="chambreHotel.php" class="form-container">
                <h1>Ajouter une Chambre</h1>
                
                <input type="number" hidden name="idHotel" value="<?php echo $_GET['idHotel'] ?>" required>
                
                <label for="numero"><b>Numero</b></label>
                <input type="number" placeholder="numero" name="numero" required>

                <label for="type"><b>Type</b></label>
                <select name="type" required>
                            <option value="2">2 Personnes</option>
                            <option  value="3">3 Personnes</option>
                            <option  value="4">4 Personnes</option>
                            <option  value="6">6 Personnes</option>
                </select>

                <button type="submit" class="btn">Ajouter</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>

        <?php
            include '../controllers/ajoutChambre.php';
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