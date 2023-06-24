<?php include "header_operator.php"; ?>

<?php
$sqlEdit = mysqli_query($konek, "SELECT * FROM tb_kelas WHERE kd_kelas='$_GET[kd_kelas]'");
$e=mysqli_fetch_array($sqlEdit);
?>
<div class="container">
	<div class="page-header">
	<h3>EDIT INFORMASI Kelas</h3>
	</div>
	<form method="post" action="">
	<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<td>KODE KELAS</td>
			<td><input type="text" class="form-control"name="kd_kelas" value="<?php echo $e['kd_kelas']; ?>" readonly></td>
		</tr>
		<tr>
			<td>NAMA KELAS</td>
			<td><input class="form-control" type="text"  name="nama_kelas" value="<?php echo $e['nama_kelas']; ?>"></td>
		</tr>
		<tr>
			<td>WALI KELAS</td>
			<td><input class="form-control" type="text"  name="wali_kelas" value="<?php echo $e['wali_kelas']; ?>"></td>
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
	$kd_kelas 	= $_POST['kd_kelas'];
	$nama_kelas	= $_POST['nama_kelas'];
	$wali_kelas	= $_POST['wali_kelas'];
    $update = mysqli_query($konek, "UPDATE tb_kelas SET nama_kelas='$nama_kelas',wali_kelas='$wali_kelas'WHERE kd_kelas='$kd_kelas'");
		if(!$update){
			echo "<script>
			alert('data gagal diedit');
			document.location.href = 'edit_kelas.php';
			</script>
			";

		}else{
			echo "<script>
			alert('data berhasil diedit');
			document.location.href = 'data_kelas.php';
			</script>
			";
		}
}
?>

</div>


<?php include "footer.php" ?>