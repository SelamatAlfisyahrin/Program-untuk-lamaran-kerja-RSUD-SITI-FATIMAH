<?php
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	$hapus=mysqli_query($konek, "DELETE FROM tb_buku WHERE kd_buku='$_GET[kd_buku]'");
	
	if(!$hapus){
		echo"<script>alert('GAGAL MENGHAPUS DATA, KARENA DATA SEDANG DIGUNAKAN DI TABEL LAIN...!!!')
		location='data_buku.php'</script>";
	}else{
		echo"<script>alert('BERHASIL DIHAPUS')
		location='data_buku.php'</script>";
	}
}
?>