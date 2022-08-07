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
              <form method="post" action="<?= base_url('dusun/store') ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <!-- <div class="form-group">
                        <label for="nama">No</label>
                        <input type="text" class="form-control" id="id_dusun" name="id_dusun" value="<?= old('id_dusun'); ?>">
                    </div> -->

                <div class="form-group">
                  <label for="nama">Nama Dusun</label>
                  <input type="text" class="form-control" id="nama_dusun" name="nama_dusun" value="<?= old('nama_dusun'); ?>">
                </div>

                <div class="form-group">
                  <label for="nama">NO.RT</label>
                  <input type="text" class="form-control" id="rt" name="rt" value="<?= old('rt'); ?>">
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