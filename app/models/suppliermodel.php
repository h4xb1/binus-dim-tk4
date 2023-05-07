<?php

class SupplierModel
{
    /* Properties */
    private $IdSupplier = null;
    private $NamaSupplier;
    private $AlamatSupplier;
    private $NoTelp;
    private $db;

    function __construct($db) {
        $this->db = $db;
    }

    function setIdSupplier($IdSupplier) 
    {
        $this->IdSupplier = $IdSupplier;
    }

    function setNamaSupplier($NamaSupplier)
    {
        $this->NamaSupplier = $NamaSupplier;
    }

    function setAlamatSupplier($AlamatSupplier)
    {
        $this->AlamatSupplier = $AlamatSupplier;
    }

    function setNoTelp($NoTelp)
    {
        $this->NoTelp = $NoTelp;
    }

    function getIdSupplier()
    {
        return $this->IdSupplier;
    }

    function getNamaSupplier()
    {
        return $this->NamaSupplier;
    }

    function getAlamatSupplier()
    {
        return $this->AlamatSupplier;
    }

    function getNoTelp()
    {
        return $this->NoTelp;
    }

    public function getAllSupplier()
    {
        try {
            $query = "SELECT * FROM Supplier";
            $prepareDB = $this->db->prepare($query);
            $prepareDB->execute();
            $result = $prepareDB->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}