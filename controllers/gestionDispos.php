<?php
include '../models/connectDB.php';

    $bdd=connectDb();

    $jour=$_GET['jour'];
    $mois=$_GET['mois'];
    $annee=$_GET['annee'];
    $idch=$_GET['idch'];

    // echo $jour;
    // echo $mois;
    // echo $annee;
    // echo $idch;

    if (isset($_GET['mois']) && isset($_GET['annee']) && isset($_GET['jour']) && isset($_GET['idch'])){
        $query1= $bdd -> prepare("SELECT * FROM `disponibilite_chambre`WHERE `id_chambre` = ? and `jour` = ? and `mois` = ? and `annee` = ?");
        $query1 -> execute(array($idch , $jour, $mois, $annee));
        $data = $query1 ->fetch();

        if($data['disponible']==1){
            $query= $bdd -> prepare("UPDATE `disponibilite_chambre` SET `disponible`=? WHERE `id_chambre` = ? and `jour` = ? and `mois` = ? and `annee` = ?");
            $query -> execute(array(0, $idch , $jour, $mois, $annee));
            
        }

        if($data['disponible']==0){
            $query= $bdd -> prepare("UPDATE `disponibilite_chambre` SET `disponible`=? WHERE `id_chambre` = ? and `jour` = ? and `mois` = ? and `annee` = ?");
            $query -> execute(array(1, $idch , $jour, $mois, $annee));
             
            
        }


        session_start();

        $q = $bdd->prepare('SELECT * FROM user where email=?');
        $q -> execute(array($_SESSION['user']));
        $data = $q -> fetch();
        $id_user=$data['id'];

        $q2 = $bdd -> prepare('select * from hotel_partenaire where id_gerant=?');
        $q2 -> execute(array($id_user));
        $data2 = $q2 -> fetch();
        $idHotel=$data2['id'];

        $query2= $bdd -> prepare("SELECT count(*) FROM `disponibilite_chambre` WHERE `jour` = ? and `mois` = ? and `annee` = ? and `id_chambre` in (SELECT `id` from `chambre` where `id_hotel`=?) ");
        $query2 -> execute(array($jour, $mois, $annee,$idHotel));
        $data3 = $query2 ->fetch();

        $query3= $bdd -> prepare("SELECT count(*) FROM `disponibilite_chambre`WHERE `jour` = ? and `mois` = ? and `annee` = ? and disponible=? and `id_chambre` in (SELECT `id` from `chambre` where `id_hotel`=?)");
        $query3 -> execute(array($jour, $mois, $annee,1,$idHotel));
        $data4 = $query3 ->fetch();

        if($data3['count(*)'] == $data4['count(*)']){
            $query= $bdd -> prepare("UPDATE `disponibilite_hotel` SET `disponible`=? WHERE `id_hotel` = ? and `jour` = ? and `mois` = ? and `annee` = ?");
            $query -> execute(array(1, $idHotel , $jour, $mois, $annee));
        }

        header("Location: ../views/dispoJours.php?mois=".$mois."&annee=".$annee."&jour=".$jour."");

        
    }

    ?>