<?= $this->extend('layout_admin/template'); ?>

<?= $this->section('content'); ?>
<?php
date_default_timezone_set("Asia/Jakarta");
?>
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- <div class="card-header"> -->
          <!-- jika field belum di isi maka akan menampilkan pesan error -->
          <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <h4>Periksa Entrian Form</h4>
              </hr />
              <?php d(session()->getFlashdata('nama_masyarakat')); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <h2 class="m-0 text-dark">Tambah Data</h2><br>
          </div> -->
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <form method="post" action="<?= base_url('masyarakat/store') ?>" enctype="multipart/form-data">
                <!-- csrf_field untuk keamanan -->
                <?= csrf_field(); ?>
                <div class="form-group">
                  <label for="nama_masyarakat">Nama Masyarakat</label>
                  <!-- old() berfungsi untuk mencegah data supaya tidak hilang jika ada data yang salah  -->
                  <input type="text" class="form-control <?= (session()->getFlashdata('nama_masyarakat')) ? 'is-invalid' : ''; ?>" id="nama_masyarakat" name="nama_masyarakat" value="<?= old('nama_masyarakat'); ?>">
                  <div class="invalid-feedback">
                    <?= session()->getFlashdata('error_masyarakat'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  <input type="text" class="form-control <?= (session()->getFlashdata('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" name="jenis_kelamin" value="<?= old('jenis_kelamin') ?>" />
                  <div class="invalid-feedback">
                    <?= session()->getFlashdata('error_jenis_kelamin'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir') ?>" />
                </div>

                <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= date("Y-m-d"); ?>" />
                </div>
                <div class="form-group">
                  <label for="dusun">Pilih Dusun</label>
                  <select class="form-control" name="dusun" id="dusun">
                    <option>-----</option>

                    <?php
                    $no = 1;
                    foreach ($dusun as $row) {
                    ?>
                      <option><?= $row->nama_dusun ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="telepon">Telepon</label>
                  <input type="text" class="form-control" id="telepon" name="telepon" value="<?= old('telepon') ?>" />
                </div>
                <div class="form-group">
                  <label for="gambar" class="form-label">Pilih Gambar</label>
                  <input name="gambar" class="form-control" type="file" id="gambar">
                </div>

                <div class="form-group">
                  <input type="submit" value="Simpan" class="btn btn-info" />
                </div>
              </form>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>

<?= $this->endsection(); ?>