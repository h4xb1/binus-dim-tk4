<?php

class Pelanggan extends Controller
{
    public function index()
    {
        $menu = 'pelanggan';

        $status = isset($_GET['status']) ? $_GET['status'] : null;
        $action = isset($_GET['action']) ? $_GET['action'] : null;
        $nama_pelanggan = isset($_GET['nama_pelanggan']) ? $_GET['nama_pelanggan'] : null;

        $pelanggan_model = $this->loadModel('PelangganModel');
        $data_pelanggan = $pelanggan_model->getAllPelanggan($nama_pelanggan);

        require 'app/views/layouts/header.php';
        require 'app/views/layouts/navbar.php';
        require 'app/views/pelanggan/index.php';
        require 'app/views/layouts/footer.php';
    }

    public function tambah()
    {

        require 'app/views/layouts/header.php';
        require 'app/views/layouts/navbar.php';
        require 'app/views/pelanggan/add.php';
        require 'app/views/layouts/footer.php';
    }

    public function proses_tambah()
    {
        try {
            if (isset($_POST["tambah_pelanggan"])) {
                $pelanggan_model = $this->loadModel('PelangganModel');
                $pelanggan_model->setNamaPelanggan($_POST["NamaPelanggan"]);
                $pelanggan_model->setAlamatPelanggan($_POST["AlamatPelanggan"]);
                $pelanggan_model->setNoTelp($_POST["NoTelp"]);
                $pelanggan_model->savePelanggan();
            }

            header('location: ' . URL . 'pelanggan?status=success&action=add');
        } catch (Exception $e) {
            header('location: ' . URL . 'pelanggan?status=error&action=edit');
        }
    }

    public function proses_hapus()
    {
        try {
            if (isset($_POST["hapus_pelanggan"])) {
                $pelanggan_model = $this->loadModel('PelangganModel');
                $pelanggan_model->setIdPelanggan($_POST["IdPelanggan"]);
                $pelanggan_model->deletePelanggan();
            }

            header('location: ' . URL . 'pelanggan?status=success&action=delete');
        } catch (Exception $e) {
            header('location: ' . URL . 'pelanggan?status=error&action=edit');
        }
    }

    public function edit($id)
    {
        $pelanggan_model = $this->loadModel('PelangganModel');
        $pelanggan_model->setIdPelanggan($id);
        $data_pelanggan = $pelanggan_model->getPelangganById();

        require 'app/views/layouts/header.php';
        require 'app/views/layouts/navbar.php';
        require 'app/views/pelanggan/edit.php';
        require 'app/views/layouts/footer.php';
    }

    public function proses_edit()
    {
        try {
            if (isset($_POST["edit_pelanggan"])) {
                $pelanggan_model = $this->loadModel('PelangganModel');
                $pelanggan_model->setIdPelanggan($_POST["IdPelanggan"]);
                $pelanggan_model->setNamaPelanggan($_POST["NamaPelanggan"]);
                $pelanggan_model->setAlamatPelanggan($_POST["AlamatPelanggan"]);
                $pelanggan_model->setNoTelp($_POST["NoTelp"]);
                $pelanggan_model->editPelanggan();
            }

            header('location: ' . URL . 'pelanggan?status=success&action=edit');
        } catch (Exception $e) {
            header('location: ' . URL . 'pelanggan?status=error&action=edit');
        }
    }

    public function detail($id)
    {

        $pelanggan_model = $this->loadModel('PelangganModel');
        $pelanggan_model->setIdPelanggan($id);
        $data_pelanggan = $pelanggan_model->getPelangganById();

        require 'app/views/layouts/header.php';
        require 'app/views/layouts/navbar.php';
        require 'app/views/pelanggan/detail.php';
        require 'app/views/layouts/footer.php';
    }
}
