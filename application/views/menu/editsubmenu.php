<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form method="post" class="menu" action="">
                <div class="form-group riw">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $user_sub_menu['id'] ?>" hidden>
                    <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-2 col-from-label">Nama Sub Menu</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="title" name="title" value="<?= $user_sub_menu['title'] ?>">
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-2 col-from-label">Pilih Menu</label>
                    <div class="col-sm-5">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <?php foreach ($menu as $m) : ?>
                                <?php if ($m == $user_sub_menu['id']) : ?>
                                    <option value="<?= $m['id'] ?>" selected><?= $m['menu']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $m['id'] ?>"><?= $m['menu']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-2 col-from-label">URL Sub Menu</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="url" name="url" value="<?= $user_sub_menu['url'] ?>">
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-2 col-from-label">Icon Sub Menu</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $user_sub_menu['icon'] ?>">
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-5">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                        <label class="form-check-label" for="is_active">
                            Active?
                        </label>
                    </div>
                </div>
                </div>
                <div class="form-group row">
                <label for="alamat_supplier" class="col-sm-2 col-from-label"></label>
                    <div class="col-sm-5">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                        <a href="<?= base_url('menu/submenu') ?>" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>