<?php
class User{
    private $login;
    private $prenom;
    private $nom;
    private $pwd;
    private $rank;


    public function __construct($login, $prenom, $nom, $pwd, $rank)
    {
        $this->login = $login;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->pwd = $pwd;
        $this->rank = $rank;
    }


    public function getLogin()
    {
        return $this->login;
    }


    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPwd()
    {
        return $this->pwd;
    }


    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }


    public function getRank()
    {
        return $this->rank;
    }


    public function setRank($rank)
    {
        $this->rank = $rank;
    }


}
?>