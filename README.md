# OpenParc Web


## Explication :

Réalisation d'un site web de reservation de chambre d'hotel durant un tournoi de tennis. Differents acteurs ayant acces à differentes pages. 3 acteurs: VIP(joueurs, arbitres), Staff, Hotel.

## Fonctionalités

### Acces general
1. Inscription
- Possibilité de s'inscrire en temps que joueur, arbitre ou autre.

2. Connexion
- Possibilité de se connecter apres la création de son compte pour pouvoir acceder aux pages qui nous sont destinées en temps que vip, staff ou gerant d'hotel.

### Coté Staff

1. Home
- Possibilité d'acceder aux differents partenaires et réservations

2. Page "partenaire"
- Affichage de tous les partenaires, possibilité d'ajouter un gérant (donc son compte) et un partenaire, d'acceder à ses informations de les, modifier et de supprimer un partenaire.

3. Page "reservation"
- Affichage de toutes les reservations en fonction de l'hotel avec toute les informations nécéssaires.

### Coté Hotel

1. Home
- Possibilité d'acceder aux informations concernant mon hotel, mes services offerts ainsi que les disponibilités de l'hotel chaque jour.

2. Page "mon hotel"
- Affichage des informations de mon hotel avec la possibilité de les modifier grace à une pop-up. Bouton pour acceder aux chambres.

3. Page "chambres de l'hotel"
- Affichage de toutes les chambres de l'hotel en fonction de leur type avec la possibilité d' en ajouter en spécifiant son type et son numéro

4. Page "services offerts"
- Affichage de tout les services offerts de mon hotel avec la possibilité d'en ajouter en spécifiant son nom avec une description. possibilité d'afficher les details d'un service et de le supprimer.

5. Page "disponibilités"
- Affichage des 12 mois à partir du mois actuel, en cliquant dessus on accede aux disponibilités par jours, respectant le calendrier.
Affichage des disponibilitées par jours et par chambres. Le gerant à la possibilité de modifier la disponibilité de la chambre en cliquant sur cette derniere

N.B Les dates ne dépendent pas des dates des tournois mais sont généré automatiquement à partir de la date actuelle (12 mois)

### Coté VIP

1. Page de reservation
- Affichage des differents filtres que le VIP doit remplir pour commencer sa reservation. A savoir: Le nombre de chambre à reserver, le type de chambre, la date d'arrivée et de départ souhaité.

2. Page de résultats
- Affichage des hotels correspondant aux filtres. Ayant donc de disponible entre la date d'arrivé et de départ n chambre de x personnes. Un arbitre n'aura pas la possibilité de reserver dans un hotel ou un joueur aura déjà fait une reservation et inversement.

3. Page de validation de réservation
- En cliquant sur un hotel à reserver on atterit sur cette page. Les données de l'hotel et de ses services ainsi que les données entrée par le VIP qu'il peut uniquement lire, en cliquant sur "réserver" la chambre disponible sera reservé sur le planning de l'hotel.

## Comptes utiles selon la BDD :

1. Joueur
- user: joueur@gmail.com
- pwd: bouh

2. Arbitre
- user: arbitre@gmail.com
- pwd: bouh

3. Staff
- user: staff@gmail.com
- pwd: bouh

4. Hotels
- user: hotel@gmail.com
- pwd: bouh

- user: hotel2@gmail.com
- pwd: bouh

- user: hotel3@gmail.com
- pwd: bouh
