<?php
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	$hapus=mysqli_query($konek, "DELETE FROM tb_siswa WHERE nis='$_GET[nis]'");
	
	if(!$hapus){
		echo "<script>alert('GAGAL DIHAPUS ATAU DATA SEDANG DIGUNAKAN DITABEL LAIN (RESTRICT)')
		location='data_siswa.php'</script>";	
	}else{
		echo"<script>alert('BERHASIL DIHAPUS')
		location='data_siswa.php'</script>";
	}
}
?>