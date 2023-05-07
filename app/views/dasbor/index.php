<!-- Begin page content -->
<main role="main" class="container">
    <div class="mt-5">
        <h5>Dashboard /</h5>
        <h2>Laporan Laba Rugi</h2>
    </div>


    <div class="row mt-5">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body text-white bg-success">
                    <h5 class="card-title">Total Harga Beli:</h5>
                    <h2 class="card-text">Rp. <?php echo number_format($data['total_harga_beli'], 0, ',', '.'); ?></h2>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Harga Jual:</h5>
                    <h2 class="card-text">Rp. <?php echo number_format($data['total_harga_jual'], 0, ',', '.'); ?></h2>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-white bg-danger ">
                <div class="card-body">
                    <h5 class="card-title">Total Keuntungan:</h5>
                    <h2 class="card-text">Rp. <?php echo number_format($data['total_harga_jual'] - $data['total_harga_beli']); ?>.</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive mt-5">
        <table id="tabel_data" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['barang'] as $barang) { ?>
                    <tr>
                        <td><?php echo $barang->NamaBarang; ?></td>
                        <td>Rp. <?php echo number_format($barang->HargaBeli, 0, ',', '.'); ?></td>
                        <td>Rp. <?php echo number_format($barang->HargaJual, 0, ',', '.'); ?></td>
                        <td><?php echo $barang->Stok; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</main>