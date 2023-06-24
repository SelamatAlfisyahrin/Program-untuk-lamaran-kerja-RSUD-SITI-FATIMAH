<?php
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	$hapus=mysqli_query($konek, "DELETE FROM tb_spp WHERE kd_spp='$_GET[kd_spp]'");
	
	if(!$hapus){
		echo "<script>alert('GAGAL DIHAPUS ATAU DATA SEDANG DIGUNAKAN DITABEL LAIN (RESTRICT)')
		location='data_spp.php'</script>";	
	}else{
		echo"<script>alert('BERHASIL DIHAPUS')
		location='data_spp.php'</script>";
	}
}
?>