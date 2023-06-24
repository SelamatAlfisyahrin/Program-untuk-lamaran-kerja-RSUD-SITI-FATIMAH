<?php include "header_tu.php"; ?>
<div class="container">
	<div class="page-header">
	<h3>Tambah data buku</h3>
	</div>
	<form method="POST" action="">
	<?php
	$auto = mysqli_query($konek,"SELECT MAX(kd_buku) as MAX_CODE FROM tb_buku");
	$data = mysqli_fetch_array($auto);
	$code=$data['MAX_CODE'];
	$urutan = (int)substr($code,2,3);
	$urutan++;
	$kode_buku = 'B-';
	$buku = $kode_buku.sprintf("%03s",$urutan);
	?>
	<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<td>Kode Buku</td>
			<td><input class="form-control" type="text" name="kd_buku" value="<?php echo  $buku?>" readonly></td>
		</tr>		
		<tr>
			<td>Nama Buku</td>
			<td><input type="text" class="form-control" name="nama_buku" reqruired/></td>
		</tr>
		<tr>
			<td>Tingkat</td>
			<td><input type="text" class="form-control" name="tingkat" reqruired/></td>
		</tr>
        <tr>
			<td>Tipe Buku</td>
			<td><input type="text" class="form-control" name="tipe" reqruired/></td>
		</tr>
        <tr>
			<td>Harga</td>
			<td><input type="number" class="form-control" name="harga" reqruired/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" class="btn btn-success" value="Simpan" /></td>
		</tr>
	</table>	
	</div>
	
</form>

</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$kd_buku = $_POST['kd_buku'];
	$namabuku = $_POST['nama_buku'];
	$tingkat = $_POST['tingkat'];
    $tipe = $_POST['tipe'];
	$harga = $_POST['harga'];
	
    $cek = mysqli_num_rows(mysqli_query($konek,"SELECT * FROM tb_buku WHERE nama_buku='$namabuku' AND tingkat='$tingkat'"));
    if($cek>0){
        echo"<script>alert('BUKU TELAH DIINPUT')
        location='tambah_buku.php'</script>";
    }else{
		//simpan data
		$simpan = mysqli_query($konek, "INSERT INTO tb_buku(kd_buku,nama_buku,tingkat,tipe,harga) VALUES ('$kd_buku','$namabuku','$tingkat','$tipe','$harga')");
		
		if(!$simpan){
			echo "Simpan data gagal!!!";
		}else{
			echo"<script>alert('BUKU BERHASIL DIINPUT :)')
			location='data_buku.php'</script>";
		}
	}
}
?>
</div>

<?php include "footer.php"; ?>