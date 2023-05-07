<?php

class PenjualanModel
{
    /* Properties */
    private $IdPenjualan = null;
    private $IdPengguna = null;
    private $IdBarang = null;
    private $IdPelanggan = null;
    private $JumlahPenjualan;
    private $HargaJual;
    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    function setIdPenjualan($IdPenjualan)
    {
        $this->IdPenjualan = $IdPenjualan;
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

    function setJumlahPenjualan($JumlahPenjualan)
    {
        $this->JumlahPenjualan = $JumlahPenjualan;
    }

    function setHargaJual($HargaJual)
    {
        $this->HargaJual = $HargaJual;
    }

    function getIdPenjualan()
    {
        return $this->IdPenjualan;
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

    function getJumlahPenjualan()
    {
        return $this->JumlahPenjualan;
    }

    function getHargaJual()
    {
        return $this->HargaJual;
    }

    public function deletePenjualanByIdAttribute($attribute)
    {
        try {
            $query = "DELETE FROM Penjualan WHERE $attribute = :$attribute";
            $prepareDB = $this->db->prepare($query);
            $prepareDB->bindParam(":$attribute", $this->$attribute);
            $prepareDB->execute();
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAllPenjualan()
    {
        try {
            $query = "SELECT * FROM Penjualan";
            $prepareDB = $this->db->prepare($query);
            $prepareDB->execute();
            $result = $prepareDB->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
