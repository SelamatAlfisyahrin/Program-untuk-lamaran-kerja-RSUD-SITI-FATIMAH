<?php
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	$hapus=mysqli_query($konek, "DELETE FROM tb_buku");
	
	if(!$hapus){
		echo "Hapus data gagal, atau data sedang digunakan di tabel lain...<br/>
		<a href='data_buku.php'>Kembali</a>";	
	}else{
		header('location:data_buku.php');
	}
}
?>