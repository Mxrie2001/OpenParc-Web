<?php
require '../controllers/Hotel.php';
require 'connectDB.php';

class HotelRepository{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function addHotel(Hotel $hotel){
        $q = $this->bdd->prepare('INSERT INTO `hotel_partenaire` (`nom`,`localisation`,`description`, `nb_etoiles`, `image`, `id_gerant`) VALUES (:nom, :localisation, :description, :nb_etoiles, :image, :id_gerant)');

        $q->execute(array(':nom' => $hotel->getNom(), ':localisation' => $hotel->getLocalisation(), ':description' => $hotel->getDescription(), ':nb_etoiles' => $hotel->getNbEtoiles(), ':image' => $hotel->getImage(), ':id_gerant' => $hotel->getIdGerant()));
        return true;
    }

    public function removeHotel(Hotel $hotel){
        $q =$this->bdd->prepare('DELETE from `hotel_partenaire` where `id` = :id');

        $q->execute(array(':id' => $hotel->getId()));
    }

    public function updateUser(Hotel $hotel){
        $q = $this->bdd->prepare('UPDATE `hotel_partenaire` SET `nom` = :nom,`localisation` = :localisation,`description` = :description, `nb_etoiles` = :nb_etoiles, `image` = :image, `id_gerant` = :id_gerant WHERE `id` = :id');

        $q->execute(array(':id' => $hotel->getId(), ':nom' => $hotel->getNom(), ':localisation' => $hotel->getLocalisation(), ':description' => $hotel->getDescription(), ':nb_etoiles' => $hotel->getNbEtoiles(), ':image' => $hotel->getImage(), ':id_gerant' => $hotel->getIdGerant()));
    }

    public function allHotel(){
        $q= $this->bdd->prepare('SELECT * FROM hotel_partenaire');
        $q-> execute();
        foreach($q as $data){
            $id=$data['id'];
            $q2 = $this->bdd->prepare('SELECT nom FROM hotel_partenaire where id=?');
            $q2->execute(array($id));
            echo '<div id="container">';
            echo "<a href='../views/partenaires.php?id=$id'><img id='delete' src='../assets/img/cross.png' alt='delete'></a>";
            echo "<a href='../views/detailsPartenaires.php?test=$id'><p>";
            echo $data['nom'];
            echo "</p></a> <a href='../views/modifyPartenaires.php?test=$id'><img id='modify' src='../assets/img/modify.png' alt='modify'></a> </div>";
            }
    }

    public function deleteHotel(int $id){
        $q3= $this->bdd->prepare('Delete from hotel_partenaire where id=?');
        $q3->execute(array($id));
        echo "<meta http-equiv='refresh' content='0.1;URL=./partenaires.php'>";
    }
    

    public function addGerant($nomG,$prenomG,$emailG,$pwdG){
        $cost = ['cost' => 10];
        $pwd = password_hash($pwdG, PASSWORD_BCRYPT, $cost);

        $query= $this->bdd->prepare('INSERT INTO `user` (`nom`, `prenom`, `email`, `pwd`, `role`) VALUES (?,?,?,?,4)');
        $query -> execute(array($nomG, $prenomG, $emailG, $pwd));
        echo '<meta http-equiv="Refresh" content="0;URL=./partenaires.php">';
    }

    public function addPartenaire($nom, $adresse, $description, $etoile, $image, $gerant){
  
            $query= $this->bdd->prepare('INSERT INTO `hotel_partenaire` (`nom`, `localisation`, `description`, `nb_etoiles`, `image`, `id_gerant`) VALUES (?,?,?,?,?,?)');
            $query -> execute(array($nom, $adresse, $description, $etoile, $image, $gerant));
            echo '<meta http-equiv="Refresh" content="0;URL=partenaires.php">';
  
            $query2= $this->bdd->prepare('SELECT * from `hotel_partenaire`where `id_gerant`=?');
            $query2 -> execute(array($gerant));
            $data2=$query2 -> fetch();
            $id_hotel=$data2['id'];
            
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
                  $query3= $this->bdd->prepare('INSERT INTO `disponibilite_hotel` (`id_hotel`, `jour`, `mois`, `annee`, `disponible`) VALUES (?,?,?,?,?)');
                  $query3 -> execute(array($id_hotel, $jour, $mois, $annee, 0));
              }
            
