<!-- Begin page content -->
<main role="main" class="container">
    <div class="clearfix mb-3 mt-3">
        <h1 class="float-left">Edit Barang</h1>
        <a href="<?= URL . 'barang' ?>" class="btn btn-secondary float-right">Kembali</a>
    </div>
    <hr />
    <form class="form-horizontal" action="<?php echo URL . 'barang/proses_edit'; ?>" method="POST">
        <input type="hidden" name="IdBarang" value="<?php if (isset($data_barang->IdBarang)) echo $data_barang->IdBarang; ?>" />

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="IdSupplier" class="control-label">Nama Supplier</label>
                    <select class="form-control" id="IdSupplier" name="IdSupplier" required>
                        <option value="" selected>-- Pilih supplier --</option>
                        <?php foreach ($data_supplier as $supplier) { ?>
                            <option value="<?php if (isset($supplier->IdSupplier)) echo $supplier->IdSupplier; ?>" <?php if (isset($data_barang->IdSupplier) && $data_barang->IdSupplier == $supplier->IdSupplier) echo 'selected'; ?>><?php if (isset($supplier->NamaSupplier)) echo $supplier->NamaSupplier; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="NamaBarang" class="control-label">Nama Barang</label>
                        <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" placeholder="Masukan nama barang" value="<?php if (isset($data_barang->NamaBarang)) echo $data_barang->NamaBarang; ?>" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Keterangan" class="control-label">Keterangan</label>
                    <textarea class="form-control" id="Keterangan" name="Keterangan" placeholder="Masukan keterangan" required><?php if (isset($data_barang->Keterangan)) echo $data_barang->Keterangan; ?></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Keterangan" class="control-label">Harga Satuan</label>
                    <input type="number" class="form-control" id="Satuan" name="Satuan" placeholder="Masukan harga satuan" value="<?php if (isset($data_barang->Satuan)) echo $data_barang->Satuan; ?>" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Keterangan" class="control-label">Stok</label>
                    <input type="number" class="form-control" id="Stok" name="Stok" placeholder="Masukan stok" value="<?php if (isset($data_barang->Stok)) echo $data_barang->Stok; ?>" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Keterangan" class="control-label">Jumlah Minimal</label>
                    <input type="number" class="form-control" id="JumlahMinimal" name="JumlahMinimal" placeholder="Masukan jumlah minimal" value="<?php if (isset($data_barang->JumlahMinimal)) echo $data_barang->JumlahMinimal; ?>" required>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Keterangan" class="control-label">Jumlah Maksimal</label>
                    <input type="number" class="form-control" id="JumlahMaksimal" name="JumlahMaksimal" placeholder="Masukan jumlah maksimal" value="<?php if (isset($data_barang->JumlahMaksimal)) echo $data_barang->JumlahMaksimal; ?>" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-12">
                <button type="submit" class="btn btn-primary float-right" name="edit_barang">Edit barang</button>
            </div>
        </div>
    </form>
</main>