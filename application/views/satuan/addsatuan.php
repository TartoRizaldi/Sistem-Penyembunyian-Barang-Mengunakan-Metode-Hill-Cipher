<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
        <form method="post" class="satuan" action="">
        <div class="form-group row">
            <label for="nama_supplier" class="col-sm-2 col-from-label">Nama Satuan</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nama_satuan">
                <small class="form-text text-danger"><?= form_error('nama_satuan'); ?></small>
            </div>
        </div>
        <div class="form-group row">
        <label for="alamat_supplier" class="col-sm-2 col-from-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url('satuan/') ?>" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
        </div>
    </div>
</div>
</div>