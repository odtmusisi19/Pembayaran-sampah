<?= $this->extend('layout_admin/template'); ?>

<?= $this->section('content'); ?>
<?php
// echo ($petugas->find(4)->nama_petugas
// );
// die
?>
<div class="content-wrapper">
  <div class="col-sm-6">
    <h2 class="m-0 text-dark">Data Pembayaran</h2><br>
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Nama</th>
                  <th>Dusun</th>
                  <th>Petugas</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // $session = session();
                // $userName = $session->get('username');
                // // echo $userName;
                ?>
                <?php
                $no = 1;
                foreach ($datajoin as $row) {
                ?>
                  <tr class="text-center">
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama_masyarakat; ?></td>
                    <td><?= $row->nama_dusun; ?></td>
                    <td><?php
                        if ($row->id_petugas == null) {
                          echo "-";
                        } else {
                          echo $petugas->find($row->id_petugas)->nama_petugas;
                        }
                        ?></td>
                    <td><?= $row->tanggal_pembayaran; ?></td>
                    <td><?= "Rp " . number_format($row->jumlah, 2, ',', '.'); ?></td>
                    <?php if ($row->keterangan == '-') { ?>
                      <td>
                        <p><b><?= $row->keterangan; ?></b></p>
                      </td>
                    <?php  } else { ?>
                      <td>
                        <a href="<?= base_url("pembayaran/cetak/$row->id_pembayaran"); ?>" class="<?php if (($row->keterangan) == 'Belum Lunas') {
                                                                                                    echo ('btn mt-2 btn-danger');
                                                                                                  } else {
                                                                                                    echo "btn mt-2 btn-success";
                                                                                                  } ?>"><b><?= $row->keterangan; ?></b></a>
                      </td>
                    <?php  } ?>
                    <td>
                      <!-- <a title="cetak" href="<?= base_url("pembayaran/cetak/$row->id_pembayaran"); ?>" class="btn mt-2 btn-primary"><i class="fas fa-print"></i></a> -->
                      <a title="Edit" href="<?= base_url("pembayaran/edit/$row->id_pembayaran"); ?>" class="btn mt-2 btn-info"><i class="fas fa-edit"></i></a>
                      <a title="Delete" href="<?= base_url("pembayaran/delete/$row->id_pembayaran") ?>" class="btn mt-2 btn-danger" onclick="return confirm('Apakah Anda yakin ingin Menghapus data ?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                <?php
                }
                ?>
              <tfoot>
                <tr class="text-center">
                  <th>No</th>
                  <th>Nama</th>
                  <th>Dusun</th>
                  <th>No.RT</th>
                  <th>Bulan Pembayaran</th>
                  <th>Jumlah</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
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