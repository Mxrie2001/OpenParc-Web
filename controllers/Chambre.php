<?php

class Chambre
{
    private $id;
    private $numero;
    private $type;
    private $id_hotel;

    /**
     * @param $id
     * @param $numero
     * @param $type
     * @param $id_hotel
     */
    public function __construct($id, $numero, $type, $id_hotel)
    {
        $this->id = $id;
        $this->numero = $numero;
        $this->type = $type;
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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
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