<?php include "header.php" ?>
<div class="container">
<h2>PEMBAYARAN IURAN SPP</h2>
<form action="" method="GET">
    <table class="table">
        <tr>
            <td>
                <p  style="color: red;">*CARI TAGIHAN IURAN SPP SISWA MENGGUNAKAN NIS*</p>
                <input type="text" class="form-control" name="nis"/><br>
                <button class="btn btn-success" type="submit" name="search" value="Cari NIS">Cari</button>           
            </td>
        </tr>
    </table>
</form>
<?php
if(isset($_GET['nis']) && $_GET['nis']!=''){
	$sqlSiswa = mysqli_query($konek, "SELECT tb_siswa.*,tb_kelas.*,tb_angkatan.* FROM tb_siswa JOIN 
    tb_kelas ON tb_siswa.kd_kelas=tb_kelas.kd_kelas JOIN tb_angkatan ON tb_siswa.kd_angkatan=tb_angkatan.kd_angkatan WHERE nis='$_GET[nis]'");
	$ds=mysqli_fetch_array($sqlSiswa);
	$nis = $ds['nis'];
?>
<div class="panel panel-info">
	<div class="panel-heading">
<h3>Data Siswa</h3>
</div>
<div class="panel panel-body">
    <div class="table-responsive">
    <table class="table table-bordered table-striped">
		<tr>
		<td>NIS</td>
		<td><?php echo $ds['nis']; ?></td>
	</tr>
	<tr>
		<td>Nama Siswa</td>
		<td><?php echo $ds['nama_siswa']; ?></td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td><?php echo $ds['nama_kelas']; ?></td>
	</tr>
    <tr>
		<td>Angkatan</td>
		<td><?php echo $ds['tahun_angkatan']; ?></td>
	</tr>
	</table>
    </div>
	
</div>
</div>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3>Iuran SPP Siswa</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Tahun Ajaran</th>
            <th>Bulan</th>
            <th>No. Bayar</th>
            <th>Tgl. Bayar</th>
            <th>Biaya SPP</th>
            <th>Keterangan</th>
            <th>Bayar</th>
	    </tr>
        <?php
        $sql = mysqli_query($konek, "SELECT tb_tagihan_spp.*,tb_siswa.*,tb_kelas.* FROM tb_tagihan_spp JOIN tb_siswa ON tb_tagihan_spp.nis=tb_siswa.nis JOIN tb_kelas ON tb_siswa.kd_kelas=tb_kelas.kd_kelas WHERE tb_tagihan_spp.nis='$ds[nis]' ORDER BY id_tagihan ASC");
        $no=1;
        while($d=mysqli_fetch_array($sql)){
            echo "<td>$no</td>
            <td>$d[tahun_ajaran]</td>
            <td>$d[bulan]</td>
            <td>$d[nobayar]</td>
            <td>$d[tglbayar]</td>
            <td>".buatrp($d['biaya_spp'])."</td>
            <td>$d[ket]</td>
            <td align='center'>";
                if($d['nobayar']==''){
                    echo "<a class='btn btn-success btn-sm' href='proses_pembayaran_spp.php?nis=$nis&act=bayar&id=$d[id_tagihan]'>Bayar</a>";
                }else{
                    echo "</a>";
                    echo "<a class='btn btn-primary btn-sm' href='cetak_slip_spp.php?nis=$nis&act=bayar&id=$d[id_tagihan]'target='_blank'>Cetak</a> ";
                }
            echo "</td>
        </tr>";
        $no++;
        }
	    ?>
        </table>
        </div>
       
    </div>
</div>
<?php
}
?>
</div>
<?php include "footer.php" ?>
