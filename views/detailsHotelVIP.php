<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/vip.css">
    <link rel="stylesheet" href="../assets/css/page.css">
    
    <title>Detail Hotel</title>
</head>
<body>
    <?php
        $page="Reservation";
        include 'header.php';
    ?>

    <main id="affichage_recherche_reservation">

                    <?php
                        include '../models/connectDB.php';
                        $bdd= connectDB();
                    ?>
                <?php

                    $bdd = connectDb();
                    $idHotel=$_GET['test'];
                    $q = $bdd->prepare('SELECT * FROM hotel_partenaire where id=?');
                    $q-> execute(array($idHotel));

                    echo "<div id='hotel_details_reservation'>";
                     foreach($q as $data){
                         $id=$data['id'];
             
                         $q2 = $bdd->prepare('SELECT * FROM hotel_partenaire where id=?');
                         $q2->execute(array($id));
                         $data2 = $q2 -> fetch();
                         $id_hotel_choisi=$data2['id'];
                         echo '<div id="container">';
                         echo '<img id="image_hotel_detail" src="'.$data2['image'].'" /><p>';
                         echo $data2['nom'].'</br>';
                         echo $data2['localisation'].'</br>';
                         echo $data2['nb_etoiles'].'</p>';
                         echo "</div>";

                         echo '<div id="container"><p>Description:</p>';
                         echo $data2['description'].'</br>';
                         echo "</div>";

                         echo '<div id="container"><p>Services:</p>';
                         $q3 = $bdd->prepare('SELECT * FROM services where id_hotel=?');
                         $q3-> execute(array($id_hotel_choisi));
                         foreach($q3 as $data3){
                         
                         echo $data3['nom_service'].'</br>';
                         echo $data3['description'].'</br>';
                         echo "</div>";
                         }
             
                     }
                     echo "</div>";
                    ?>


        <div id="container_reservation_vip">
            <form id="reserver_hotel_vip" class="form_recup_reservation" action="../controllers/reservationVIPTraitement.php" >
                <h1>Recapitulatif de la Reservation:</h1>
                
                
                <?php
                    session_start();
                    $q = $bdd->prepare('SELECT * FROM user where email=?');
                    $q -> execute(array($_SESSION['user']));
                    $data = $q -> fetch();
                    $id_user=$data['id'];
                ?>

                <input type="number" hidden  name="vip" value="<?php echo $id_user; ?>" required>
                <input type="number" hidden name="idHotel" value="<?php echo $idHotel; ?>" required>
                
                <p>Nombre de Chambre à reserver</p>
                <input type="number" name="nbreChambre" readonly="readonly" value="<?php echo $_GET['nbreChambre'] ?>" required>
                
                <p>Chambre(s) de </p>
                <select name="nbPersonnes" readonly="readonly" required>
                            <option value="<?php echo $_GET['nbPersonnes'] ?>"><?php echo $_GET['nbPersonnes'] ?></option>
                </select>
                <p> personnes</p>

                <p>Date d'Arrivée</p>
                <div class="date">
                <select name="jourA" readonly="readonly" required>
                        <option value="<?php echo $_GET['jourA'] ?>"><?php echo $_GET['jourA'] ?></option>
                </select>

                <select name="moisA" readonly="readonly" required>
                    <option value="<?php echo $_GET['moisA'] ?>"><?php echo $_GET['moisA'] ?></option>
                </select>

                <select name="anneeA" readonly="readonly" required>
                    <option value="<?php echo $_GET['anneeA'] ?>"><?php echo $_GET['anneeA'] ?></option>
                </select>
                    </div>

            
                

            <p>Date de Depart</p>
            <div class="date">
            <select name="jourD"  readonly="readonly" required>
                <option value="<?php echo $_GET['jourD'] ?>"><?php echo $_GET['jourD'] ?></option>
            </select>

                <select name="moisD" readonly="readonly" required>
                    <option value="<?php echo $_GET['moisD'] ?>"><?php echo $_GET['moisD'] ?></option>
                </select>

                <select name="anneeD" readonly="readonly" required>
                    <option value="<?php echo $_GET['anneeD'] ?>"><?php echo $_GET['anneeD'] ?></option>
                </select>
                </div>
                <button type="submit" class="btn">Reserver</button>
                
            </form>
        </div>

            </main>
    <?php
        include 'footer.php';
    ?>
    
</body>
</html>