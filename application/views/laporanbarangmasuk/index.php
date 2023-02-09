<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Form Filter By Tanggal</h6>
        </div>
        <div class="card-body">
          <form action="<?= base_url('laporanbarangmasuk/filter') ?>" method="POST" target="_blank">
            <input class="form-control" type="hidden" name="nilaifilter" value="1">
            <div class="form-group row">
              <label for="tanggalawal" class="col-sm-5 col-from-label">Tanggal Awal</label>
              <div class="col-sm-7">
                <input class="form-control" type="date" class="form-control" name="tanggalawal" required="">
              </div>
            </div>
            <div class="form-group row">
              <label for="tanggalakhir" class="col-sm-5 col-from-label">Tanggal Akhir</label>
              <div class="col-sm-7">
                <input class="form-control" type="date" class="form-control" name="tanggalakhir" required="">
              </div>
            </div>
            <div class="form-group row ml-2">
              <button class="btn btn-sm btn-success" type="submit">Cetak</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Form Filter By Bulan</h6>
        </div>
        <div class="card-body">
          <form action="<?= base_url('laporanbarangmasuk/filter') ?>" method="POST" target='_blank' class="">
            <input type="hidden" name="nilaifilter" value="2">
            <div class="form-group row">
              <label for="tahun1" class="col-sm-5 col-from-label">Pilih Tahun</label>
              <div class="col-sm-7">
                <select class="form-control" name="tahun1" required="">
                  <option selected>--Pilih--</option>
                  <?php foreach ($tahun as $row) : ?>
                    <option value="<?= $row->tahun ?>"><?= $row->tahun ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="bulanawal" class="col-sm-5 col-from-label">Bulan Awal</label>
              <div class="col-sm-7">
                <select class="form-control" name="bulanawal" required="">
                  <option selected>Pilih Bulan</option>
                  <option value="1">Januari</option>
                  <option value="2">Februari</option>
                  <option value="3">Maret</option>
                  <option value="4">April</option>
                  <option value="5">Mei</option>
                  <option value="6">Juni</option>
                  <option value="7">Juli</option>
                  <option value="8">Agustus</option>
                  <option value="9">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="bulanakhir" class="col-sm-5 col-from-label">Bulan Akhir</label>
              <div class="col-sm-7">
                <select class="form-control" name="bulanakhir" required="">
                  <option selected>Pilih Bulan</option>
                  <option value="1">Januari</option>
                  <option value="2">Februari</option>
                  <option value="3">Maret</option>
                  <option value="4">April</option>
                  <option value="5">Mei</option>
                  <option value="6">Juni</option>
                  <option value="7">Juli</option>
                  <option value="8">Agustus</option>
                  <option value="9">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
              </div>
            </div>

            <div class="form-group row ml-2">
              <button class="btn btn-sm btn-success" type="submit">Cetak</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Form Filter By Tahun</h6>
        </div>
        <div class="card-body">
          <form action="<?= base_url('laporanbarangmasuk/filter') ?>" method="POST" target='_blank' class="">
            <input type="hidden" name="nilaifilter" value="3">
            <div class="form-group row">
              <label for="tahun2" class="col-sm-5 col-from-label">Pilih Tahun</label>
              <div class="col-sm-7">
                <select class="form-control" name="tahun2" required="">
                  <option selected>--Pilih--</option>
                  <?php foreach ($tahun as $row) : ?>
                    <option value="<?= $row->tahun ?>"><?= $row->tahun ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="form-group row ml-2">
              <button class="btn btn-sm btn-success" type="submit">Cetak</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>