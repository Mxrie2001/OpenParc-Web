<?php
class Hotel{

    private $id;
    private $nom;
    private $localisation;
    private $description;
    private $nb_etoiles;
    private $image;
    private $id_gerant;

    public function __construct($id, $nom, $localisation, $description, $nb_etoiles, $image, $id_gerant)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->localisation = $localisation;
        $this->description = $description;
        $this->nb_etoiles = $nb_etoiles;
        $this->image = $image;
        $this->id_gerant = $id_gerant;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getLocalisation()
    {
        return $this->localisation;
    }

    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getNbEtoiles()
    {
        return $this->nb_etoiles;
    }

    public function setNbEtoiles($nb_etoiles)
    {
        $this->nb_etoiles = $nb_etoiles;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getIdGerant()
    {
        return $this->id_gerant;
    }

    public function setIdGerant($id_gerant)
    {
        $this->id_gerant = $id_gerant;
    }


}

?>