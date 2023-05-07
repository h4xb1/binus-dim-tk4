<!-- Begin page content -->
<main role="main" class="container">
    <div class="clearfix mb-3 mt-3">
        <h1 class="float-left">Tambah Barang</h1>
        <a href="<?=  URL . 'barang' ?>" class="btn btn-secondary float-right">Kembali</a>
    </div>
    <hr />
    <form class="form-horizontal" action="<?php echo URL . 'barang/proses_tambah'; ?>" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="IdSupplier" class="control-label">Nama Supplier</label>
                    <select class="form-control" id="IdSupplier" name="IdSupplier" required>
                        <option value="" selected>-- Pilih supplier --</option>
                        <?php foreach ($data_supplier as $supplier) { ?>
                            <option value="<?php if (isset($supplier->IdSupplier)) echo $supplier->IdSupplier; ?>"><?php if (isset($supplier->NamaSupplier)) echo $supplier->NamaSupplier; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="NamaBarang" class="control-label">Nama Barang</label>
                        <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" placeholder="Masukan nama barang" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Keterangan" class="control-label">Keterangan</label>
                    <textarea class="form-control" id="Keterangan" name="Keterangan" placeholder="Masukan keterangan" required></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Keterangan" class="control-label">Harga Satuan</label>
                    <input type="number" class="form-control" id="Satuan" name="Satuan" placeholder="Masukan harga satuan" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Keterangan" class="control-label">Stok</label>
                    <input type="number" class="form-control" id="Stok" name="Stok" placeholder="Masukan stok" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Keterangan" class="control-label">Jumlah Minimal</label>
                    <input type="number" class="form-control" id="JumlahMinimal" name="JumlahMinimal" placeholder="Masukan jumlah minimal" required>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Keterangan" class="control-label">Jumlah Maksimal</label>
                    <input type="number" class="form-control" id="JumlahMaksimal" name="JumlahMaksimal" placeholder="Masukan jumlah maksimal" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-12">
                <button type="submit" class="btn btn-primary float-right" name="tambah_barang">Tambah barang</button>
            </div>
        </div>
    </form>
</main>