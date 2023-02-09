<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="assets/img/tiara.jpg" class="img-fluid" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h5 text-gray-900 mb-4">SISTEM PENDATAAN BARANG</h1>
                                        <h1 class="h6 text-gray-900 mb-5">CV. TIARA PHOTO DIGITAL</h1>
                                        <h1 class="h4 text-gray-900 mb-4 mt-5">Login</h1>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small'); ?>
                    </div>
                    <button type="submit" class="btn btn-success btn-user btn-block">
                        Login
                    </button>
                    <hr>
                </form>
                <div class="text-center">
                    <a class="small" href="<?= base_url('auth/registration'); ?>">Buat akun!</a>
                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>