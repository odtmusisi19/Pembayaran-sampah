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
            <h2 class="m-0 text-dark">Edit Data</h2><br>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <form method="post" action="<?= base_url('masyarakat/update/' . $masyarakat->id_masyarakat) ?>" enctype="multipart-form-data">
                <?= csrf_field(); ?>

                <div class="form-group">
                  <label for="nama">No</label>
                  <input type="text" class="form-control" id="id_masyarakat" name="id_masyarakat" value="<?= $masyarakat->id_masyarakat; ?>">
                </div>

                <div class="form-group">
                  <label for="no_telp">Nama Masyarakat</label>
                  <input type="text" class="form-control" id="nama_masyarakat" name="nama_masyarakat" value="<?= $masyarakat->nama_masyarakat; ?>" />
                </div>

                <div class="form-group">
                  <label for="email">Jenis Kelamin</label>
                  <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $masyarakat->jenis_kelamin; ?>" />
                </div>
                <div class="form-group">
                  <label for="email">Tempat Lahir</label>
                  <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $masyarakat->tempat_lahir; ?>" />
                </div>

                <div class="form-group">
                  <label for="email">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= date("Y-m-d"); ?>" />
                </div>
                <div class="form-group">
                  <label for="email">Telepon</label>
                  <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $masyarakat->telepon; ?>" />
                </div>


                <div class="form-group">
                  <input type="submit" value="Update" class="btn btn-info" />
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