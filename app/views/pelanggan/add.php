<!-- Begin page content -->
<main role="main" class="container">
    <div class="clearfix mb-3 mt-3">
        <h1 class="float-left">Tambah Pelanggan</h1>
        <a href="<?= URL . 'pelanggan' ?>" class="btn btn-secondary float-right">Kembali</a>
    </div>
    <hr />
    <form class="form-horizontal" action="<?php echo URL . 'pelanggan/proses_tambah'; ?>" method="POST">
        <div class="form-group">
            <label for="NamaPelanggan" class="col-sm-2 control-label">Nama Pelanggan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan" placeholder="Masukan nama pelanggan" required>
            </div>
        </div>
        <div class="form-group">
            <label for="AlamatPelanggan" class="col-sm-2 control-label">Alamat Pelanggan</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="AlamatPelanggan" name="AlamatPelanggan" placeholder="Masukan alamat" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="Keterangan" class="col-sm-2 control-label">No Telepon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="NoTelp" name="NoTelp" placeholder="Masukan no telepon" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary float-right" name="tambah_pelanggan">Tambah Pelanggan</button>
            </div>
        </div>
    </form>
</main>