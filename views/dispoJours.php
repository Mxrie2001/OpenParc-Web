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
        include '../controllers/dispoJours.php'
    ?>

            <div class="form-popup" id="myForm">
            <form action="dispoJours.php" class="form-container">
                <h1>Modifier les Disponibilitées des Chambres au <?php echo ''.$_GET["jour"].'/'.$_GET["mois"].'/'.$_GET["annee"].''; ?></h1>
                
                
                <?php
                   
                   include '../controllers/gestionDispo.php'

                
            ?>
                

                
                

                
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
            </div>

    </main>
    <?php
        include 'footer.php';
    ?>

<script>
function openForm(jour,mois,annee) {

   location='dispoJours.php?mois='+mois+'&annee='+annee+'&jour='+jour;
    
}
window.onload = document.getElementById("myForm").style.display = "block"; // onload pour charger le formulaire au loading de la page

// function getNumeroChambre(jour,mois,annee,numeroch) {

//     location='dispoJours.php?mois='+mois+'&annee='+annee+'&jour='+jour+'&numeroch'+numeroch;
 
// }
// function form() {
//   document.getElementById("myForm").style.display = "block";
// }

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

// function Dispo() {
//   document.getElementById("chambre2").style.backgroundcolor = "blue";
//     <?php
//             echo "<meta http-equiv='Refresh' content='0;URL=dispoJours.php?mois=$mois&&annee=$annee'>";
//     ?>
//}

// function modifDispo(){
//         document.getElementById("q3").style.backgroundColor = 'red';
// }

</script>


</body>
</html>