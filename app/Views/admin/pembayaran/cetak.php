<!DOCTYPE html>
<html>

<head>
	<title>Cetak surat</title>
	<style type="text/css">
		body {
			font-family: arial;
			background-color: #ccc;
		}

		.ragkasurat {
			width: 980px;
			margin: 0 auto;
			background-color: #fff;
			height: 400px;
			padding: 20px;
		}

		table {

			padding: 2px;
		}

		.tengah {
			text-align: center;
			line-height: 5px;
		}
	</style>
</head>

<body>
	<div class="ragkasurat">
		<center>
			<h2><u>Kwitansi Pembayaran Sampah</u></h2>
			<P>Nomor:001/00001/TM/<?= $pembayaran->id_masyarakat; ?>/l/2022</P>
			<hr>
		</center>

		<table>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?= $masyarakat->nama_masyarakat; ?></td>
			</tr>
			<tr>
				<td>Dusun</td>
				<td>:</td>
				<td><?= $dusun->nama_dusun; ?></td>
			</tr>
			<tr>
				<td>No.RT</td>
				<td>:</td>
				<td><?= $dusun->rt; ?></td>
			</tr>
			<tr>
				<td>Jumlah Yang Dibayar</td>
				<td>:</td>
				<td><?= "Rp " . number_format($pembayaran->jumlah, 2, ',', '.'); ?></td>
			</tr>
		</table>
		<card width="100%">
			<tr>
				<td>
					<center>
						<p align="right"> <?= $pembayaran->tanggal_pembayaran; ?> </p>
					</center>
					<br>
					<br>
					<br>
					<center>
						<p align="right"> <?= $petugas->find($pembayaran->id_petugas)->nama_petugas;; ?> </p>
					</center>
				</td>
			</tr>
		</card>

	</div>
</body>

</html>