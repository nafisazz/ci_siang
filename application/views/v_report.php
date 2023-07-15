<!DOCTYPE html>
<html lang="en">

<head>


	<style type="text/css">
		table {
			border-collapse: collapse;
			width: 100%;
		}



		table thead th {
			border: 1px solid black;
			text-align: left;
		}

		table tbody tr td {
			border: 1px solid black;
			text-align: left;
		}
	</style>
</head>

<body>
	<center>
		<h1>Rekap Anak Magang</h1>
		<h2>DPRD Jawa tengah</h2>
		<p>Periode <?= $date_start . " s/d " . $date_end; ?></p>
	</center>

	<br>
	<table>
		<thead>

			<th>No</th>
			<th>Nama Lengkap</th>
			<th>NIM/NISN</th>
			<th>Jenis Kelamin</th>
			<th>Nama Universitas/sekolah</th>
			<th>Email Peserta</th>
			<th>Nama Divisi Magang</th>
			<th>Alamat</th>
		</thead>
		<?php
		$no = 1;
		foreach ($rekap as $rp) : ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $rp->nama_peserta; ?></td>
				<td><?= $rp->nim; ?></td>
				<td><?= $rp->jenis_kel; ?></td>
				<td><?= $rp->asal_sekolah; ?></td>
				<td><?= $rp->email; ?></td>
				<td><?= $rp->nama_divisi; ?></td>
				<td><?= $rp->alamat; ?></td>

			</tr>

		<?php endforeach; ?>


		</tbody>
	</table>



</body>

</html>