<?php $this->extend('template/template'); ?>
<?php $this->section('isi'); ?>
<div class="container">
    <div class="card mt-3">
        <div class="card-header">
            <b><?= $title ?></b>
        </div>
        <div class="card-body">
            <h4>Join 3 Tabel</h4>
            <table class="table table-bordered table-sm col-md-6">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Jumlah Simpanan</th>
                        <th>Tanggal</th>
                        <th>Unit</th>
                    </tr>
                </thead>
                <?php
                // dd($join3);
                foreach ($join3 as $key) : ?>
                    <tr>
                        <td><?php echo $key->id_anggota ?></td>
                        <td><?php echo $key->nama ?></td>
                        <td><?php echo $key->jumlah_simpanan ?></td>
                        <td><?php echo $key->tgl_simp ?></td>
                        <td><?php echo $key->nama_unit ?></td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>