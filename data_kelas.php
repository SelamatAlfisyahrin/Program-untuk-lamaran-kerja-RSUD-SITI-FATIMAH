<?php include "header_operator.php"; ?>
<div class="container">
    <div class="page-header">
    <h3>INFORMASI DATA KELAS</h3>
    </div>
    <a class="btn btn-primary" href="tambah_kelas.php">Tambah Data</a>
</br><br>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <tr>
        <th>KODE KELAS</th>
		<th>NAMA KELAS</th>
        <th>WALI KELAS</th>
		<th>AKSI</th>
    </tr>
    <?php
    include "koneksi.php";
    $sql = mysqli_query($konek,"SELECT * FROM tb_kelas ORDER BY tb_kelas.nama_kelas ASC");
    while($d=mysqli_fetch_array($sql)){
        echo"<tr>
            <td>$d[kd_kelas]</td>
            <td>$d[nama_kelas]</td>
            <td>$d[wali_kelas]</td>
            <td>
				<a class='btn btn-warning btn-sm' href='edit_kelas.php?kd_kelas=$d[kd_kelas]'>Edit</a>
				<a class='btn btn-danger btn-sm' href='hapus_kelas.php?kd_kelas=$d[kd_kelas]'>Hapus</a>
			</td>
        </tr>";
    }
    ?>
    </table>
</div>
   
</div>
<?php include "footer.php"; ?>