            echo '<meta http-equiv="Refresh" content="0;URL=partenaires.php">';
          }
    }

    public function affichageDetailHotel(int $id){
        $q= $this->bdd->prepare('SELECT * FROM hotel_partenaire where id=?');
        $q-> execute(array($id));
        $data = $q -> fetch();

            echo "<div id='details_hotels_staff'>";
            echo "<div id='presentation_image'>";
            echo '<img id="img_hotel" src="'.$data['image'].'" />';
            echo "</div>";

            echo "<div id='infoG'>";

            echo '<div><p> Nom: '.$data['nom'].'</p></div>';
            echo '<div><p> Localisation: '.$data['localisation'].'</p></div>';
            echo '<div><p> Nombre d étoiles: '.$data['nb_etoiles'].'</p></div>';
            echo '<div><p> Description: '.$data['description'].'</p></div>';
            
            echo "</div>";
            echo "</div>";
    }

    public function recuperationModifHotel(int $id){
        $query2= $this->bdd->prepare('SELECT * FROM `hotel_partenaire` WHERE `id`=?');
        $query2 -> execute(array($id));
        $data = $query2 -> fetch();
                echo '
                <div id="container_modif">
                <form id="modif_partenaire_staff" action="modifyPartenaires.php" >
                
                <h1>Modifier un partenaire</h1>
                
                <input type="hidden" name="id_form" value="'.$id.'" required>
                <label for="nom"><b>Nom</b></label>
                <input type="text" name="nom" value="'.$data['nom'].'" required>

                <label for="adresse"><b>Adresse</b></label>
                <input type="text" name="adresse" value="'.$data['localisation'].'" required>

                <label for="desc"><b>Description</b></label>
                <input type="text" name="description" value="'.$data['description'].'" required>

                <label for="etoile"><b>Nombre d étoiles</b></label>
                <input type="number" name="etoile" value="'.$data['nb_etoiles'].'" required>

                <label for="image"><b>Image</b></label>
                <input type="text"  name="image" value="'.$data['image'].'" required>

                <label for="gerant"><b>Gérant</b></label>
                <input type="number"  name="gerant" value="'.$data['id_gerant'].'" required>

                <button type="submit" class="btn">Modifier</button>
                
                </form>

                </div>

                ';

    }

    public function traitementModifPartenaire($nom,$adresse,$description,$etoile,$image,$gerant,$id){
            $query= $this->bdd->prepare("UPDATE `hotel_partenaire` SET `nom`=?,`localisation`=?,`description`=?,`nb_etoiles`=?,`image`=?,`id_gerant`=? WHERE `id` = ?");
            $query -> execute(array($nom,$adresse,$description,$etoile,$image,$gerant,$id));
            header('Location: ./partenaires.php');

        }

    public function affichageHotelParId(){
                    session_start();

                    $q= $this->bdd->prepare('SELECT * FROM user where email=?');
                    $q -> execute(array($_SESSION['user']));
                    $data = $q -> fetch();
                    $id_user=$data['id'];


                    $q2= $this->bdd->prepare('SELECT * FROM hotel_partenaire where id_gerant=?');
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
    }

    // public function updateImageHotel($image, $id_user){
        
    //         $query= $this->bdd->prepare("UPDATE `hotel_partenaire` SET `image`=? WHERE `id_gerant` = ?");
    //         $query -> execute(array($image, $id_user));
    //         echo '<meta http-equiv="Refresh" content="0;URL=monHotel.php">';

    //         $query2= $this->bdd->prepare('SELECT `image` FROM `hotel_partenaire` WHERE `id_gerant`=?');
    //         $query2 -> execute(array($id_user));
    //         $data = $query2 -> fetch();

    //         echo '
    //             <input type="text" name="image" value="'.$data['image'].'" required>
    //         ';

    // }

    
    

}

?>