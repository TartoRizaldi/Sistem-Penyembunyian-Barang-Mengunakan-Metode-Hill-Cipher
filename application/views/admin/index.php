<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">

        <!-- Cards Barang -->
        <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Barang</div>
                          <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $barang; ?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-solid fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                    <div class="col-auto">
                        <a href="<?= base_url('barang/'); ?>" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <span class="text">Info Selanjutnya</span>
                      </a>
                    </div>
                </div>
        </div>

        <!-- Cards Supplier -->
        <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Supplier</div>
                          <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $supplier; ?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-solid fa-truck-field fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                    <div class="col-auto">
                        <a href="<?= base_url('supplier/'); ?>" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <span class="text">Info Selanjutnya</span>
                      </a>
                    </div>
                </div>
        </div>

        <!-- Cards Barang Masuk -->
        <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Barang Masuk</div>
                          <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $barang_masuk; ?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-solid fa-inbox-in fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                    <div class="col-auto">
                        <a href="<?= base_url('barangmasuk/'); ?>" class="btn btn-warning btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <span class="text">Info Selanjutnya</span>
                      </a>
                    </div>
                </div>
        </div>

        <!-- Cards Barang Keluar -->
        <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Barang Keluar</div>
                          <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $barang_keluar; ?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-inbox-out fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                    <div class="col-auto">
                        <a href="<?= base_url('barangkeluar/'); ?>" class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <span class="text">Info Selanjutnya</span>
                      </a>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->