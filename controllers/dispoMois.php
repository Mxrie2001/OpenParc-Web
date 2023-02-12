<?php

// afficher 12 mois à partir du mois actuel
        $m = array('','Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
        
        $date1 = date("n-Y");
        $decoupe_date1 = explode('-', $date1);
        $mois_date1 = $decoupe_date1[0];
        $annee_date1 = $decoupe_date1[1];
        echo '<div id="mois">';
        
        $annee = $annee_date1;
        for($i=($mois_date1-1); $i<($mois_date1-1+12); $i++){
            $mois=$i+1;
            echo "<a href='dispoJours.php?mois=$mois&annee=$annee&jour=1' class='mois_annee'><p>".$m[1+($i%12)]." ".$annee."</p></a>";
        
// Décembre ? on change d'année
            if(1+($i%12)==12) { $annee++; }
        }
        echo '</div>';
    ?>