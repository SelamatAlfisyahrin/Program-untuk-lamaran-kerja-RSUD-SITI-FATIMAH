<?php 
session_start();
if(isset($_SESSION['login'])) {
    include 'fungsi.php';
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembayaran Buku</title>
	<style type="text/css">
		body{
			font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; background-color: white;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
				
			}
		}
		.isi{
			border-bottom: 7px solid black;padding: 0px; width: 100%;
		}
		.tengah{text-align: center;line-height: 7px;}
		.kopsurat{width: 750px;margin: 0 auto; background-color: white; height: 150px; padding: 20px;}
		
	</style>
	
</head>
<body>
<div class="kopsurat">
        <table class="isi">
            <tr>
                <td><img src="./img/logo_pgri.png" width="150px" alt=""></td>
                <td class="tengah">
                    <h2>SMP PGRI 1 PALEMBANG</h2>
                    <p>Jl. Jendral A. Yani Lorong Gotong Royong, 9/10 Ulu, Kec. Sebrang Ulu II,</p>
                    <p>Kota Palembang, Sumatera Selatan</p>
                    <p>(0711)511924</p>
                </td>
            </tr>
        </table>
    </div>

	<h3>LAPORAN PEMBAYARAN BUKU SISWA</h3>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>NIS</th>
		<th>NAMA SISWA</th>
		<th>KELAS</th>
        <th>BUKU</th>
		<th>HARGA</th>
		<th>KETERANGAN</th>
	</tr>
	<?php 
	$spp = $konek -> query("SELECT tb_tagihan_buku.*,tb_siswa.*,tb_kelas.*,tb_buku.* FROM tb_tagihan_buku JOIN tb_siswa ON tb_tagihan_buku.nis=tb_siswa.nis 
    JOIN tb_kelas ON tb_siswa.kd_kelas=tb_kelas.kd_kelas JOIN tb_buku ON tb_tagihan_buku.kd_buku=tb_buku.kd_buku WHERE tb_tagihan_buku.tglbayar ORDER BY tb_kelas.nama_kelas ASC");
	$i=1;
	$total = 0;
	while($dta=mysqli_fetch_array($spp)):
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['nis'] ?></td>
		<td align=""><?= $dta['nama_siswa'] ?></td>
		<td align=""><?= $dta['nama_kelas'] ?></td>
		<td align=""><?= $dta['nama_buku'] ?></td>
		<td align="right"><?php echo buatrp($dta['harga_buku']); ?></td>
		<td align="center"><?= $dta['ket'] ?></td>
	</tr>
	<?php $i++; ?>
	<?php $total += $dta['harga_buku']; ?>

<?php endwhile; ?>
<tr>
		<td colspan="5" align="center"><b>TOTAL</b></td>
		<td align="right"><b><?php echo buatrp($total );?></b></td>
		<td></td>
	</tr>
	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p><b>Bendahara SMP PGRI 1 Palembang</b>, <?= date('d/m/Y') ?>
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>


	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>
</html>


<?php 
} else {
	header("location : login.php");
}
?>