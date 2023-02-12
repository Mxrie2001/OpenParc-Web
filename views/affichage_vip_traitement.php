<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/vip.css">
    <link rel="stylesheet" href="../assets/css/page.css">
    <title>Traitement</title>
</head>
<body>
    <?php
        $page="Traitement";
        include 'header.php';
    ?>
    <main>
                <?php
                    include '../models/connectDB.php';
                    $bdd= connectDB();
                ?>

                <?php
                    session_start();
                    $qUser = $bdd->prepare('SELECT * FROM user where email=?');
                    $qUser -> execute(array($_SESSION['user']));
                    $dataUser = $qUser -> fetch();
                    $id_user=$dataUser['id'];
                    $role_user=$dataUser['role'];
                    echo $role_user;
                ?>

                

<div id="hotel_dispo_liste">

                <?php
                

                $n=$_GET['nbreChambre'];
                $jourA=$_GET['jourA'];
                $moisA=$_GET['moisA'];
                $anneeA=$_GET['anneeA'];

                $jourD=$_GET['jourD'];
                $moisD=$_GET['moisD'];
                $anneeD=$_GET['anneeD'];
                $typeDeChambre= $_GET['nbPersonnes'];

                $total_jours= $jourD-$jourA;
                $total_dispo_chambre= $total_jours*$n;

                // echo $total_jours;
                
                if($role_user==1){ //Joueur
                    $q = $bdd->prepare('SELECT * FROM `hotel_partenaire` where id not in (select id_hotel from reservation where id_vip in (select id from user where role=2))');
                    $q-> execute();
                }

                if($role_user==2){ //Arbitre
                    $q = $bdd->prepare('SELECT * FROM `hotel_partenaire` where id not in (select id_hotel from reservation where id_vip in (select id from user where role=1))');
                    $q-> execute();
                }

                if($role_user==3){ //Autre
                    $q = $bdd->prepare('SELECT * FROM `hotel_partenaire`');
                    $q-> execute();
                }
                

                
                foreach($q as $data){
                    $Hotel=$data['id'];


                    $q2 = $bdd->prepare('SELECT count(*), id_hotel FROM `disponibilite_hotel` WHERE id_hotel= ? and disponible=? and mois=? and annee=? and jour BETWEEN ? AND ?');
                    $q2-> execute(array($Hotel,0, $moisA, $anneeA,$jourA, $jourD-1 ));
                    $data2 = $q2 ->fetch();  
                    $count= $data2['count(*)'];
                    $HotelDispoPeriodeReservation= $data2['id_hotel'];

                    // echo $count;

                    //Verification de si l'hotel est dispo pour cette periode de reservation
                    if($count == $total_jours){
                        // echo $HotelDispoPeriodeReservation.": dispo";
                        
                        $q3 = $bdd->prepare('SELECT count(*), id_hotel FROM chambre where id_hotel=? and `type`=?  and id in (select id_chambre from disponibilite_chambre WHERE id_hotel= ? and disponible=? and mois=? and annee=? and jour BETWEEN ? AND ?)');
                        $q3-> execute(array($HotelDispoPeriodeReservation ,$typeDeChambre, $Hotel,0, $moisA, $anneeA,$jourA, $jourD-1));
                        $data3 = $q3 ->fetch();  
                        $countChambre= $data3['count(*)'];
                        $HotelChambresDispoPeriodeReservation= $data3['id_hotel'];
                        
                        //Verification de si n chambre de x personnes peuvent etre reservé pour cette periode
                        if($countChambre >= $total_dispo_chambre){
                            // echo $HotelChambresDispoPeriodeReservation.": dispo";
                            
                            $q4 = $bdd->prepare('SELECT * FROM hotel_partenaire where id=?');
                            $q4->execute(array($HotelChambresDispoPeriodeReservation));
                            $data4 = $q4 ->fetch();
                            
                            echo "<a href='../views/detailsHotelVIP.php?test=$HotelChambresDispoPeriodeReservation&nbreChambre=$n&nbPersonnes=$typeDeChambre&jourA=$jourA&moisA=$moisA&anneeA=$anneeA&jourD=$jourD&moisD=$moisD&anneeD=$anneeD'>";
                            echo '<div id="container">';
                            echo '<img id= "image_hotel" src="'.$data4['image'].'" /><p>';
                            echo $data4['nom'].'</br>';
                            echo $data4['localisation'].'</br>';
                            echo $data4['nb_etoiles'].' étoiles</p>';
                            echo "</div></a> ";

                        }

                        // if($countChambre < $total_dispo_chambre){
                        //     echo ": pas dispo";
                        // }

                    }


                    // if($count != $total_jours){
                    //     echo $HotelDispoPeriodeReservation.": pas dispo";
                    
                    // }

                }

                ?>


    </main>
    <?php
        include 'footer.php';
    ?>
</body>
</html>
