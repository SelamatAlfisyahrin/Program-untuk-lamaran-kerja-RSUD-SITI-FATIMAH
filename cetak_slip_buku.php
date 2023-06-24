<?php 
session_start();
if(isset($_SESSION['login']) && $_SESSION['level']=='bendahara' ) {
	include 'koneksi.php';
	include 'fungsi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Slip Pembayaran Buku</title>
	
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
	<?php 
	$siswa = $konek->query("SELECT tb_siswa.*,tb_kelas.*,tb_angkatan.* FROM tb_siswa JOIN tb_kelas ON tb_siswa.kd_kelas=tb_kelas.kd_kelas
    JOIN tb_angkatan ON tb_siswa.kd_angkatan=tb_angkatan.kd_angkatan WHERE nis='$_GET[nis]' ");
	$sw = mysqli_fetch_assoc($siswa);

	 ?>
	<table>
        <h3>DATA SISWA</h3>
		<tr>
			<td>Nama Siswa </td>
			<td>:</td>
			<td> <?= $sw['nama_siswa'] ?></td>
		</tr>
		<tr>
			<td>Nis </td>
			<td>:</td>
			<td> <?= $sw['nis'] ?></td>
		</tr>
		<tr>
			<td>Kelas </td>
			<td>:</td>
			<td> <?= $sw['nama_kelas'] ?></td>
		</tr>
        <tr>
			<td>Agkatan</td>
			<td>:</td>
			<td> <?= $sw['tahun_angkatan'] ?></td>
		</tr>
	</table>
	<hr>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
    <h3>PEMBAYARAN SPP</h3>
	<tr>
        <th>NO</th>
		<th>NIS</th>
		<th>NAMA BUKU</th>
        <th>TIPE</th>
		<th>HARGA</th>
		<th>KETERANGAN</th>
	</tr>
	<?php 
	$spp = $konek -> query("SELECT tb_tagihan_buku.*,tb_siswa.*,tb_buku.* FROM tb_tagihan_buku JOIN tb_siswa ON tb_tagihan_buku.nis=tb_siswa.nis JOIN tb_buku ON tb_tagihan_buku.kd_buku=tb_buku.kd_buku WHERE id_tagihan ='$_GET[id]' ORDER BY nobayar ASC");
	$i=1;
	$total = 0;
	while($dta=mysqli_fetch_array($spp)) :
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['nis'] ?></td>
        <td align=""><?= $dta['nama_buku'] ?></td>
		<td align=""><?= $dta['tipe'] ?></td>
		<td align="right"><?php echo buatrp($dta['harga_buku']); ?></td>
		<td align="center"><?= $dta['ket'] ?></td>
	</tr>
	<?php $i++; ?>
	

<?php endwhile; ?>

	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Bendahara SMP PGRI 1 Palembang, <?= date('d/m/y') ?> <br/>
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>

<p>*slip pembayaran harap disimpan dengan baik*</p>
	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>
</html>


<?php 
} else{
	session_destroy();
}
?>