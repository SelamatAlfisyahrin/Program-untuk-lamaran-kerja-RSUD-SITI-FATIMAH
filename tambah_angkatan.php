<?php include "header_operator.php"; ?>
<div class="container">
	<div class="page-header">
	<h3>ANGKATAN</h3>
	</div>
	<form method="post" action="">
	<!--OTOMATIS KODE ANGKATAN-->
	<?php
	$auto = mysqli_query($konek,"SELECT MAX(kd_angkatan) as MAX_CODE FROM tb_angkatan");
	$data = mysqli_fetch_array($auto);
	$code=$data['MAX_CODE'];
	$urutan = (int)substr($code,2,3);
	$urutan++;
	$kode_angkatan = 'A-';
	$angkatan = $kode_angkatan.sprintf("%03s",$urutan);
	?>		
	<!--OTOMATIS KODE ANGKATAN-->
	<div class="table-responsive">
	<table class="table table-bordeered">
		<tr>
			<td>Kode Angkatan</td>
			<td><input class="form-control" type="text" name="kd_angkatan" value="<?php echo  $angkatan?>" readonly></td>
		</tr>
		<tr>
			<td>Tahun Angkatan</td>
			<td><input class="form-control" type="number" name="tahun_angkatan" reqruired/></td>
		</tr>
		<tr>
			<td>Biaya SPP</td>
			<td><input class="form-control" type="number" name="spp" reqruired/></td>
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
			$kd_angkatan = $_POST['kd_angkatan'];
			$tahun_angkatan = $_POST['tahun_angkatan'];
			$spp = $_POST['spp'];
			
			$cek = mysqli_num_rows(mysqli_query($konek,"SELECT * FROM tb_angkatan WHERE kd_angkatan='$kd_angkatan'"));
			if($cek>0){
				echo"<script>alert('ANGKATAN SUDAH ADA')
				location='tambah_angkatan.php'</script>";
			}else{
				//simpan data
				$simpan = mysqli_query($konek, "INSERT INTO tb_angkatan(kd_angkatan,tahun_angkatan,spp) VALUES ('$kd_angkatan','$tahun_angkatan','$spp')");
				
				if(!$simpan){
					echo "Simpan data gagal!!!";
				}else{
					echo"<script>alert('INFORMASI ANGKATAN BERHASIL DIINPUT')
					location='data_angkatan.php'</script>";
				}
			}
		}
?>
</div>
<?php include "footer.php"; ?>