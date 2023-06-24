<?php
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	$hapus=mysqli_query($konek, "DELETE FROM tb_kelas WHERE kd_kelas='$_GET[kd_kelas]'");
	
	if(!$hapus){
		echo "<script>alert('GAGAL DIHAPUS ATAU DATA SEDANG DIGUNAKAN DITABEL LAIN (RESTRICT)')
		location='data_kelas.php'</script>";	
	}else{
		echo"<script>alert('BERHASIL DIHAPUS')
		location='data_kelas.php'</script>";
	}
}
?>