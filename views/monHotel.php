<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/hotel.css">
    <link rel="stylesheet" href="../assets/css/page.css">
    <title>Index</title>
</head>

<body>
    <?php
        $page="hotel";
        include 'header.php';
    ?>
<main>


    <h2 class="titre_partenaires">Mon Hotel</h2>


            <?php
                include '../models/connectDB.php';
            ?>
            
                    <div id="hotel_detail">
                    <?php
                    $bdd=connectDB();
                    session_start();

                    $q = $bdd->prepare('SELECT * FROM user where email=?');
                    $q -> execute(array($_SESSION['user']));
                    $data = $q -> fetch();
                    $id_user=$data['id'];


                    $q2 = $bdd->prepare('SELECT * FROM hotel_partenaire where id_gerant=?');
                    $q2-> execute(array($id_user));
                    $data2 = $q2 -> fetch();
                    $id_hotel=$data2['id'];



                        echo "<div id='presentation_image'>";
                        echo '<img id="img_hotel" src="'.$data2['image'].'" />';
                        echo '<button onclick="openForm1()"><img src="../assets/img/modify.png"/></button>';
                        echo "</div>";

                        echo "<div id='infoG'>";

                        echo '<div><p> Nom: '.$data2['nom'].'</p><button onclick="openForm2()"><img src="../assets/img/modify.png"/></button></div>';
                        echo '<div><p> Localisation: '.$data2['localisation'].'</p><button onclick="openForm3()"><img src="../assets/img/modify.png"/></button></div>';
                        echo '<div><p> Nombre d étoiles: '.$data2['nb_etoiles'].'</p><button onclick="openForm4()"><img src="../assets/img/modify.png"/></button></div>';
                        echo '<div><p> Description: '.$data2['description'].'</p><button onclick="openForm5()"><img src="../assets/img/modify.png"/></button></div>';
                        echo '<div><p> Modifier le mot de passe </p><button onclick="openForm7()"><img src="../assets/img/modify.png"/></button></div>';
                        echo "</div>";
                        echo '<div><a href="chambreHotel.php?idHotel='.$id_hotel.'"> Les chambres de mon hotel </a></div>';
                         
                     ?>

                    
            <?php
                
                if (isset($_GET['image'])){
                    $query= $bdd -> prepare("UPDATE `hotel_partenaire` SET `image`=? WHERE `id_gerant` = ?");
                    $query -> execute(array($_GET['image'], $id_user));
                    echo '<meta http-equiv="Refresh" content="0;URL=monHotel.php">';

                }
            ?>

            <?php
                $query2= $bdd -> prepare('SELECT `image` FROM `hotel_partenaire` WHERE `id_gerant`=?');
                $query2 -> execute(array($id_user));
                $data = $query2 -> fetch();
            ?>       
                    

            <div class="form-popup" id="myForm1">
            <form action="monHotel.php" class="form-container">
                <h1>Modifier l'Image</h1>

                <label for="image"><b>Nouvelle Image</b></label>
                <input type="text" name="image" value="<?php echo $data['image']; ?>" required>

                <button type="submit" class="btn">Modifier</button>
                <button type="button" class="btn cancel" onclick="closeForm1()">Close</button>
            </form>
            </div>

            
            <?php
                
                if (isset($_GET['nom'])){
                    $query= $bdd -> prepare("UPDATE `hotel_partenaire` SET `nom`=? WHERE `id_gerant` = ?");
                    $query -> execute(array($_GET['nom'], $id_user));
                    echo '<meta http-equiv="Refresh" content="0;URL=monHotel.php">';

                }
            ?>

            <?php
                $query2= $bdd -> prepare('SELECT `nom` FROM `hotel_partenaire` WHERE `id_gerant`=?');
                $query2 -> execute(array($id_user));
                $data = $query2 -> fetch();
            ?>  

            <div class="form-popup" id="myForm2">
            <form action="monHotel.php" class="form-container">
                <h1>Modifier le Nom de l'hotel</h1>

                <label for="nom"><b>Nouveau Nom</b></label>
                <input type="text" name="nom" value="<?php echo $data['nom']; ?>" required>

                <button type="submit" class="btn">Modifier</button>
                <button type="button" class="btn cancel" onclick="closeForm2()">Close</button>
            </form>
            </div>
            
            <?php
                
                if (isset($_GET['adresse'])){
                    $query= $bdd -> prepare("UPDATE `hotel_partenaire` SET `localisation`=? WHERE `id_gerant` = ?");
                    $query -> execute(array($_GET['adresse'], $id_user));
                    echo '<meta http-equiv="Refresh" content="0;URL=monHotel.php">';

                }
            ?>

            <?php
                $query2= $bdd -> prepare('SELECT `localisation` FROM `hotel_partenaire` WHERE `id_gerant`=?');
                $query2 -> execute(array($id_user));
                $data = $query2 -> fetch();
            ?>  

            <div class="form-popup" id="myForm3">
            <form action="monHotel.php" class="form-container">
                <h1>Modifier l'Adresse</h1>

                <label for="adresse"><b>Nouvelle Adresse</b></label>
                <input type="text" name="adresse" value="<?php echo $data['localisation']; ?>" required>

                <button type="submit" class="btn">Modifier</button>
                <button type="button" class="btn cancel" onclick="closeForm3()">Close</button>
            </form>
            </div>


            <?php
                
                if (isset($_GET['etoiles'])){
                    $query= $bdd -> prepare("UPDATE `hotel_partenaire` SET `nb_etoiles`=? WHERE `id_gerant` = ?");
                    $query -> execute(array($_GET['etoiles'], $id_user));
                    echo '<meta http-equiv="Refresh" content="0;URL=monHotel.php">';

                }
            ?>

            <?php
                $query2= $bdd -> prepare('SELECT `nb_etoiles` FROM `hotel_partenaire` WHERE `id_gerant`=?');
                $query2 -> execute(array($id_user));
                $data = $query2 -> fetch();
            ?>  

            <div class="form-popup" id="myForm4">
            <form action="monHotel.php" class="form-container">
                <h1>Modifier le Nombre d'Etoiles</h1>

                <label for="etoiles"><b>Nouveau Nombre d'étoiles</b></label>
                <input type="number"  name="etoiles" value="<?php echo $data['nb_etoiles']; ?>" required>

                <button type="submit" class="btn">Modifier</button>
                <button type="button" class="btn cancel" onclick="closeForm4()">Close</button>
            </form>
            </div>


            
            <?php
                
                if (isset($_GET['description'])){
                    $query= $bdd -> prepare("UPDATE `hotel_partenaire` SET `description`=? WHERE `id_gerant` = ?");
                    $query -> execute(array($_GET['description'], $id_user));
                    echo '<meta http-equiv="Refresh" content="0;URL=monHotel.php">';
                }
            ?>

            <?php
                $query2= $bdd -> prepare('SELECT `description` FROM `hotel_partenaire` WHERE `id_gerant`=?');
                $query2 -> execute(array($id_user));
                $data = $query2 -> fetch();
            ?>  

            <div class="form-popup" id="myForm5">
            <form action="monHotel.php" class="form-container">
                <h1>Modifier la Description</h1>

                <label for="description"><b>Nouvelle Description</b></label>
                <input type="text"  name="description" value="<?php echo $data['description']; ?>" required>

                <button type="submit" class="btn">Modifier</button>
                <button type="button" class="btn cancel" onclick="closeForm5()">Close</button>
            </form>
            </div>


            <?php
                
                if (isset($_GET['mdp'])){
                    $cost = ['cost' => 10];
                    $mdp = password_hash($_GET['mdp'], PASSWORD_BCRYPT, $cost);
                    $query= $bdd -> prepare("UPDATE `user` SET `pwd`=? WHERE `id` = ?");
                    $query -> execute(array($mdp, $id_user));
                    echo '<meta http-equiv="Refresh" content="0;URL=monHotel.php">';
                }
            ?>

            <?php
                $query2= $bdd -> prepare('SELECT `pwd` FROM `user` WHERE `id`=?');
                $query2 -> execute(array($id_user));
                $data = $query2 -> fetch();
            ?>  

            

            <div class="form-popup" id="myForm7">
            <form action="monHotel.php" class="form-container">
                <h1>Modifier mon Mot de passe</h1>

                <label for="mdp"><b>Nouveau mot de passe</b></label>
                <input type="text" name="mdp" value="<?php echo $data['pwd']; ?>" required>

                <button type="submit" class="btn">Modifier</button>
                <button type="button" class="btn cancel" onclick="closeForm7()">Close</button>
            </form>
            </div>
            

            

            </main>
    <?php
        include 'footer.php';
    ?>

<script>
function openForm1() {
  document.getElementById("myForm1").style.display = "block";
}

function openForm2() {
  document.getElementById("myForm2").style.display = "block";
}

function openForm3() {
  document.getElementById("myForm3").style.display = "block";
}

function openForm4() {
  document.getElementById("myForm4").style.display = "block";
}

function openForm5() {
  document.getElementById("myForm5").style.display = "block";
}

function openForm7() {
  document.getElementById("myForm7").style.display = "block";
}



function closeForm1() {
  document.getElementById("myForm1").style.display = "none";
}

function closeForm2() {
  document.getElementById("myForm2").style.display = "none";
}

function closeForm3() {
  document.getElementById("myForm3").style.display = "none";
}

function closeForm4() {
  document.getElementById("myForm4").style.display = "none";
}

function closeForm5() {
  document.getElementById("myForm5").style.display = "none";
}

function closeForm7() {
  document.getElementById("myForm7").style.display = "none";
}

</script>

</body>
</html>