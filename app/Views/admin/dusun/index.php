<?= $this->extend('layout_admin/template'); ?>

<?= $this->section('content'); ?>

  <div class="content-wrapper">
    <div class="col-sm-6">
      <h2 class="m-0 text-dark">Data Dusun</h2><br>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            	<?php if (!empty(session()->getFlashdata('message'))) : ?>
	                <div class="alert alert-success alert-dismissible fade show" role="alert">
	                    <?php echo session()->getFlashdata('message'); ?>
	                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                    </button>
	                </div>
	            <?php endif; ?>
              <a href="<?= base_url('/dusun/create'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Data</a><hr>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr class="text-center">
	                  <th>No</th>
	                  <th>Nama Dusun</th>
                      <th>NO.RT</th>
	                  <th>Aksi</th>
	                </tr>
                </thead>
                <tbody>
				<?php
                    $no = 1;
                    foreach ($dusun as $row) {
                    ?>
	                <tr class="text-center">
	                	<td><?= $no++; ?></td>
                        <td><?= $row->nama_dusun; ?></td>
                        <td><?= $row->rt; ?></td>
                        <td>
                           <a title="Edit" href="<?= base_url("dusun/edit/$row->id_dusun"); ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                           <a title="Delete" href="<?= base_url("dusun/delete/$row->id_dusun") ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')"><i class="fas fa-trash"></i></a>
                       	</td>
	                </tr>
	                <?php
                        }
                        ?>
                </tbody>
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