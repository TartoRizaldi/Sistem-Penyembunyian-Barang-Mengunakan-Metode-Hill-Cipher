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
                <input type="text" class="form-control" name="id_barangmasuk" value="<?= $kode_barangmasuk ?>" readonly>
                <small class="form-text text-danger"><?= form_error('id_barangmasuk'); ?></small>
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
            <label for="tgl_masuk" class="col-sm-2 col-from-label">Tanggal Masuk</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="tgl_masuk">
                <small class="form-text text-danger"><?= form_error('tgl_masuk'); ?></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="stok_masuk" class="col-sm-2 col-from-label">Stok</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="stok_masuk">
                <small class="form-text text-danger"><?= form_error('stok_masuk'); ?></small>
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
                <a href="<?= base_url('barangmasuk/') ?>" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
        </div>
    </div>
</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#stok_masuk").keyup(function() {
            var stok_masuk  = $("#stok_masuk").val();
            $("#total").val(total);
        });
    });
</script>