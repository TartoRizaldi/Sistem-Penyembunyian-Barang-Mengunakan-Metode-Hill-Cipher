<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
        <form method="post" class="barang_keluar" action="">
        <!-- <div class="form-group row">
            <label for="id_barangkeluar" class="col-sm-2 col-from-label">Kode Barang Keluar</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="id_barangkeluar" value="<?= $kode_barangkeluar ?>" readonly>
                <small class="form-text text-danger"><?= form_error('id_barangkeluar'); ?></small>
            </div>
        </div> -->
        <div class="form-group row">
            <label for="nama_barang" class="col-sm-2 col-from-label">Nama Barang</label>
            <div class="col-sm-5">
                <select class="form-control" id="id_barang" name="id_barang">
                    <option value="">Pilih Barang</option>
                    <?php foreach ($barang as $brg) : ?>
                        <option value="<?= $brg['id_barang']; ?>"><?= $brg['nama_barang']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_keluar" class="col-sm-2 col-from-label">Tanggal Keluar</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="tgl_keluar">
                <small class="form-text text-danger"><?= form_error('tgl_keluar'); ?></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="stok_keluar" class="col-sm-2 col-from-label">Stok</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="stok_keluar">
                <small class="form-text text-danger"><?= form_error('stok_keluar'); ?></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="total" class="col-sm-2 col-from-label">Total</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="total">
                <small class="form-text text-danger"><?= form_error('total'); ?></small>
            </div>
        </div>
        <div class="form-group row">
        <label for="alamat_supplier" class="col-sm-2 col-from-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url('barangkeluar/') ?>" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
        </div>
    </div>
</div>
</div>