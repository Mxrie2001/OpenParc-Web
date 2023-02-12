<?php
require '../controllers/Reservation.php';
require 'connectDB.php';

class ReservationRepository
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function afficheReservation(){
        $q= $this->bdd->prepare('SELECT * FROM hotel_partenaire');
        $q-> execute();
        echo '<div id="container_reservation">';
            foreach($q as $data){
                $id=$data['id'];
                echo '<div id="container_reservation_hotel">';
                echo "<h2>".$data['nom']."</h2>";

                $q2= $this->bdd->prepare('SELECT * FROM reservation where id_hotel=?');
                $q2->execute(array($id));
                foreach($q2 as $data2){
                echo '<div id="container_info">';
                echo "<p>Reservation N°".$data2['id']."</p>";

                $q3= $this->bdd->prepare('SELECT * FROM user where `id`=?');
                $q3-> execute(array($data2['id_vip']));
                foreach($q3 as $data3){
                    echo "<p>Client: ".$data3['nom']." ".$data3['prenom']."</p>";
                }
                
                echo "<p>Nombre de Chambres :".$data2['nbreChambre']."</p>";
                echo "<p>Type de Chambre :".$data2['typeChambre']."</p>";
                echo "<p>Reservation du ".$data2['jourA']."/".$data2['moisA']."/".$data2['anneeA']." au ".$data2['jourD']."/".$data2['moisD']."/".$data2['anneeD']."</p>";

                
                echo "</div>";
    
                }
                echo "</div>";

                
            }
        }


}