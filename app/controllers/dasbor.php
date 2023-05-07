<?php

class DasborController extends Controller
{
    public function index()
    {
        $barang_model = $this->loadModel('BarangModel');
        $data['barang'] = $barang_model->dasborBarang();

        // hitung total harga beli
        $totalHargaBeli = 0;
        $pembelian_model = $this->loadModel('PembelianModel');
        $pembelian = $pembelian_model->getAllPembelian();
        foreach ($pembelian as $pembelian_item) {
            $totalHargaBeli += $pembelian_item->HargaBeli * $pembelian_item->JumlahPembelian;
        }

        // hitung total harga jual
        $totalHargaJual = 0;
        $penjualan_model = $this->loadModel('PenjualanModel');
        $penjualan = $penjualan_model->getAllPenjualan();
        foreach ($penjualan as $penjualan_item) {
            $totalHargaJual += $penjualan_item->HargaJual * $penjualan_item->JumlahPenjualan;
        }

        // hitung laba rugi
        $labaRugi = $totalHargaJual - $totalHargaBeli;

        // kirim data ke view
        $data['total_harga_beli'] = $totalHargaBeli;
        $data['total_harga_jual'] = $totalHargaJual;
        $data['laba_rugi'] = $labaRugi;

        $menu = 'dasbor';
        require 'app/views/layouts/header.php';
        require 'app/views/layouts/navbar.php';
        require 'app/views/dasbor/index.php';
        require 'app/views/layouts/footer.php';
    }
}
