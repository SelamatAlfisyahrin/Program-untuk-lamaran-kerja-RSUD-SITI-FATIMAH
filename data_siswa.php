<?php include "header_operator.php"; ?>
<div class="container">
    <div class="page-header">
        <h3>INFORMASI SISWA SMP PGRI 1 PALEMBANG</h3>
    </div>
    <a class="btn btn-primary" href="tambah_siswa.php">Tambah Data</a>
</br><br>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <tr>
        <th>NO</th>
		<th>NIS</th>
		<th>NAMA SISWA</th>
		<th>KELAS</th>
		<th>ANGKATAN</th>
		<th>AKSI</th>
    </tr>
    <?php
    include "koneksi.php";
    $sql = mysqli_query($konek,"SELECT tb_siswa.*,tb_angkatan.*,tb_kelas.* FROM tb_siswa INNER JOIN tb_angkatan ON tb_siswa.kd_angkatan=tb_angkatan.kd_angkatan
    INNER JOIN tb_kelas ON tb_siswa.kd_kelas=tb_kelas.kd_kelas ORDER BY tb_kelas.nama_kelas ASC");
    $no=1;
    while($d=mysqli_fetch_array($sql)){
        echo"<tr>
            <td>$no</td>
            <td>$d[nis]</td>
            <td>$d[nama_siswa]</td>
            <td>$d[nama_kelas]</td>
            <td>$d[tahun_angkatan]</td>
            <td>
				<a class='btn btn-warning btn-sm' href='edit_siswa.php?nis=$d[nis]'>Edit</a>
				<a class='btn btn-danger btn-sm' href='hapus_siswa.php?nis=$d[nis]'>Hapus</a>
			</td>
        </tr>";
        $no++;
    }
    ?>
    </table>
</div>
  
    <p>*Menghapus siswa berarti juga menghapus tagihan iuran siswa*</p>
</div>
<?php include "footer.php"; ?>