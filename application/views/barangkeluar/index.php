<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> </h6>

              <a href="<?= base_url('barangkeluar/addbarangkeluar'); ?>" class="btn btn-primary btn-sm float-right">Tambah Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <?= form_error('barang_keluar', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
              <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td>Kode Barang Keluar</td>
                      <td>Nama Barang</td>
                      <td>Tanggal Keluar</td>
                      <td>Stok</td>
                      <td>Total</td>
                      <td>Supplier</td>
                      <td colspan="2">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                                <!-- <?php $i = 1; ?> -->
                                <?php foreach ($barang_keluar as $brg_klr) : ?>
                                    <tr>
                                        <td><?= $brg_klr['id_barangkeluar']; ?></td>
                                        <td><?= $brg_klr['nama_barang']; ?></td>
                                        <td><?= $brg_klr['tgl_keluar']; ?></td>
                                        <td><?= $brg_klr['stok_keluar']; ?></td>
                                        <td><?= $brg_klr['total']; ?></td>
                                        <td><?= $brg_klr['nama_supplier']; ?></td>
                                        <td>
                                            <a href="<?= base_url('barangkeluar/editbarangkeluar/') . $brg_klr['id_barangkeluar']; ?>" class="badge badge-success"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="<?= base_url('barangkeluar/deletebarangkeluar/') . $brg_klr['id_barangkeluar']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda ingin menghapus data?')"><i class="fas fa-trash-alt"></i> Hapus</a>
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