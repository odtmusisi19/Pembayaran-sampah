<?= $this->extend('layout_admin/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
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
              <form method="post" action="<?= base_url('pembayaran/store') ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <!--      
                    <div class="form-group">
                        <label for="nama">No</label>
                        <input type="text" class="form-control" id="id_pembayaran" name="id_pembayaran" value="<?= old('id_pembayaran'); ?>">
                    </div> -->

                <div class="form-group">
                  <label for="nama">Nama Masyarakat</label>
                  <input type="text" class="form-control" id="nama_masyarakat" name="nama_masyarakat" value="<?= old('nama_masyarakat'); ?>">
                </div>

                <div class="form-group">
                  <label for="no_telp">Dusun</label>
                  <input type="text" class="form-control" id="dusun" name="dusun" value="<?= old('dusun') ?>" />
                </div>

                <div class="form-group">
                  <label for="email">No.RT</label>
                  <input type="text" class="form-control" id="rt" name="rt" value="<?= old('rt') ?>" />
                </div>

                <div class="form-group">
                  <label for="no_telp">Bulan Pembayaran</label>
                  <input type="date" class="form-control" id="bulan_pembayaran" name="bulan_pembayaran" value="<?= old('bulan_pembayaran') ?>" />
                </div>

                <div class="form-group">
                  <label for="email">Jumlah</label>
                  <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= old('jumlah') ?>" />
                </div>
                <div class="form-group">
                  <label for="email">Petugas</label>
                  <input type="text" class="form-control" id="petugas" name="petugas" value="<?= old('petugas') ?>" />
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