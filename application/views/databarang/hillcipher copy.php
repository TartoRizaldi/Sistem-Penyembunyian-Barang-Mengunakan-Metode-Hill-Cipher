<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
        <form method="post" class="barang" action="">
        <div class="form-group row">
            <label for="id_barang" class="col-sm-2 col-from-label">Step 1 (Mengisi Alfabet)</label>
            <div class="col-sm-5">
                <label for="id_barang" class="">A-Z | 0-9 | ~!@##$%^&~</label>
                <input type="text" class="form-control" name="alpa" id="alpa">
                <small class="form-text text-danger"><?= form_error('id_barang'); ?></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_barang" class="col-sm-2 col-from-label">Step 2 (Mengisi Kunci)</label>
            <div class="col-sm-5">
                <label for="key" class="">Key</label>
                <input type="text" class="form-control" name="key" id="key">
                <small class="form-text text-danger"><?= form_error('nama_barang'); ?></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_barang" class="col-sm-2 col-from-label">Step 3 (Mengisi Plaintext)</label>
            <div class="col-sm-5">
                <label for="nama_barang" class="">Plaintext</label>
                <input type="text" class="form-control" name="plaintext" id="plaintext">
                <small class="form-text text-danger"><?= form_error('nama_barang'); ?></small>
                <button id="btnEncrypt" type="submit" class="btn btn-primary">Enkripsi</button>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_barang" class="col-sm-2 col-from-label">Hasil Enkripsi</label>
            <div class="col-sm-5">
                <label for="nama_barang" class="">Ciphertext</label>
                <input type="text" class="form-control" name="ciphertext" id="ciphertext">
                <small class="form-text text-danger"><?= form_error('nama_barang'); ?></small>
                <button type="submit" id="btnDecrypt" class="btn btn-primary">Dekripsi</button>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_barang" class="col-sm-2 col-from-label">Hasil Dekripsi</label>
            <div class="col-sm-5">
                <label for="nama_barang" class="">Plainteks</label>
                <input type="text" class="form-control" name="plaintext2" id="plaintext2">
                <small class="form-text text-danger"><?= form_error('nama_barang'); ?></small>
            </div>
        </div>
        <div class="form-group row">
        <label for="alamat_supplier" class="col-sm-2 col-from-label"></label>
            <div class="col-sm-5">
                <!-- <button type="submit" class="btn btn-primary">Tambah</button> -->
                <a href="<?= base_url('barang/') ?>" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
        </div>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
      $('#btnEncrypt').on('click', function(event){  
            var alpa= $("#alpa").val();    
            var key= $("#key").val(); 
            var plaintext= $("#plaintext").val();           
            event.preventDefault();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('databarang/encrypt2')?>",
                data: {
                    alpa: alpa,
                    key: key,
                    plaintext : plaintext,
                },                        
                dataType : 'json',
                success:function(data){                                   
                    $('input[name="ciphertext"]').val(data['encrypt']);
                },
                error: function(jqxhr, status, exception) {
                    alert('Exception:', exception);
                }
            });                                                         
        });

      $('#btnDecrypt').on('click', function(event){       
            event.preventDefault();
            var alpa= $("#alpa").val();    
            var key= $("#key").val(); 
            var ciphertext= $("#ciphertext").val(); 
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('databarang/decrypt2')?>",
                data: {
                    alpa: alpa,
                    key: key,
                    ciphertext : ciphertext,
                },                        
                dataType : 'json',
                success:function(data){                                   
                    $('input[name="plaintext2"]').val(data['decrypt']);
                },
                error: function(jqxhr, status, exception) {
                    alert('Exception:', exception);
                }
            });                                                         
        });
});
</script>