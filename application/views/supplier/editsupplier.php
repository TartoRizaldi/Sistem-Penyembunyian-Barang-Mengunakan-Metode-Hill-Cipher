<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form method="post" class="supplier" action="">
                <div class="form-group row">
                    <label for="id_supplier" class="col-sm-2 col-from-label">Kode Supplier</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="id_supplier" id="id_supplier" value="<?= $supplier['id_supplier']; ?>" readonly>
                        <small class="form-text text-danger"><?= form_error('id_supplier'); ?></small>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label for="nama_supplier" class="col-sm-2 col-from-label">Nama Supplier</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" value="<?= $supplier['nama_supplier']; ?>">
                        <small class="form-text text-danger"><?= form_error('nama_supplier'); ?></small>
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat_supplier" class="col-sm-2 col-from-label">Alamat Supplier</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="alamat_supplier" id="alamat_supplier" value="<?= $supplier['alamat_supplier']; ?>">
                        <small class="form-text text-danger"><?= form_error('alamat_supplier'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                <label for="alamat_supplier" class="col-sm-2 col-from-label"></label>
                    <div class="col-sm-5">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                        <a href="<?= base_url('supplier/') ?>" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>