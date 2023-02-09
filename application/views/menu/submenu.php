<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> </h6>

              <a href="<?= base_url('menu/addsubmenu'); ?>" class="btn btn-primary btn-sm float-right">Tambah Data Sub Menu</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
                <?php endif; ?>

                <?= $this->session->flashdata('message'); ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Title</td>
                            <td>Menu</td>
                            <td>Url</td>
                            <td>Icon</td>
                            <td>Active</td>
                            <td colspan="2">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($user_sub_menu as $usb) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $usb['title']; ?></td>
                            <td><?= $usb['menu_id']; ?></td>
                            <td><?= $usb['url']; ?></td>
                            <td><?= $usb['icon']; ?></td>
                            <td><?= $usb['is_active']; ?></td>
                            <td>
                                <a href="<?= base_url('menu/editsubmenu/') . $usb['id']; ?>" class="badge badge-success"><i class="fas fa-edit"></i> edit</a>
                                <a href="<?= base_url('menu/deletesubmenu/') . $usb['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin menghapus data?');"><i class="fas fa-trash-alt"></i> delete</a>
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