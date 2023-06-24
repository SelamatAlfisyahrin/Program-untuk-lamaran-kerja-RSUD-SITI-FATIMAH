<?php 
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	if($_GET['act']=='bayar'){

		$id_tagihan 	= $_GET['id'];
		$nis	= $_GET['nis'];

		//membuat nomor pembayaran
		$today = date("ymd");
		$query = mysqli_query($konek, "SELECT max(nobayar) AS last FROM tb_tagihan_spp WHERE nobayar LIKE '$today%'");
		$data = mysqli_fetch_array($query);
		$lastNoBayar	= $data['last'];
		$lastNoUrut		= substr($lastNoBayar, 6, 4);
		$nextNoUrut		= $lastNoUrut + 1;
		$nextNoBayar	= $today.sprintf('%04s', $nextNoUrut);

		//tanggal Bayar
		$tglBayar 	= date('Y-m-d');
		mysqli_query($konek, "UPDATE tb_tagihan_spp SET nobayar='$nextNoBayar',tglbayar='$tglBayar',ket='LUNAS'
					WHERE id_tagihan='$id_tagihan'");

		header('location:pembayaran_spp.php?nis='.$nis);
	}
}
?>