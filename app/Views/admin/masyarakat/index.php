<?= $this->extend('layout_admin/template'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
  <div class="col-sm-6">
    <h2 class="m-0 text-dark">Data Masyarakat</h2><br>
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- Menampilkan atau Get pesan  -->
            <?php if (!empty(session()->getFlashdata('message'))) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <a href="<?= base_url('/masyarakat/create'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Data</a>
            <hr>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Nama Masyarakat</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Dusun</th>
                  <th>RT</th>
                  <th>Telepon</th>
                  <th>Aksi</th>
                </tr>
                <?php
                // dd($dusun);
                ?>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($datajoin as $row) {
                ?>
                  <tr class="text-center">
                    <td><?= $no++; ?></td>
                    <td><img width="40" src="/img/<?= $row->gambar; ?>" class="rounded-circle" title="gambar" alt="kosong"></td>
                    <td><?= $row->nama_masyarakat; ?></td>
                    <td><?= $row->jenis_kelamin; ?></td>
                    <td><?= $row->tempat_lahir; ?></td>
                    <td><?= $row->tanggal_lahir; ?></td>
                    <td><?= $row->nama_dusun; ?></td>
                    <td><?= $row->rt; ?></td>
                    <td><?= $row->telepon; ?></td>
                    <td>
                      <a title="Edit" href="<?= base_url("masyarakat/edit/$row->id_masyarakat"); ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                      <a title="Delete" href="<?= base_url("masyarakat/delete/$row->id_masyarakat") ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
              <!-- <tfoot>
	                  <tr class="text-center">
					  <th>No</th>
	                  <th>Nama Masyarakat</th>
	                  <th>Jenis Kelamin</th>
	                  <th>Tempat Lahir</th>
	                  <th>Tanggal Lahir</th>
	                  <th>Telepon</th>
	                  <th>Aksi</th>
	                </tr>	
                </tfoot> -->
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