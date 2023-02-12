<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/vip.css">
    <link rel="stylesheet" href="../assets/css/page.css">
    <title>VIP</title>
</head>
<body>
    <h2 class="titre_partenaires" id="titre_reserver">Reserver un Hotel</h2>

    

    <div id="container_reservation_vip">
    <form id="reserver_hotel_vip"  action="affichage_vip_traitement.php" >
                <h2>Filtres:</h2>
                <p>Nombre de Chambre à reserver</p>
                <input type="number" name="nbreChambre" required>
                
                <p>Chambre(s) de </p>
                <select name="nbPersonnes" required>
                            <option value="2">2</option>
                            <option  value="3">3</option>
                            <option  value="4">4</option>
                            <option  value="6">6</option>
                </select>
                <p> personnes</p>

                <p>Date d'Arrivée</p>
                <div class="date">
                <select name="jourA" required>
                    <?php
                        for($j=1;$j<32;$j++){
                            echo '<option value="'.$j.'">'.$j.'</option>';
                        }
                    ?>
                </select>

                <select name="moisA" required>
                    <?php
                        for($m=1;$m<13;$m++){
                            echo '<option value="'.$m.'">'.$m.'</option>';
                        }
                    ?>
                </select>

                <select name="anneeA" required>
                    <?php
                        $a=2022;
                        echo '<option value="'.$a.'">'.$a.'</option>';
                        
                    ?>
                </select>
                    </div>

            
                

            <p>Date de Depart</p>
            <div class="date">
            <select name="jourD" required>
                    <?php
                        for($j=1;$j<32;$j++){
                            echo '<option value="'.$j.'">'.$j.'</option>';
                        }
                    ?>
                </select>

                <select name="moisD" required>
                    <?php
                        for($m=1;$m<13;$m++){
                            echo '<option value="'.$m.'">'.$m.'</option>';
                        }
                    ?>
                </select>

                <select name="anneeD" required>
                    <?php
                        $a=2022;
                        echo '<option value="'.$a.'">'.$a.'</option>';
                        
                    ?>
                </select>
                    </div>
                <button type="submit" class="btn">Rechercher</button>
                
            </form>
            
        </div>


</body>
</html>