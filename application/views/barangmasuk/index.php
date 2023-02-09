<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> </h6>

              <a href="<?= base_url('barangmasuk/addbarangmasuk'); ?>" class="btn btn-primary btn-sm float-right">Tambah Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <?= form_error('barang_masuk', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
              <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td>No</td>
                      <td>Kode Barang Masuk</td>
                      <td>Nama Barang</td>
                      <td>Tanggal Masuk</td>
                      <td>Stok</td>
                      <td>Total</td>
                      <td>Supplier</td>
                      <!-- <td>Supplier</td> -->
                      <td colspan="2">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($barang_masuk as $brg_msk) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $brg_msk['id_barangmasuk']; ?></td>
                                        <td><?= $brg_msk['nama_barang']; ?></td>
                                        <td><?= $brg_msk['tgl_masuk']; ?></td>
                                        <td><?= $brg_msk['stok_masuk']; ?></td>
                                        <td><?= $brg_msk['total']; ?></td>
                                        <td><?= $brg_msk['nama_supplier']; ?></td>
                                        <td>
                                            <a href="<?= base_url('barangmasuk/editbarangmasuk/') . $brg_msk['id_barangmasuk']; ?>" class="badge badge-success"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="<?= base_url('barangmasuk/deletebarangmasuk/') . $brg_msk['id_barangmasuk']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda ingin menghapus data?')"><i class="fas fa-trash-alt"></i> Hapus</a>
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