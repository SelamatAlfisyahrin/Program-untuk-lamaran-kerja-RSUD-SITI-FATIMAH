<?php include "header_operator.php"; ?>

<?php
$sqlEdit = mysqli_query($konek, "SELECT * FROM tb_angkatan WHERE kd_angkatan='$_GET[kd_angkatan]'");
$e=mysqli_fetch_array($sqlEdit);
?>
<div class="container">
	<div class="page-header">
	<h3>EDIT INFORMASI ANGKATAN</h3>
	</div>
	<form method="post" action="">
	<div class="table-responsive">
	<table class="table">
		<tr>
			<td>KODE ANGKATAN</td>
			<td><input type="text" class="form-control"name="kd_angkatan" value="<?php echo $e['kd_angkatan']; ?>" readonly></td>
		</tr>
		<tr>
			<td>TAHUN ANGKATAN</td>
			<td><input class="form-control" type="number"  name="tahun_angkatan" value="<?php echo $e['tahun_angkatan']; ?>"></td>
		</tr>
		<tr>
			<td>BIAYA SPP</td>
			<td><input class="form-control" type="number"  name="spp" value="<?php echo $e['spp']; ?>"></td>
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
	$kd_angkatan 	= $_POST['kd_angkatan'];
	$tahun_angkatan	= $_POST['tahun_angkatan'];
	$spp	= $_POST['spp'];
	
    $update = mysqli_query($konek, "UPDATE tb_angkatan SET tahun_angkatan='$tahun_angkatan',spp='$spp'WHERE kd_angkatan='$kd_angkatan'");
		if(!$update){
			echo "Update data gagal...";

		}else{
			echo "<script>
			alert('data berhasil diedit');
			document.location.href = 'data_angkatan.php';
			</script>
			";
		}
}
?>

</div>


<?php include "footer.php" ?>