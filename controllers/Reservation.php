<?php

class Reservation
{
    private $id;
    private $id_vip;
    private $id_hotel;
    private $nbreChambre;
    private $jourA;
    private $moisA;
    private $anneeA;
    private $jourD;
    private $moisD;
    private $anneeD;


    public function __construct($id, $id_vip, $id_hotel, $nbreChambre, $jourA, $moisA, $anneeA, $jourD, $moisD, $anneeD)
    {
        $this->id = $id;
        $this->id_vip = $id_vip;
        $this->id_hotel = $id_hotel;
        $this->nbreChambre = $nbreChambre;
        $this->jourA = $jourA;
        $this->moisA = $moisA;
        $this->anneeA = $anneeA;
        $this->jourD = $jourD;
        $this->moisD = $moisD;
        $this->anneeD = $anneeD;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdVip()
    {
        return $this->id_vip;
    }

    /**
     * @param mixed $id_vip
     */
    public function setIdVip($id_vip)
    {
        $this->id_vip = $id_vip;
    }

    /**
     * @return mixed
     */
    public function getIdHotel()
    {
        return $this->id_hotel;
    }

    /**
     * @param mixed $id_hotel
     */
    public function setIdHotel($id_hotel)
    {
        $this->id_hotel = $id_hotel;
    }

    /**
     * @return mixed
     */
    public function getNbreChambre()
    {
        return $this->nbreChambre;
    }

    /**
     * @param mixed $nbreChambre
     */
    public function setNbreChambre($nbreChambre)
    {
        $this->nbreChambre = $nbreChambre;
    }

    /**
     * @return mixed
     */
    public function getJourA()
    {
        return $this->jourA;
    }

    /**
     * @param mixed $jourA
     */
    public function setJourA($jourA)
    {
        $this->jourA = $jourA;
    }

    /**
     * @return mixed
     */
    public function getMoisA()
    {
        return $this->moisA;
    }

    /**
     * @param mixed $moisA
     */
    public function setMoisA($moisA)
    {
        $this->moisA = $moisA;
    }

    /**
     * @return mixed
     */
    public function getAnneeA()
    {
        return $this->anneeA;
    }

    /**
     * @param mixed $anneeA
     */
    public function setAnneeA($anneeA)
    {
        $this->anneeA = $anneeA;
    }

    /**
     * @return mixed
     */
    public function getJourD()
    {
        return $this->jourD;
    }

    /**
     * @param mixed $jourD
     */
    public function setJourD($jourD)
    {
        $this->jourD = $jourD;
    }

    /**
     * @return mixed
     */
    public function getMoisD()
    {
        return $this->moisD;
    }

    /**
     * @param mixed $moisD
     */
    public function setMoisD($moisD)
    {
        $this->moisD = $moisD;
    }

    /**
     * @return mixed
     */
    public function getAnneeD()
    {
        return $this->anneeD;
    }

    /**
     * @param mixed $anneeD
     */
    public function setAnneeD($anneeD)
    {
        $this->anneeD = $anneeD;
    }
}