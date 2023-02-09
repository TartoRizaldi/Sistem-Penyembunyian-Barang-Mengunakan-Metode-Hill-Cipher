<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
        <form method="post" class="barang_masuk" action="">
        <!-- <div class="form-group row">
            <label for="id_barangmasuk" class="col-sm-2 col-from-label">Kode Barang Masuk</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="id_barangmasuk" value="<?= $barang_masuk['id_barangmasuk']; ?>" readonly>
                <small class="form-text text-danger"><?= form_error('id_barangmasuk'); ?></small>
            </div>
        </div> -->
                <input type="hidden" class="form-control" name="id_barangmasuk" value="<?= $barang_masuk['id_barangmasuk']; ?>" readonly>
        <div class="form-group row">
            <label for="nama_barang" class="col-sm-2 col-from-label">Nama Barang</label>
            <div class="col-sm-5">
                <select class="form-control" id="id_barang" name="id_barang">
                    <?php foreach ($barang as $brg) : ?>
                        <?php if($brg == $barang_masuk['id_barang']) : ?>
                            <option value="<?= $brg['id_barang']; ?>" selected><?= $brg['nama_barang']; ?></option>
                        <?php else : ?>
                            <option value="<?= $brg['id_barang']; ?>"><?= $brg['nama_barang']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_masuk" class="col-sm-2 col-from-label">Tanggal Masuk</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="tgl_masuk" id="datepicker" value="<?= $barang_masuk['tgl_masuk']; ?>">
                <small class="form-text text-danger"><?= form_error('tgl_masuk'); ?></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="stok_masuk" class="col-sm-2 col-from-label">Stok</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="stok_masuk" value="<?= $barang_masuk['stok_masuk']; ?>">
                <small class="form-text text-danger"><?= form_error('stok_masuk'); ?></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="total" class="col-sm-2 col-from-label">Total</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="total" value="<?= $barang_masuk['total']; ?>">
                <small class="form-text text-danger"><?= form_error('total'); ?></small>
            </div>
        </div>
        <!-- <div class="form-group row">
            <label for="id_supplier" class="col-sm-2 col-from-label">Supplier</label>
            <div class="col-sm-5">
                <select class="form-control" id="id_supplier" name="id_supplier">
                    <?php foreach ($supplier as $sp) : ?>
                        <?php if($sp == $barang_masuk['id_supplier']) : ?>
                        <option value="<?= $sp['id_supplier']; ?>" selected><?= $sp['nama_supplier']; ?></option>
                    <?php else : ?>
                        <option value="<?= $sp['id_supplier']; ?>"><?= $sp['nama_supplier']; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div> -->
        <div class="form-group row">
        <label for="alamat_supplier" class="col-sm-2 col-from-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary">Ubah Data</button>
                <a href="<?= base_url('barangmasuk/') ?>" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
        </div>
    </div>
</div>
</div>