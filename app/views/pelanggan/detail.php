<!-- Begin page content -->
<main role="main" class="container">
    <div class="clearfix mb-3 mt-3">
        <h1 class="float-left">Detail Pelanggan</h1>
        <a href="<?= URL . 'pelanggan' ?>" class="btn btn-secondary float-right">Kembali</a>
    </div>
    <hr />
    <input type="hidden" name="IdPelanggan" value="<?php if (isset($data_pelanggan->IdPelanggan)) echo $data_pelanggan->IdPelanggan; ?>" />
    <div class="form-group">
        <label for="NamaPelanggan" class="col-sm-2 control-label">Nama Pelanggan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan" placeholder="Masukan nama pelanggan" value="<?php if (isset($data_pelanggan->NamaPelanggan)) echo $data_pelanggan->NamaPelanggan; ?>" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="AlamatPelanggan" class="col-sm-2 control-label">Alamat Pelanggan</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="AlamatPelanggan" name="AlamatPelanggan" placeholder="Masukan alamat" disabled><?php if (isset($data_pelanggan->AlamatPelanggan)) echo $data_pelanggan->AlamatPelanggan; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="NoTelp" class="col-sm-2 control-label">No Telepon</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="NoTelp" name="NoTelp" placeholder="Masukan no telepon" value="<?php if (isset($data_pelanggan->NoTelp)) echo (int) $data_pelanggan->NoTelp; ?>" disabled>
        </div>
    </div>
</main>