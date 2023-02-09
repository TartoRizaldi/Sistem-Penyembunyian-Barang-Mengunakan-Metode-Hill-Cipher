<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
        <form method="post" class="barang" action="">
        <div class="form-group row">
            <label for="id_barang" class="col-sm-2 col-from-label">Kode Barang</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="id_barang" value="<?= $barang['id_barang']; ?>" readonly>
                <small class="form-text text-danger"><?= form_error('id_barang'); ?></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_barang" class="col-sm-2 col-from-label">Nama Barang</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nama_barang" value="<?= $barang['nama_barang']; ?>">
                <small class="form-text text-danger"><?= form_error('nama_barang'); ?></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="id_satuan" class="col-sm-2 col-from-label">Satuan</label>
            <div class="col-sm-5">
                <select class="form-control" id="id_satuan" name="id_satuan">
                    <?php foreach ($satuan as $st) : ?>
                        <?php if($st == $barang['id_satuan']) : ?>
                            <option value="<?= $st['id_satuan']; ?>" selected><?= $st['nama_satuan']; ?></option>
                        <?php else : ?>
                            <option value="<?= $st['id_satuan']; ?>"><?= $st['nama_satuan']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="stok" class="col-sm-2 col-from-label">Stok</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="stok" readonly value="0">
                <small class="form-text text-danger"><?= form_error('stok'); ?></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-from-label">Harga</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="harga" value="<?= $barang['harga']; ?>">
                <small class="form-text text-danger"><?= form_error('harga'); ?></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="id_supplier" class="col-sm-2 col-from-label">Supplier</label>
            <div class="col-sm-5">
                <select class="form-control" id="id_supplier" name="id_supplier">
                    <?php foreach ($supplier as $sp) : ?>
                        <?php if ($sp == $barang['id_supplier']) : ?>
                            <option value="<?= $sp['id_supplier']; ?>" selected><?= $sp['nama_supplier']; ?></option>
                        <?php else : ?>
                            <option value="<?= $sp['id_supplier']; ?>"><?= $sp['nama_supplier']; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
        <label for="alamat_supplier" class="col-sm-2 col-from-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary">Ubah Data</button>
                <a href="<?= base_url('barang/') ?>" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
        </div>
    </div>
</div>
</div>