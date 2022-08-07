<?= $this->extend('layout_admin/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- jika field belum di isi maka akan menampilkan pesan error -->
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4>Periksa Entrian Form</h4>
                </hr />
                <?php echo session()->getFlashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <h2 class="m-0 text-dark">Tambah Data</h2><br>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <form method="post" action="<?= base_url('petugas/store') ?>" enctype="multipart/form-data">
                <!-- csrf_field untuk keamanan -->
                <?= csrf_field(); ?>

                <div class="form-group">
                  <label for="nama_masyarakat">Nama Petugas</label>
                  <!-- old() berfungsi untuk mencegah data supaya tidak hilang jika ada data yang salah  -->
                  <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="<?= old('nama_petugas'); ?>">
                </div>

                <div class="form-group">
                  <label for="jenis_kelamin">Telepon</label>
                  <input type="text" class="form-control" id="telepon" name="telepon" value="<?= old('telepon') ?>" />
                </div>

                <div class="form-group">
                  <label for="tempat_lahir">Username</label>
                  <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>" />
                </div>

                <div class="form-group">
                  <label for="tanggal_lahir">Password</label>
                  <input type="text" class="form-control" id="password" name="password" value="<?= old('password') ?>" />
                  <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-info mt-2" />
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