<?php

class PelangganModel
{
    /* Properties */
    private $IdPelanggan = null;
    private $NamaPelanggan;
    private $AlamatPelanggan;
    private $NoTelp;
    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    function setIdPelanggan($IdPelanggan)
    {
        $this->IdPelanggan = $IdPelanggan;
    }

    function setNamaPelanggan($NamaPelanggan)
    {
        $this->NamaPelanggan = $NamaPelanggan;
    }

    function setAlamatPelanggan($AlamatPelanggan)
    {
        $this->AlamatPelanggan = $AlamatPelanggan;
    }

    function setNoTelp($NoTelp)
    {
        $this->NoTelp = $NoTelp;
    }



    function getIdPelanggan()
    {
        return $this->IdPelanggan;
    }

    function getNamaPelanggan()
    {
        return $this->NamaPelanggan;
    }

    function getAlamatPelanggan()
    {
        return $this->AlamatPelanggan;
    }

    function getNoTelp()
    {
        return $this->NoTelp;
    }


    public function getAllPelanggan($nama_pelanggan = null)
    {
        try {
            $query = "SELECT * FROM Pelanggan";
            if ($nama_pelanggan != null) {
                $query .= " WHERE NamaPelanggan LIKE '%$nama_pelanggan%'";
            }
            $prepareDB = $this->db->prepare($query);
            $prepareDB->execute();
            $result = $prepareDB->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function savePelanggan()
    {
        try {
            $query = "INSERT INTO Pelanggan (NamaPelanggan, AlamatPelanggan, NoTelp) VALUES (:NamaPelanggan, :AlamatPelanggan, :NoTelp)";
            $prepareDB = $this->db->prepare($query);
            $prepareDB->bindParam(':NamaPelanggan', $this->NamaPelanggan);
            $prepareDB->bindParam(':AlamatPelanggan', $this->AlamatPelanggan);
            $prepareDB->bindParam(':NoTelp', $this->NoTelp);
            $prepareDB->execute();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deletePelanggan()
    {
        try {
            require_once 'app/models/penjualanmodel.php';
            require_once 'app/models/pembelianmodel.php';
            
            $model_pebelian = new PembelianModel($this->db);
            $model_pebelian->setIdPelanggan($this->IdPelanggan);
            $model_pebelian->deletePembelianByIdAttribute("IdPelanggan");

            $model_penjualan = new PenjualanModel($this->db);
            $model_penjualan->setIdPelanggan($this->IdPelanggan);
            $model_penjualan->deletePenjualanByIdAttribute("IdPelanggan");

            $query = "DELETE FROM Pelanggan WHERE IdPelanggan = :IdPelanggan";
            $prepareDB = $this->db->prepare($query);
            $prepareDB->bindParam(':IdPelanggan', $this->IdPelanggan);
            $prepareDB->execute();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getPelangganById()
    {
        try {
            $query = "SELECT * FROM Pelanggan WHERE IdPelanggan = :IdPelanggan";
            $prepareDB = $this->db->prepare($query);
            $prepareDB->bindParam(':IdPelanggan', $this->IdPelanggan);
            $prepareDB->execute();
            $result = $prepareDB->fetch();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function editPelanggan()
    {
        try {
            $query = "UPDATE Pelanggan SET NamaPelanggan = :NamaPelanggan, AlamatPelanggan = :AlamatPelanggan, NoTelp = :NoTelp WHERE IdPelanggan = :IdPelanggan";
            $prepareDB = $this->db->prepare($query);
            $prepareDB->bindParam(':NamaPelanggan', $this->NamaPelanggan);
            $prepareDB->bindParam(':AlamatPelanggan', $this->AlamatPelanggan);
            $prepareDB->bindParam(':NoTelp', $this->NoTelp);
            $prepareDB->bindParam(':IdPelanggan', $this->IdPelanggan);
            $prepareDB->execute();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
