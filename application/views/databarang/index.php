<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> </h6>

              <a href="<?= base_url('databarang/hillcipher'); ?>" class="btn btn-primary btn-sm float-right">Proses Enkripsi Dan Dekripsi Hill Cipher</a>
              <!-- <button type="button" class="btn btn-primary btn-sm float-right m-2 " data-toggle="modal" data-target="#exampleModal">
                Proses Dekripsi Hill Cipher
              </button>
              <button type="button" class="btn btn-primary btn-sm float-right m-2" data-toggle="modal" data-target="#exampleModal">
                Proses Enkripsi Hill Cipher
              </button> -->

            </div>
            <div class="card-body">
              <div class="table-responsive">
              <?= form_error('supplier', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
              <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td>No</td>
                      <td>Kode Barang</td>
                      <td>Nama Barang</td>
                      <td>Satuan</td>
                      <td>Stok</td>
                      <td>Harga</td>
                      <td>Supplier</td>
                      <td>ID User</td>
                      <td colspan="2">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                                <?php $i = 1;?>
                                <?php foreach ($barang as $brg) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $brg['id_barang']; ?></td>
                                        <td><?= $brg['nama_barang']; ?></td>
                                        <td><?= $brg['nama_satuan']; ?></td>
                                        <td><?= $brg['stok']; ?></td>
                                        <td><?= $brg['harga']; ?></td>
                                        <td><?= $brg['nama_supplier']; ?></td>
                                        <td><?= $brg['id']; ?></td>
                                        <td>
                                            <a href="<?= base_url('databarang/encrypt/')?>" class="badge badge-success">Encrypt</a>
                                            <a href="<?= base_url('databarang/decrypt/')?>" class="badge badge-danger"> Decrypt</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proses Hill Cipher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="col">
          <label for="nama_barang" class="col col-from-label">Pilih Nama Barang yang akan di enkripsi</label>
                <select class="form-control" id="id_barang" name="id_barang">
                    <option value="">Pilih Barang</option>
                    <?php foreach ($barang as $brg) : ?>
                        <option value="<?= $brg['id_barang']; ?>"><?= $brg['nama_barang']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Enkripsi</button>
        <button type="button" class="btn btn-success" disabled>Dekripsi</button>
      </div>
    </div>
  </div>
</div>