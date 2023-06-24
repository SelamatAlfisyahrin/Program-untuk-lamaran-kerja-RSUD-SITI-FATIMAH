<?php 
date_default_timezone_set("Asia/Jakarta"); //GMT +07
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	if($_GET['act']=='bayar'){

		$id_tagihan 	= $_GET['id'];
		$nis	= $_GET['nis'];

		//membuat nomor pembayaran
		$today = date("Y-m-d");
		$query = mysqli_query($konek, "SELECT max(nobayar) AS last FROM tb_tagihan_buku WHERE nobayar LIKE '$today%'");
		$data = mysqli_fetch_array($query);
		$lastNoBayar	= $data['last'];
		$lastNoUrut		= substr($lastNoBayar, 6, 4);
		$nextNoUrut		= $lastNoUrut + 1;
		$nextNoBayar	= $today.sprintf('%04s', $nextNoUrut);

		//tanggal Bayar
		$tglBayar 	= date('Y-m-d');
		mysqli_query($konek, "UPDATE tb_tagihan_buku SET nobayar='$nextNoBayar',tglbayar='$tglBayar',ket='LUNAS'
					WHERE id_tagihan='$id_tagihan'");

		header('location:pembayaran_buku.php?nis='.$nis);
	}
}
?>