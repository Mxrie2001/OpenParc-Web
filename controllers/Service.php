<?php

class Service
{
    private $id;
    private $nom_service;
    private $description;
    private $id_hotel;

    /**
     * @param $id
     * @param $nom_service
     * @param $description
     * @param $id_hotel
     */
    public function __construct($id, $nom_service, $description, $id_hotel)
    {
        $this->id = $id;
        $this->nom_service = $nom_service;
        $this->description = $description;
        $this->id_hotel = $id_hotel;
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
    public function getNomService()
    {
        return $this->nom_service;
    }

    /**
     * @param mixed $nom_service
     */
    public function setNomService($nom_service)
    {
        $this->nom_service = $nom_service;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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



}