<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form method="post" class="menu" action="">
            <div class="form-group row">
                <label for="menu" class="col-sm-2 col-from-label">Nama Menu</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control form-control-user" id="menu" name="menu">
                    <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                </div>
            </div>
            <div class="form-group row">
            <label for="alamat_supplier" class="col-sm-2 col-from-label"></label>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <a href="<?= base_url('menu/') ?>" class="btn btn-danger">Kembali</a>
                </div>
            </div>
            </form>
        </div>
    </div> 
</div>
</div>