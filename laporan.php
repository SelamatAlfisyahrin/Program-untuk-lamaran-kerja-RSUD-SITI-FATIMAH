<?php include 'header.php'; ?>
<style >
	.btn{
		margin-top: 10px;
	}
	.panel-heading{
		margin-top: 80px;
	}
</style>
<div class="panel panel-info col-md-12">
	<div class="panel-heading">
<h3>LAPORAN IURAN SISWA</h3>
</div>
<div class="panel-body">
	<table class="table table-bordered table-striped">
		<form class="col-md-2" action="laporan_pembayaran_spp.php" method="GET" target="_blank" >
			<td>
				<b>LAPORAN PEMBAYARAN IURAN SPP</b>
			</td>
			<td>
			<select class="form-control" name="tahun_ajaran">
                    <option value="">--pilih tahun ajaran--</option>
					<?php
					$tahun_ajaran= date('Y');
					for($ajaran=2023;$ajaran<=$tahun_ajaran+3;$ajaran++){
						echo "<option value ='$ajaran'>$ajaran</option>";
					}
					?>
                </select>
			<button class="btn btn-success btn-sm" type="submit" name="tampil">Tampilkan</button>
			</td>	
			
		</form>
		<tr>
		<form class="col-md-2" action="laporan_tunggakan_spp.php" method="GET" target="_blank" >
			<td>
				<b>LAPORAN TUNGGAKAN IURAN SPP</b>
			</td>	
			<td>
			<select class="form-control" name="kd_kelas" required>
                    <option value="">--pilih kelas--</option>
                    <?php
                    $sql_kelas =mysqli_query($konek,"SELECT * FROM tb_kelas") or die (mysqli_error($konek));
                    while($kelas = mysqli_fetch_array($sql_kelas)){
                        echo'<option value="'.$kelas['kd_kelas'].'">'.$kelas['nama_kelas'].'</option>';
                    }
                    ?>
                </select>
				<br>
				<select class="form-control" name="tahun_ajaran">
                    <option value="">--pilih tahun ajaran--</option>
					<?php
					$tahun_ajaran= date('Y');
					for($ajaran=2023;$ajaran<=$tahun_ajaran+3;$ajaran++){
						echo "<option value ='$ajaran'>$ajaran</option>";
					}
					?>
                </select>
				<br>
				<select class="form-control" name="bulan">
                    <option value="">--pilih tahun bulan--</option>
					<option value="Januari">Januari</option>
					<option value="Februari">Februari</option>
					<option value="Maret">Maret</option>
					<option value="April">Januari</option>
					<option value="Mei">Mei</option>
					<option value="Juni">Juni</option>
					<option value="Juli">Juli</option>
					<option value="Agustus">Agustus</option>
					<option value="September">September</option>
					<option value="Oktober">Oktober</option>
					<option value="November">November</option>
					<option value="Desember">Desember</option>
                </select>
				<button class="btn btn-success btn-sm" type="submit" name="tampil">Tampilkan</button>
			</td>
		</form>
		</tr>
		<tr>
				<td><b>LAPORAN PEMBAYARAN IURAN BUKU</b></td>
				<td>
					<a href="laporan_pembayaran_buku.php" target="_blank"><button class="btn btn-success btn-sm"  >Tampilkan</button></a>
				</td>
		</tr>
		<tr>
		<form class="col-md-2" action="laporan_tunggakan_buku.php" method="GET" target="_blank" >
			<td>
				<b>LAPORAN TUNGGAKAN IURAN BUKU</b>
			</td>	
			<td>
			<select class="form-control" name="kd_kelas" required>
                    <option value="">--pilih kelas--</option>
                    <?php
                    $sql_kelas =mysqli_query($konek,"SELECT * FROM tb_kelas") or die (mysqli_error($konek));
                    while($kelas = mysqli_fetch_array($sql_kelas)){
                        echo'<option value="'.$kelas['kd_kelas'].'">'.$kelas['nama_kelas'].'</option>';
                    }
                    ?>
                </select>
				<button class="btn btn-success btn-sm" type="submit" name="tampil">Tampilkan</button>
			</td>
		</form>
		</tr>
	</table>
</div>
</div>
<?php include 'footer.php' ?>