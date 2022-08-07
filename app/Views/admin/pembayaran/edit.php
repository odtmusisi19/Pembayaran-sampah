<?= $this->extend('layout_admin/template'); ?>

<?= $this->section('content'); ?>
<?php
// dd($dusun);
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
              <form method="post" action="<?= base_url('pembayaran/update/' . $pembayaran->id_pembayaran) ?>" enctype="multipart-form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                  <label for="nama_masyarakat">Nama Masyarakat</label>
                  <input readonly type="text" class="form-control" id="nama_masyarakat" name="nama_masyarakat" value="<?= $masyarakat->nama_masyarakat; ?>">
                </div>

                <div class="form-group">
                  <label for="dusun">Dusun</label>
                  <input readonly type="text" class="form-control" id="dusun" name="dusun" value="<?= $dusun->nama_dusun ?>" />
                </div>

                <div class="form-group">
                  <label for="rt">No.RT</label>
                  <input readonly type="text" class="form-control" id="rt" name="rt" value="<?= $dusun->rt ?>" />
                </div>
                <?php
                date_default_timezone_set("Asia/Jakarta");
                ?>
                <div class="form-group">
                  <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                  <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" value="<?= date("Y-m-d"); ?>" />
                </div>

                <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $pembayaran->jumlah; ?>" />
                </div>
                <?php
                // $session = session();
                // $userName = $session->get('username');
                ?>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <select class="form-control" name="keterangan" id="keterangan">
                    <option>-----</option>
                    <option>Lunas</option>
                    <option>Belum Lunas</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="petugas">Pilih Petugas</label>
                  <select class="form-control" name="petugas" id="petugas">
                    <option>-----</option>
                    <?php
                    $no = 1;
                    foreach ($petugas as $row) {
                    ?>
                      <option><?= $row->nama_petugas ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>


                <div class="form-group">
                  <input type="submit" value="Update" class="btn btn-info" />
                  <a href="/pembayaran/batal" class="btn btn-danger">Batal</a>
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