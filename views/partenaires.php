<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/page.css">
    <title>Partenaires</title>
</head>
<body>
    <?php
        $page="home";
        include 'header.php';
    ?>

    <main>
    <h1 class="titre_partenaires">Partenaires</h1>

        <div class="card">
            
            <div>
            
            <?php
                include '../controllers/afficheHotel.php';
            ?>

            <?php
                include '../controllers/deleteHotel.php';
            ?>

            </div>
           
        </div>
        
        
        <div id="ajout_partenaire">
            
            <form id="ajouter_gerant_staff" action="partenaires.php">
            <h1>Ajouter un Gérant</h1>
            <label for="nom_gerant"><b>Nom Gérant</b></label>
            <input type="text" placeholder="nom gerant" name="nom_gerant" required>

            <label for="prenom_gerant"><b>Prénom Gérant</b></label>
            <input type="text" placeholder="prenom gerant" name="prenom_gerant" required>

            <label for="email_gerant"><b>Email Gérant</b></label>
            <input type="text" placeholder="email gerant" name="email_gerant" required>

            <label for="pwd_gerant"><b>Mot de passe Gérant</b></label>
            <input type="password" placeholder="pwd gerant" name="pwd_gerant" required>
            
            <button type="submit" class="btn">Ajouter</button>
            
        </form>
        
        <div>
        <button class="open-button" onclick="openForm()">+</button>

            <p id="plus_part">Ajouter un partenaire</p>
        </div>
            
            </div>

        <div class="form-popup" id="myForm">
            <form action="partenaires.php" class="form-container">
                <h1>Ajouter un partenaire</h1>

                <label for="nom"><b>Nom</b></label>
                <input type="text" placeholder="nom" name="nom" required>

                <label for="adresse"><b>Adresse</b></label>
                <input type="text" placeholder="adresse" name="adresse" required>

                <label for="description"><b>Description</b></label>
                <input type="text" placeholder="description" name="desc" required>

                <label for="etoile"><b>Nombre d'étoiles</b></label>
                <input type="number" placeholder="nombre d'etoiles" name="etoile" required>

                <label for="img"><b>Image</b></label>
                <input type="text" placeholder="image" name="img" required>

                <label for="gerant"><b>Gérant</b></label>
                <select name="gerant" required>
                <?php

                //selection des gerant pour l'option
                    $bdd = connectDb();
                    $query = $bdd->prepare('SELECT * FROM user where role=4');
                    $query->execute();
                    foreach ($query as $users){
                      $id_gerant= $users['id'];
                      $nom_gerant= $users['nom'];
                      $prenom_gerant= $users['prenom'];
                    echo "<option value='$id_gerant'>$nom_gerant $prenom_gerant</option>";
                    }
                ?>
            </select>

                <button type="submit" class="btn">Ajouter</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>

        

        <?php
            include '../controllers/ajoutGerant.php';
        ?>


        <?php
            include '../controllers/ajoutPartenaire.php';
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