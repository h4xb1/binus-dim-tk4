<?php

class PembelianModel
{
    /* Properties */
    private $IdPembelian = null;
    private $IdPengguna = null;
    private $IdBarang = null;
    private $IdPelanggan = null;
    private $JumlahPembelian;
    private $HargaBeli;
    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    function setIdPembelian($IdPembelian)
    {
        $this->IdPembelian = $IdPembelian;
    }

    function setIdPengguna($IdPengguna)
    {
        $this->IdPengguna = $IdPengguna;
    }

    function setIdBarang($IdBarang)
    {
        $this->IdBarang = $IdBarang;
    }

    function setIdPelanggan($IdPelanggan)
    {
        $this->IdPelanggan = $IdPelanggan;
    }

    function setJumlahPembelian($JumlahPembelian)
    {
        $this->JumlahPembelian = $JumlahPembelian;
    }

    function setHargaBeli($HargaBeli)
    {
        $this->HargaBeli = $HargaBeli;
    }

    function getIdPembelian()
    {
        return $this->IdPembelian;
    }

    function getIdPengguna()
    {
        return $this->IdPengguna;
    }

    function getIdBarang()
    {
        return $this->IdBarang;
    }

    function getIdPelanggan()
    {
        return $this->IdPelanggan;
    }

    function getJumlahPembelian()
    {
        return $this->JumlahPembelian;
    }

    function getHargaBeli()
    {
        return $this->HargaBeli;
    }

    public function deletePembelianByIdAttribute($attribute)
    {
        try {
            $query = "DELETE FROM Pembelian WHERE $attribute = :$attribute";
            $prepareDB = $this->db->prepare($query);
            $prepareDB->bindParam(":$attribute", $this->$attribute);
            $prepareDB->execute();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAllPembelian()
    {
        try {
            $query = "SELECT * FROM Pembelian";
            $prepareDB = $this->db->prepare($query);
            $prepareDB->execute();
            $result = $prepareDB->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
