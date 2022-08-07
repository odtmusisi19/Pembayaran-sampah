<?= $this->extend('layout_admin/template'); ?>

<?= $this->section('content'); ?>

<?php
//TODO mengambil banyak data yang ada pada tabel masyarakat, dusun dan pembayrana
$connection = mysqli_connect('localhost', 'root', '', 'db_desa');
$datamasyarakat = mysqli_query($connection, "SELECT * FROM masyarakat ");
$jumlahM = mysqli_num_rows($datamasyarakat); // jumlah Masyarakat

$datadusun = mysqli_query($connection, "SELECT * FROM dusun ");
$jumlahDusun = mysqli_num_rows($datadusun); // jumlah dusun

$datapembayaran = mysqli_query($connection, "SELECT * FROM pembayaran ");
$jumlahPembayaran = mysqli_num_rows($datapembayaran); // jumlah pembayaran

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6 col-12">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3> <?= $jumlahM ?></h3>

              <p>Data Masyarakat</p>
            </div>
            <a href="/masyarakat">
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6 col-12">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?= $jumlahM ?></h3>

              <p>Data Pembayaran</p>
            </div>
            <a href="/pembayaran">
              <div class="icon">
                <i class="fa fa-folder"></i>
              </div>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6 col-12">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $jumlahDusun ?></h3>

              <p>Data Dusun</p>
            </div>
            <a href="/dusun">
              <div class="icon">
                <i class="fa fa-folder"></i>
              </div>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="alert alert-success">
        <marquee>
          <h2>Selamat Datang Di Aplikasi Pembayaran Sampah Desa Tegal Maja</h2>
        </marquee>
      </div>
    </div>
</div>
</section>
<!-- /.content -->
</div>


<?= $this->endsection(); ?>