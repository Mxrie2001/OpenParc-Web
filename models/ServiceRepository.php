<?php
require '../controllers/Service.php';
require 'connectDB.php';

class ServiceRepository
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function affichageServiceHotel(){
        session_start();

        $q= $this->bdd->prepare('SELECT * FROM user where email=?');
        $q -> execute(array($_SESSION['user']));
        $data = $q -> fetch();
        $id_user=$data['id'];

        $q2= $this->bdd->prepare('select * from hotel_partenaire where id_gerant=?');
        $q2 -> execute(array($id_user));
        $data2 = $q2 -> fetch();
        $id_hotel=$data2['id'];

            
        $q= $this->bdd->prepare('SELECT * FROM services where id_hotel=?');
        $q-> execute(array($id_hotel));

        foreach($q as $data){
            $id=$data['id'];

            $q2= $this->bdd->prepare('SELECT nom_service FROM services where id_hotel=?');
            $q2->execute(array($id_hotel));
            echo '<div id="container">';
            echo "<a href='./service.php?id=$id'><img id='delete' src='../assets/img/cross.png' alt='delete'></a>";
            echo "<a href='./detailsService.php?test=$id'><p>";
            echo $data['nom_service'];
            echo "</p></a> <a href='./modifyService.php?test=$id'><img id='modify' src='../assets/img/modify.png' alt='modify'></a> </div>";

        }
    }

    public function deleteService(int $id){
        $q3= $this->bdd->prepare('Delete from services where id=?');
        $q3->execute(array($id));
        echo "<meta http-equiv='refresh' content='0.1;URL=./service.php'>";
    }

    public function addService($nom, $description){

        session_start();

        $q= $this->bdd->prepare('SELECT * FROM user where email=?');
        $q -> execute(array($_SESSION['user']));
        $data = $q -> fetch();
        $id_user=$data['id'];

        $q2= $this->bdd->prepare('select * from hotel_partenaire where id_gerant=?');
        $q2 -> execute(array($id_user));
        $data2 = $q2 -> fetch();
        $id_hotel=$data2['id'];

        $query= $this->bdd->prepare('INSERT INTO `services` (`nom_service`, `description`, `id_hotel`) VALUES (?,?,?)');
        $query -> execute(array($nom, $description,$id_hotel));
        echo '<meta http-equiv="Refresh" content="0;URL=service.php">';
    }

    public function affichageServiceDetail($recup){
        
        $q= $this->bdd->prepare('SELECT * FROM services where id=?');
        $q-> execute(array($recup));
        $data = $q -> fetch();


            echo "<div id='infoG'>";

            echo '<div><p> Nom: '.$data['nom_service'].'</p></div>';
            echo '<div><p> Description: '.$data['description'].'</p></div>';
            

            echo "</div>";
    }

    public function traitementModifService($nom, $description, $recup){
        $query= $this->bdd->prepare("UPDATE `services` SET `nom_service`=?,`description`=? WHERE `id` = ?");
        $query -> execute(array($nom, $description,$recup));
        header('Location: ./service.php');

    }

    public function recuperationModifService($recup){
        $query2= $this->bdd->prepare('SELECT * FROM `services` WHERE `id`=?');
        $query2 -> execute(array($recup));
        $data = $query2 -> fetch();
        echo '     
                <div id="container_modif">
                    <form id="modif_partenaire_staff" action="modifyService.php" >
                        <h1>Modifier un Service</h1>
                        
                        
                        
                        <input type="hidden" name="id_form" value="'.$recup.'" required>
                        
                        
                        
        
                        <label for="nom"><b>Nom du service</b></label>
                        <input type="text" name="nom" value="'.$data['nom_service'].'" required>
        
                        <label for="description"><b>Description</b></label>
                        <input type="text" name="description" value="'. $data['description'].'" required>
        
        
                        <button type="submit" class="btn">Modifier</button>
                        
                    </form>
            </div>
            ';
    }
}