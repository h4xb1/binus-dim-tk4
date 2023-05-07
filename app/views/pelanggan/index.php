<!-- Begin page content -->
<main role="main" class="container">
    <div class="clearfix mb-3 mt-3">
        <h1 class="float-left">Daftar Pelanggan</h1>
        <a href="<?= URL . 'pelanggan/tambah' ?>" class="btn btn-success float-right ml-2">Tambah Pelanggan</a>
        <form class="form-inline float-right" action="<?= URL . 'pelanggan/index' ?>" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari Nama Pelanggan" aria-label="Search" name="nama_pelanggan">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Cari</button>
        </form>
    </div>

    <?php if (isset($status) && isset($action)) { ?>
        <?php if ($status == "success" && $action == "add") { ?>
            <div class="alert alert-success" role="alert">
                <strong>Selamat!</strong> Anda berhasil menambahkan pelanggan.
            </div>
        <?php } else if ($status == "success" && $action == "delete") { ?>
            <div class="alert alert-success" role="alert">
                <strong>Selamat!</strong> Anda berhasil menghapus pelanggan.
            </div>
        <?php } else if ($status == "success" && $action == "edit") { ?>
            <div class="alert alert-success" role="alert">
                <strong>Selamat!</strong> Anda berhasil mengedit pelanggan.
            </div>
        <?php } else { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Maaf!</strong> Proses gagal.
            </div>
        <?php } ?>
    <?php } ?>

    <div class="table-responsive">
        <table id="tabel_data" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat Pelanggan</th>
                    <th>No Telp</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_pelanggan as $pelanggan) { ?>
                    <tr>
                        <td><?php if (isset($pelanggan->IdPelanggan)) echo $pelanggan->IdPelanggan; ?></td>
                        <td><?php if (isset($pelanggan->NamaPelanggan)) echo $pelanggan->NamaPelanggan; ?></td>
                        <td><?php if (isset($pelanggan->AlamatPelanggan)) echo $pelanggan->AlamatPelanggan; ?></td>
                        <td><?php if (isset($pelanggan->NoTelp)) echo $pelanggan->NoTelp; ?></td>
                        <td class="text-center">
                            <a href="<?php echo URL . 'pelanggan/detail/' . $pelanggan->IdPelanggan; ?>" class="btn btn-info">Detail</a>
                            <a href="<?php echo URL . 'pelanggan/edit/' . $pelanggan->IdPelanggan; ?>" class="btn btn-warning">Edit</a>
                            <form class="d-inline deleteData" action="<?php echo URL . 'pelanggan/proses_hapus'; ?>" method="POST">
                                <input type="hidden" name="IdPelanggan" value="<?php if (isset($pelanggan->IdPelanggan)) echo $pelanggan->IdPelanggan; ?>">
                                <button type="submit" class="btn btn-danger" name="hapus_pelanggan">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>