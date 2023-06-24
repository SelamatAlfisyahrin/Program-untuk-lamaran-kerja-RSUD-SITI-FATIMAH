<?php
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	$hapus=mysqli_query($konek, "DELETE FROM tb_angkatan WHERE kd_angkatan='$_GET[kd_angkatan]'");
	
	if(!$hapus){
		echo "<script>alert('GAGAL DIHAPUS ATAU DATA SEDANG DIGUNAKAN DITABEL LAIN (RESTRICT)')
		location='data_angkatan.php'</script>";
	}else{
		echo "<script>alert('BERHASIL MENGHAPUS DATA')
		location='data_angkatan.php'</script>";
	}
}
?>