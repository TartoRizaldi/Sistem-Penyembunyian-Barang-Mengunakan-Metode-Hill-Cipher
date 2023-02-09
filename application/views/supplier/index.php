<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> </h6>

              <a href="<?= base_url('supplier/addsupplier'); ?>" class="btn btn-primary btn-sm float-right">Tambah Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <?= form_error('supplier', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
              <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td>No</td>
                      <td>Kode Supplier</td>
                      <td>Nama Supplier</td>
                      <td>Alamat Supplier</td>
                      <td colspan="2">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($supplier as $sp) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $sp['id_supplier']; ?></td>
                                        <td><?= $sp['nama_supplier']; ?></td>
                                        <td><?= $sp['alamat_supplier']; ?></td>
                                        <td>
                                            <a href="<?= base_url('supplier/editsupplier/') . $sp['id_supplier']; ?>" class="badge badge-success"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="<?= base_url('supplier/deletesupplier/') . $sp['id_supplier']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda ingin menghapus data?')"><i class="fas fa-trash-alt"></i> Hapus</a>
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