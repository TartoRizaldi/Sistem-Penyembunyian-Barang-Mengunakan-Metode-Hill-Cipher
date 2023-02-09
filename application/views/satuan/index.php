<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> </h6>

              <a href="<?= base_url('satuan/addsatuan'); ?>" class="btn btn-primary btn-sm float-right">Tambah Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <?= form_error('satuan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
              <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td>No</td>
                      <td>Nama Satuan</td>
                      <td colspan="2">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($satuan as $st) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $st['nama_satuan']; ?></td>
                                        <td>
                                            <a href="<?= base_url('satuan/editsatuan/') . $st['id_satuan']; ?>" class="badge badge-success"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="<?= base_url('satuan/deletesatuan/') . $st['id_satuan']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda ingin menghapus data?')"><i class="fas fa-trash-alt"></i> Hapus</a>
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