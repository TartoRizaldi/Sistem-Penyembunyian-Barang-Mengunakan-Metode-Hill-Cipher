<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> </h6>

              <a href="<?= base_url('laporanbarang/pdflaporanbarang'); ?>" class="btn btn-success btn-sm float-right">Cetak Laporan</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <?= form_error('barang', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
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
                    </tr>
                  </thead>
                  <tbody>
                                <?php $i = 1; ?>
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