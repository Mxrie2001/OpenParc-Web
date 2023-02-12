<?php
                        include '../models/connectDB.php';
                        $bdd= connectDB();
                    ?>

<?php
        
        if (isset($_GET['vip']) && isset($_GET['idHotel']) && isset($_GET['nbreChambre']) && isset($_GET['nbPersonnes']) && isset($_GET['jourA']) && isset($_GET['moisA']) && isset($_GET['anneeA']) && isset($_GET['jourD']) && isset($_GET['moisD']) && isset($_GET['anneeD']) ){
            //inserer les donner dans la table de reservation
            $query = $bdd -> prepare('INSERT INTO `reservation` (`id_vip`, `id_hotel`, `nbreChambre`, `typeChambre`, `jourA`, `moisA`, `anneeA`, `jourD`, `moisD`, `anneeD`) VALUES (?,?,?,?,?,?,?,?,?,?)');
            $query -> execute(array($_GET['vip'], $_GET['idHotel'],$_GET['nbreChambre'],$_GET['nbPersonnes'],$_GET['jourA'],$_GET['moisA'],$_GET['anneeA'],$_GET['jourD'],$_GET['moisD'],$_GET['anneeD']));
            
            //changement des dispos des chambres automatique
            $n=$_GET['nbreChambre']; //limite
            $jourA=$_GET['jourA'];
            $moisA=$_GET['moisA'];
            $anneeA=$_GET['anneeA'];

            $jourD=$_GET['jourD'];
            $moisD=$_GET['moisD'];
            $anneeD=$_GET['anneeD'];
            $typeDeChambre= $_GET['nbPersonnes'];
      


            for ($nombreDeChambre=1; $nombreDeChambre<($n+1);$nombreDeChambre++){
                if($moisA == $moisD){
                    for ($jour=$jourA; $jour<$jourD; $jour++){
                        $query2 = $bdd -> prepare('UPDATE `disponibilite_chambre` SET `disponible`=1 WHERE `jour` = ? and `mois` = ? and `annee` = ? and  `id_chambre` = (SELECT `id_chambre` FROM `disponibilite_chambre` where `disponible`=0 and `jour`=? and `mois`=? and `annee`=? and `id_chambre` in (select `id` from chambre where type=?) limit 1)');
                        $query2 -> execute(array($jour , $moisA, $anneeA, $jour, $moisA, $anneeA, $typeDeChambre));

                        //gestion de la dispo de l' hotel
                        $query6= $bdd -> prepare("SELECT count(*) FROM `disponibilite_chambre` WHERE `jour` = ? and `mois` = ? and `annee` = ? and `id_chambre` in (SELECT `id` from `chambre` where `id_hotel`=?) ");
                        $query6 -> execute(array($jour, $moisA, $anneeA,$_GET['idHotel']));
                        $data6 = $query6 ->fetch();

                        $query7= $bdd -> prepare("SELECT count(*) FROM `disponibilite_chambre`WHERE `jour` = ? and `mois` = ? and `annee` = ? and disponible=? and `id_chambre` in (SELECT `id` from `chambre` where `id_hotel`=?)");
                        $query7 -> execute(array($jour, $moisA, $anneeA,1,$_GET['idHotel']));
                        $data7 = $query7 ->fetch();

                        if($data6['count(*)'] == $data7['count(*)']){
                            $query8= $bdd -> prepare("UPDATE `disponibilite_hotel` SET `disponible`=? WHERE `id_hotel` = ? and `jour` = ? and `mois` = ? and `annee` = ?");
                            $query8 -> execute(array(1, $_GET['idHotel'] , $jour, $moisA, $anneeA));
                        }
                    }
                }
                
                if($moisA != $moisD){
                    for ($mois=$moisA; $mois<$moisD; $mois++){
                        
                        $mod=$mois%2;
    
                        if($mod != 0 && $mois != 2){
                            $n=31;
                            for ($jour=$jourA; $jour<($n+1); $jour++){
                                $query2 = $bdd -> prepare('UPDATE `disponibilite_chambre` SET `disponible`=1 WHERE `jour` = ? and `mois` = ? and `annee` = ? and  `id_chambre` = (SELECT `id_chambre` FROM `disponibilite_chambre` where `disponible`=0 and `jour`=? and `mois`=? and `annee`=? and `id_chambre` in (select `id` from chambre where type=?) limit 1)');
                                $query2 -> execute(array($jour , $mois, $anneeA, $jour, $mois, $anneeA, $typeDeChambre));

                                //gestion de la dispo de l' hotel
                                $query6= $bdd -> prepare("SELECT count(*) FROM `disponibilite_chambre` WHERE `jour` = ? and `mois` = ? and `annee` = ? and `id_chambre` in (SELECT `id` from `chambre` where `id_hotel`=?) ");
                                $query6 -> execute(array($jour, $mois, $anneeA,$_GET['idHotel']));
                                $data6 = $query6 ->fetch();

                                $query7= $bdd -> prepare("SELECT count(*) FROM `disponibilite_chambre`WHERE `jour` = ? and `mois` = ? and `annee` = ? and disponible=? and `id_chambre` in (SELECT `id` from `chambre` where `id_hotel`=?)");
                                $query7 -> execute(array($jour, $mois, $anneeA,1,$_GET['idHotel']));
                                $data7 = $query7 ->fetch();

                                if($data6['count(*)'] == $data7['count(*)']){
                                    $query8= $bdd -> prepare("UPDATE `disponibilite_hotel` SET `disponible`=? WHERE `id_hotel` = ? and `jour` = ? and `mois` = ? and `annee` = ?");
                                    $query8 -> execute(array(1, $_GET['idHotel'] , $jour, $mois, $anneeA));
                                }
                            }
                        }
                    
                        if($mois ==2){
                            if($annee%4==0 && $annee%100 !=0){
                                $n=29;
                                for ($jour=$jourA; $jour<($n+1); $jour++){
                                    $query2 = $bdd -> prepare('UPDATE `disponibilite_chambre` SET `disponible`=1 WHERE `jour` = ? and `mois` = ? and `annee` = ? and  `id_chambre` = (SELECT `id_chambre` FROM `disponibilite_chambre` where `disponible`=0 and `jour`=? and `mois`=? and `annee`=? and `id_chambre` in (select `id` from chambre where type=?) limit 1)');
                                    $query2 -> execute(array($jour , $mois, $anneeA, $jour, $mois, $anneeA, $typeDeChambre));

                                    //gestion de la dispo de l' hotel
                                    $query6= $bdd -> prepare("SELECT count(*) FROM `disponibilite_chambre` WHERE `jour` = ? and `mois` = ? and `annee` = ? and `id_chambre` in (SELECT `id` from `chambre` where `id_hotel`=?) ");
                                    $query6 -> execute(array($jour, $mois, $anneeA,$_GET['idHotel']));
                                    $data6 = $query6 ->fetch();

                                    $query7= $bdd -> prepare("SELECT count(*) FROM `disponibilite_chambre`WHERE `jour` = ? and `mois` = ? and `annee` = ? and disponible=? and `id_chambre` in (SELECT `id` from `chambre` where `id_hotel`=?)");
                                    $query7 -> execute(array($jour, $mois, $anneeA,1,$_GET['idHotel']));
                                    $data7 = $query7 ->fetch();

                                    if($data6['count(*)'] == $data7['count(*)']){
                                        $query8= $bdd -> prepare("UPDATE `disponibilite_hotel` SET `disponible`=? WHERE `id_hotel` = ? and `jour` = ? and `mois` = ? and `annee` = ?");
                                        $query8 -> execute(array(1, $_GET['idHotel'] , $jour, $mois, $anneeA));
                                    }
                                }
                            }
                            else{
                                $n=28;
                                for ($jour=$jourA; $jour<($n+1); $jour++){
                                    $query2 = $bdd -> prepare('UPDATE `disponibilite_chambre` SET `disponible`=1 WHERE `jour` = ? and `mois` = ? and `annee` = ? and  `id_chambre` = (SELECT `id_chambre` FROM `disponibilite_chambre` where `disponible`=0 and `jour`=? and `mois`=? and `annee`=? and `id_chambre` in (select `id` from chambre where type=?) limit 1)');
                                    $query2 -> execute(array($jour , $mois, $anneeA, $jour, $mois, $anneeA, $typeDeChambre));

                                    //gestion de la dispo de l' hotel
                                    $query6= $bdd -> prepare("SELECT count(*) FROM `disponibilite_chambre` WHERE `jour` = ? and `mois` = ? and `annee` = ? and `id_chambre` in (SELECT `id` from `chambre` where `id_hotel`=?) ");
                                    $query6 -> execute(array($jour, $mois, $anneeA,$_GET['idHotel']));
                                    $data6 = $query6 ->fetch();

                                    $query7= $bdd -> prepare("SELECT count(*) FROM `disponibilite_chambre`WHERE `jour` = ? and `mois` = ? and `annee` = ? and disponible=? and `id_chambre` in (SELECT `id` from `chambre` where `id_hotel`=?)");
                                    $query7 -> execute(array($jour, $mois, $anneeA,1,$_GET['idHotel']));
                                    $data7 = $query7 ->fetch();

                                    if($data6['count(*)'] == $data7['count(*)']){
                                        $query8= $bdd -> prepare("UPDATE `disponibilite_hotel` SET `disponible`=? WHERE `id_hotel` = ? and `jour` = ? and `mois` = ? and `annee` = ?");
                                        $query8 -> execute(array(1, $_GET['idHotel'] , $jour, $mois, $anneeA));
                                    }
                                }
                            }
                            
                        }
                    
                        if($mod == 0  && $mois != 2){
                            $n=30;
                            for ($jour=$jourA; $jour<($n+1); $jour++){
                                $query2 = $bdd -> prepare('UPDATE `disponibilite_chambre` SET `disponible`=1 WHERE `jour` = ? and `mois` = ? and `annee` = ? and  `id_chambre` = (SELECT `id_chambre` FROM `disponibilite_chambre` where `disponible`=0 and `jour`=? and `mois`=? and `annee`=? and `id_chambre` in (select `id` from chambre where type=?) limit 1)');
                                $query2 -> execute(array($jour , $mois, $anneeA, $jour, $mois, $anneeA, $typeDeChambre));

                                //gestion de la dispo de l' hotel
                                $query6= $bdd -> prepare("SELECT count(*) FROM `disponibilite_chambre` WHERE `jour` = ? and `mois` = ? and `annee` = ? and `id_chambre` in (SELECT `id` from `chambre` where `id_hotel`=?) ");
                                $query6 -> execute(array($jour, $mois, $anneeA,$_GET['idHotel']));
                                $data6 = $query6 ->fetch();

                                $query7= $bdd -> prepare("SELECT count(*) FROM `disponibilite_chambre`WHERE `jour` = ? and `mois` = ? and `annee` = ? and disponible=? and `id_chambre` in (SELECT `id` from `chambre` where `id_hotel`=?)");
                                $query7 -> execute(array($jour, $mois, $anneeA,1,$_GET['idHotel']));
                                $data7 = $query7 ->fetch();

                                if($data6['count(*)'] == $data7['count(*)']){
                                    $query8= $bdd -> prepare("UPDATE `disponibilite_hotel` SET `disponible`=? WHERE `id_hotel` = ? and `jour` = ? and `mois` = ? and `annee` = ?");
                                    $query8 -> execute(array(1, $_GET['idHotel'] , $jour, $mois, $anneeA));
                                }
                            }
                        }
                        
                    }
    
                    for ($jourMoisApres=1; $jourMoisApres<$jourD; $jourMoisApres++){
                        $query2 = $bdd -> prepare('UPDATE `disponibilite_chambre` SET `disponible`=1 WHERE `jour` = ? and `mois` = ? and `annee` = ? and  `id_chambre` = (SELECT `id_chambre` FROM `disponibilite_chambre` where `disponible`=0 and `jour`=? and `mois`=? and `annee`=? and `id_chambre` in (select `id` from chambre where type=?) limit 1)');
                        $query2 -> execute(array($jourMoisApres , $moisD, $anneeA, $jourMoisApres, $moisD, $anneeA, $typeDeChambre));

                        //gestion de la dispo de l' hotel
                        $query6= $bdd -> prepare("SELECT count(*) FROM `disponibilite_chambre` WHERE `jour` = ? and `mois` = ? and `annee` = ? and `id_chambre` in (SELECT `id` from `chambre` where `id_hotel`=?) ");
                        $query6 -> execute(array($jour, $mois, $anneeA,$_GET['idHotel']));
                        $data6 = $query6 ->fetch();

                        $query7= $bdd -> prepare("SELECT count(*) FROM `disponibilite_chambre`WHERE `jour` = ? and `mois` = ? and `annee` = ? and disponible=? and `id_chambre` in (SELECT `id` from `chambre` where `id_hotel`=?)");
                        $query7 -> execute(array($jour, $mois, $anneeA,1,$_GET['idHotel']));
                        $data7 = $query7 ->fetch();

                        if($data6['count(*)'] == $data7['count(*)']){
                            $query8= $bdd -> prepare("UPDATE `disponibilite_hotel` SET `disponible`=? WHERE `id_hotel` = ? and `jour` = ? and `mois` = ? and `annee` = ?");
                            $query8 -> execute(array(1, $_GET['idHotel'] , $jourMoisApres, $moisD, $anneeA));
                        }
                    }
                }
            }


            //retour sur la page de confirmation
            echo "<meta http-equiv='Refresh' content='0;URL=../views/reservationOK.php'>";
            }
    ?>

