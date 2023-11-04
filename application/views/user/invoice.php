
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Invoice Tagihan Yang Udah Selesai</title>
</head>
<body>
	<div style="width: 700px; margin: auto;">
		<br>
		<center>
			<h3 style="font-size: 30px; text-transform: uppercase;"><?php echo "Invoice NetBills Wifi" ?></h3>
			<hr color="black">
			<table width="100%" style="margin-top: 30px; font-size: 20px">
				<tr>
					<td>Kepada</td>
					<td>:</td>
					<td><?php echo $tagihan['nama'] ?></td>
					<td>Tanggal Tagihan</td>
					<td>:</td>
					<td align="center">1 - <?php echo date_format(new DateTime($tagihan['tagihan']), 'd') ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $tagihan['alamat'] ?></td>
					<td>Bulan Tagihan</td>
					<td>:</td>
					<td align="center"><?php echo $bl[date_format(new DateTime($tagihan['tagihan']), 'm')] ?></td>
				</tr>
				<tr>
					<td>Nomor Hp</td>
					<td>:</td>
					<td>+62 <?php echo $tagihan['no_hp'] ?></td>
				</tr>

			</table>
			<table width="100%" border="1" style="margin-top: 30px; font-size: 20px">
				<thead style="background-color: red;">
					<tr>
						<th style="color: white">No.</th>
						<th style="color: white">Paket</th>
						<th style="color: white">Harga</th>
						<th style="color: white">Deskripsi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td align="center">1</td>
						<td align="center"><?= $tagihan['paket']?></td>
						<td align="center">Rp. <?= number_format($tagihan['harga'],0,',','.'); ?>,-</td>
						<td align="center"><?= $tagihan['deskripsi']?></td>

					</tr>
					<tr>
						<td align="center">2</td>
						<td align="center"></td>
						<td align="center"></td>
						<td align="center"></td>

					</tr>
					<tr>
						<td align="center">3</td>
						<td align="center"></td>
						<td align="center"></td>
						<td align="center"></td>

					</tr>

					
				</tbody>
				<tfoot style="background-color: blue; height: 20px">
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</tfoot>

			</table>
		</center>
			<p>NB.-Discount akan berlaku 50% apabila koneksi Down Total dalam kurun waktu 5 hari tidak ditangani dihitung sejak hari pertama komplain, koneksi akan  terputus otomatis apabila tagihan belum terbayar 3 hari setelah hari penagihan.</p>
	</div>
	<script>
		window.print()
	</script>
</body>
</html>