<?php include "header_operator.php"; ?>
<div class="container">
	<div class="page-header">
	<h3>TAMBAH KELAS</h3>
	</div>
	<form method="post" action="">
	<!--OTOMATIS KODE SPP-->
	<?php
	$auto = mysqli_query($konek,"SELECT MAX(kd_kelas) as MAX_CODE FROM tb_kelas");
	$data = mysqli_fetch_array($auto);
	$code=$data['MAX_CODE'];
	$urutan = (int)substr($code,2,3);
	$urutan++;
	$kode_kelas = 'K-';
	$kelas = $kode_kelas.sprintf("%03s",$urutan);
	?>		
	<!--OTOMATIS KODE SPP-->	
	<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<td>Kode Kelas</td>
			<td><input class="form-control" type="text" name="kd_kelas" value="<?php echo  $kelas?>" readonly></td>
		</tr>
        <tr>
			<td>Nama Kelas</td>
			<td><input class="form-control" type="text" name="nama_kelas"></td>
		</tr>
		<tr>
			<td>Wali Kelas</td>
			<td><input class="form-control" type="text" name="wali_kelas"></td>
		</tr>
		<tr>
			<td></td>
			<td><input class="btn btn-success" type="submit" value="Simpan" /></td>
		</tr>
	</table>
	</div>
	
</form>
</body>
</html>
<?php
		
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$kd_kelas = $_POST['kd_kelas'];
			$nama_kelas = $_POST['nama_kelas'];
			$wali_kelas = $_POST['wali_kelas'];
			$cek = mysqli_num_rows(mysqli_query($konek,"SELECT * FROM tb_kelas WHERE nama_kelas ='$nama_kelas'"));
			if($cek>0){
				echo"<script>alert('DATA IS ALREADY EXIST..!!!')
				location='tambah_kelas.php'</script>";
			}else{
				//simpan data
				$simpan = mysqli_query($konek, "INSERT INTO tb_kelas(kd_kelas,nama_kelas,wali_kelas) VALUES ('$kd_kelas','$nama_kelas','$wali_kelas')");
				
				if(!$simpan){
					echo "Simpan data gagal!!!";
				}else{
					echo"<script>alert('DATA BERHASIL DIINPUT')
					location='data_kelas.php'</script>";
				}
			}
		}
?>
</div>
<?php include "footer.php"; ?>