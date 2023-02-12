<?php
require '../controllers/Chambre.php';
require 'connectDB.php';

class ChambreRepository
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function chambreHotel($idHotel){
                    

                    $q3= $this->bdd->prepare('select * from chambre where id_hotel=? and type=?');
                    $q3 -> execute(array($idHotel,2));
                    echo "<h2>Chambres 2 personnes</h2>";
                    echo "<div class='les_chambres'>";
                    foreach($q3 as $data3){
                            echo "<p class='chambre'>".$data3['numero']."</p>";
                        } 
                    echo "</div>";
    
                    $q4= $this->bdd->prepare('select * from chambre where id_hotel=? and type=?');
                    $q4 -> execute(array($idHotel,3));
                    echo "<h2>Chambres 3 personnes</h2>";
                    echo "<div class='les_chambres'>";
                    foreach($q4 as $data4){
                        echo "<p class='chambre'>".$data4['numero']."</p>";    
                    }
                    echo "</div>";
    
                    $q5= $this->bdd->prepare('select * from chambre where id_hotel=? and type=?');
                    $q5 -> execute(array($idHotel,4));
                    echo "<h2>Chambres 4 personnes</h2>";
                    echo "<div class='les_chambres'>";
                    foreach($q5 as $data5){
                            echo "<p class='chambre'>".$data5['numero']."</p>";
                         }
                    echo "</div>";
    
                    $q6= $this->bdd->prepare('select * from chambre where id_hotel=? and type=?');
                    $q6 -> execute(array($idHotel,6));
                    echo "<h2>Chambres 6 personnes</h2>";
                    echo "<div class='les_chambres'>";
                    foreach($q6 as $data6){
                        echo "<p class='chambre'>".$data6['numero']."</p>";
                    }
                    echo "</div>";
    }

    public function addChambre($numero, $type, $idHotel){


          $query= $this->bdd->prepare('INSERT INTO `chambre` (`numero`, `type`, `id_hotel`) VALUES (?,?,?)');
          $query -> execute(array($numero, $type,$idHotel));
        
          $query2= $this->bdd->prepare('SELECT * from  `chambre` WHERE  `numero` = ? and  `type`=? and  `id_hotel`=?');
          $query2 -> execute(array($numero, $type,$idHotel));
          $data2 = $query2 -> fetch();
          $chambreId= $data2['id'];

          $Object = new DateTime();
          $annee = $Object->format("Y"); 
          for($mois=1; $mois<13; $mois++){
            $mod=$mois%2;

            if($mod != 0 && $mois != 2){
                $n=31;
            }
        
            if($mois ==2){
                if($annee%4==0 && $annee%100 !=0){
                    $n=29;
                }
                else{
                    $n=28;
                } 
            }
        
            if($mod == 0  && $mois != 2){
                $n=30;
            }

            for($jour=1; $jour<($n+1); $jour++){
                $query3= $this->bdd->prepare('INSERT INTO `disponibilite_chambre` (`id_chambre`, `disponible`, `jour`,`mois`,`annee`) VALUES (?,?,?,?,?)');
                $query3 -> execute(array($chambreId,0,$jour,$mois,$annee));
            }
          
          }

          echo '<meta http-equiv="Refresh" content="0;URL=chambreHotel.php?idHotel='.$idHotel.'">';
    }

    public function gestionDispoChambre(){
        session_start();

        $q= $this->bdd->prepare('SELECT * FROM user where email=?');
        $q -> execute(array($_SESSION['user']));
        $data = $q -> fetch();
        $id_user=$data['id'];

        $q2= $this->bdd->prepare('select * from hotel_partenaire where id_gerant=?');
        $q2 -> execute(array($id_user));
        $data2 = $q2 -> fetch();
        $id_hotel=$data2['id'];

        $mois=$_GET['mois'];
        $annee=$_GET['annee'];

        $q3= $this->bdd->prepare('select * from chambre where id_hotel=? and type=?');
        $q3 -> execute(array($id_hotel,2));
        echo "<h2>Chambres 2 personnes</h2>";
        foreach($q3 as $data3){
            $idch=$data3['id'];
            $numeroch=$data3['numero'];
            $jour=$_GET['jour'];

            // $q4 = $bdd -> prepare('select disponible from disponibilite_chambre where id_chambre=? and jour=? and mois=? and annee=?');
            // $q4 -> execute(array($idch,$_GET['jour'],$_GET['mois'], $_GET['annee']));
            // $data4 = q4 -> fetch();
                // echo "<button onclick='getNumeroChambre($jour,$mois,$annee,$numeroch)'>".$data3['numero']."</button>";
                echo "<a href='../controllers/gestionDispos.php?mois=$mois&annee=$annee&jour=$jour&idch=$idch'>".$data3['numero']."</a>";
                // echo data4['disponible'];
            } 

        $q4= $this->bdd->prepare('select * from chambre where id_hotel=? and type=?');
        $q4 -> execute(array($id_hotel,3));
        echo "<h2>Chambres 3 personnes</h2>";
        foreach($q4 as $data4){
            $idch=$data4['id'];
            $numeroch=$data4['numero'];
            $jour=$_GET['jour'];
                // echo "<button onclick='getNumeroChambre($jour,$mois,$annee,$numeroch)'>".$data3['numero']."</button>";
                echo "<a href='../controllers/gestionDispos.php?mois=$mois&annee=$annee&jour=$jour&idch=$idch'>".$data4['numero']."</a>";
            }

        $q5= $this->bdd->prepare('select * from chambre where id_hotel=? and type=?');
        $q5 -> execute(array($id_hotel,4));
        echo "<h2>Chambres 4 personnes</h2>";
        foreach($q5 as $data5){
            $idch=$data5['id'];
            $numeroch=$data5['numero'];
            $jour=$_GET['jour'];
                // echo "<button onclick='getNumeroChambre($jour,$mois,$annee,$numeroch)'>".$data3['numero']."</button>";
                echo "<a href='../controllers/gestionDispos.php?mois=$mois&annee=$annee&jour=$jour&idch=$idch'>".$data5['numero']."</a>";
            }

        $q6= $this->bdd->prepare('select * from chambre where id_hotel=? and type=?');
        $q6 -> execute(array($id_hotel,6));
        echo "<h2>Chambres 6 personnes</h2>";
        foreach($q6 as $data6){
            $idch=$data6['id'];
            $numeroch=$data6['numero'];
            $jour=$_GET['jour'];
                // echo "<button onclick='getNumeroChambre($jour,$mois,$annee,$numeroch)'>".$data3['numero']."</button>";
                echo "<a href='../controllers/gestionDispos.php?mois=$mois&annee=$annee&jour=$jour&idch=$idch'>".$data6['numero']."</a>";
            }

    }
}