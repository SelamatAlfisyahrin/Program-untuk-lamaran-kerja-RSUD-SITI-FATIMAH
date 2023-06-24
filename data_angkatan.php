<?php include "header_operator.php"; ?>
<?php

?>
<div class="container">
    <div class="page-header">
    <h3>INFORMASI ANGKATAN</h3>
    </div>
    <a class="btn btn-primary" href="tambah_angkatan.php">Tambah Data</a>
    <br>
    <div class="table-responsive">
    <table class="table table-bordered table-striped">
    <tr>
        <th>KODE ANGKATAN</th>
		<th>TAHUN ANGKATAN</th>
        <th>BIAYA SPP</th>
		<th>AKSI</th>
    </tr>
    <?php
    include "koneksi.php";
    $sql = mysqli_query($konek,"SELECT * FROM tb_angkatan ORDER BY tahun_angkatan ASC");
    while($d=mysqli_fetch_array($sql)){
        echo"<tr>
            <td>$d[kd_angkatan]</td>
            <td>$d[tahun_angkatan]</td>
            <td>".buatrp($d['spp'])."</td>
            <td>
				<a class='btn btn-warning btn-sm' href='edit_angkatan.php?kd_angkatan=$d[kd_angkatan]'>Edit</a>
				<a class='btn btn-danger btn-sm' href='hapus_angkatan.php?kd_angkatan=$d[kd_angkatan]'>Hapus</a>
			</td>
        </tr>";
    }
    ?>
    </table>
    </div>
  
</div>
<?php include "footer.php"; ?>