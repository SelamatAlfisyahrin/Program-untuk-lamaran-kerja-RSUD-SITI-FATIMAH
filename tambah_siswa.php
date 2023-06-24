<?php include "header_operator.php"; ?>
<div class="container">
	<div class="page-header">
		<h2>TAMBAH DATA SISWA</h2>
	</div>
	<form method="post" action="">
	<?php
	$auto = mysqli_query($konek,"SELECT MAX(nis) as MAX_CODE FROM tb_siswa");
	$data = mysqli_fetch_array($auto);
	$code=$data['MAX_CODE'];
	$urutan = (int)substr($code,8,6);
	$urutan++;
	$kode_sekolah = "10609563";
	$nomorinduksiswa = $kode_sekolah.sprintf("%04s",$urutan);
	?>			
	<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<td>NIS</td>
			<td><input type="text" class="form-control" name="nis" value="<?php echo  $nomorinduksiswa?>" readonly></td>
		</tr>
		<tr>
			<td>Nama Siswa</td>
			<td><input type="text" class="form-control" name="nama_siswa" required></td>
		</tr>
		<tr>
                <td>Kelas</td>
                <td><select class="form-control" name="kd_kelas" required>
                    <option value="">--pilih kelas--</option>
                    <?php
                    $sql_kelas =mysqli_query($konek,"SELECT * FROM tb_kelas") or die (mysqli_error($konek));
                    while($kelas = mysqli_fetch_array($sql_kelas)){
                        echo'<option value="'.$kelas['kd_kelas'].'">'.$kelas['nama_kelas'].'</option>';
                    }
                    ?>
                </select>
				</td>
        </tr>
		<tr>
                <td>Tahun Angkatan</td>
                <td><select class="form-control" name="kd_angkatan" required>
                    <option value="">--pilih angkatan--</option>
                    <?php
                    $sql_angkatan =mysqli_query($konek,"SELECT * FROM tb_angkatan") or die (mysqli_error($konek));
                    while($angkatan = mysqli_fetch_array($sql_angkatan)){
                        echo'<option value="'.$angkatan['kd_angkatan'].'">'.$angkatan['tahun_angkatan'].'</option>';
                    }
                    ?>
                </select>
				</td>
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
		
		//variabel untuk menampung inputan dari form
		$nis 	= $_POST['nis'];
		$nama 	= $_POST['nama_siswa'];
		$kd_kelas 	= $_POST['kd_kelas'];
		$kd_angkatan 	= $_POST['kd_angkatan'];

		$cek = mysqli_num_rows(mysqli_query($konek,"SELECT * FROM tb_siswa WHERE nis='$nis'"));
			if($cek>0){
				echo"<script>alert('SISWA SUDAH ADA')
				location='tambah_siswa.php'</script>";
			}else{
				//simpan data
				$simpan = mysqli_query($konek, "INSERT INTO tb_siswa(nis,nama_siswa,kd_kelas,kd_angkatan) VALUES ('$nis','$nama','$kd_kelas','$kd_angkatan')");
				
				if(!$simpan){
					echo"<script>alert('SISWA GAGAL DIINPUT')
					location='tambah_siswa.php'</script>";
				}else{
					echo"<script>alert('SISWA BERHASIL DIINPUT')
					location='data_siswa.php'</script>";
				}
			}

	}
?>
</div>
<!-- simpan data -->

<?php include "footer.php"; ?>