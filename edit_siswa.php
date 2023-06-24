<?php include "header_operator.php"; ?>

<?php
$sqlEdit = mysqli_query($konek, "SELECT * FROM tb_siswa WHERE nis='$_GET[nis]'");
$e=mysqli_fetch_array($sqlEdit);
?>
<div class="container">
	<div class="page-header">
	<h3>EDIT DATA SISWA</h3>
	</div>
	<form method="post" action="">
		<div class="table-responsive">
		<table class="table table-bordered">
        <tr>
			<td>NIS</td>
			<td><input type="text" class="form-control"name="nis" value="<?php echo $e['nis']; ?>" readonly></td>
		</tr>
		<tr>
			<td>NAMA SISWA</td>
			<td><input type="text" class="form-control" name="nama_siswa" value="<?php echo $e['nama_siswa']; ?>" required></td>
		</tr>
        <tr>
                <td>KELAS</td>
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
                <td>TAHUN ANGKATAN</td>
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
			<td><input class="btn btn-success"  type="submit" value="Update" /></td>
		</tr>
	</table>
		</div>
	
</form>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

	//variabel untuk menampung inputan dari form
	$nis 	    = $_POST['nis'];
	$nama_siswa	= $_POST['nama_siswa'];
	$kd_kelas 	    = $_POST['kd_kelas'];
    $kd_angkatan	= $_POST['kd_angkatan'];

    $update = mysqli_query($konek, "UPDATE tb_siswa SET nis='$nis',nama_siswa='$nama_siswa',kd_kelas='$kd_kelas',kd_angkatan='$kd_angkatan'WHERE nis='$nis'");
		if(!$update){
			echo "<script>
			alert('GAGAL EDIT DATA SISWA');
			document.location.href = 'edit_siswa.php';
			</script>
			";

		}else{
			echo "<script>
			alert('BERHASIL EDIT DATA SISWA');
			document.location.href = 'data_siswa.php';
			</script>
			";
		}
}
?>

</div>


<!-- proses edit data -->

<?php include "footer.php" ?>