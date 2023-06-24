<?php include "header_tu.php"; ?>
<div class="container">
    <div class="page-header">
    <h3>INFORMASI DATA BUKU</h3>
    </div>
    <a class="btn btn-primary" href="tambah_buku.php">Tambah Data</a>
</br><br>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <tr>
        <th>KODE BUKU</th>
		<th>NAMA BUKU</th>
		<th>TINGKAT</th>
        <th>TIPE</th>
		<th>HARGA</th>
		<th>AKSI</th>
    </tr>
    <?php
    include "koneksi.php";
   
    $sql = mysqli_query($konek,"SELECT * FROM tb_buku ORDER BY tingkat ASC");
    while($d=mysqli_fetch_array($sql)){
        echo"<tr>
            <td>$d[kd_buku]</td>
            <td>$d[nama_buku]</td>
            <td>$d[tingkat]</td>
            <td>$d[tipe]</td>
            <td>".buatrp($d['harga'])."</td>
            <td>
				<a class='btn btn-warning btn-sm' href='edit_buku.php?kd_buku=$d[kd_buku]'>Edit</a>
				<a class='btn btn-danger btn-sm' href='hapus_buku.php?kd_buku=$d[kd_buku]'>Hapus</a>
			</td>
        </tr>";
    }
    ?>
    </table>
    <a class="btn btn-danger" href="format_buku.php">Hapus Semua Data</a>
</div>
   
</div>

<?php include "footer.php"; ?>