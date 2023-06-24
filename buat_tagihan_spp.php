<?php include "header.php"; ?>
<?php
if($_SESSION['level']=='bendahara'){
    ?>
    <div class="container">
    <h2>BUAT TAGIHAN IURAN SPP SISWA</h2>
	<form method="GET" action="">
    <div class="table-responsive">
    <table class="table">
 		<tr>
            <td>
            <select class="form-control" name="nis" required>
                            <option value="">--Pilih Siswa--</option>
                            <?php
                            $sql_siswa =mysqli_query($konek,"SELECT tb_siswa.*,tb_kelas.nama_kelas FROM tb_siswa JOIN tb_kelas ON tb_siswa.kd_kelas=tb_kelas.kd_kelas ORDER BY tb_kelas.nama_kelas ASC") or die (mysqli_error($konek));
                            while($siswa = mysqli_fetch_array($sql_siswa)){
                                echo'<option value="'.$siswa['nis'].'">'.$siswa['nis'].' : '.$siswa['nama_siswa'].' | Kelas :'.$siswa['nama_kelas'].'</option>';
                            }
                            ?>
                        </select>
            </td>
            
 			<td>
 				<button class="btn btn-success" type="submit" name="cari">PILIH</button>
 			</td>
 		</tr>
 	</table>
    </div>
    
    </form>
    <form action="" method="POST">
        <?php
            if(isset($_GET['nis']) && $_GET['nis']!=''){
                $siswa = mysqli_query($konek,"SELECT tb_siswa.*,tb_kelas.*,tb_angkatan.*
                FROM tb_siswa JOIN tb_kelas ON tb_siswa.kd_kelas=tb_kelas.kd_kelas 
                JOIN tb_angkatan ON tb_siswa.kd_angkatan=tb_angkatan.kd_angkatan 
                WHERE tb_siswa.nis='$_GET[nis]'");
                $dta = mysqli_fetch_assoc($siswa);
                $nis = $dta['nis'];
                ?>
                <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td>NIS</td>
                        <td>
                            <input type="text" class="form-control" name="nis" value="<?php echo $dta['nis'];?>" readonly/>
                        </td>
                    </tr>
                    <tr>
                    <td>NAMA SISWA</td>
                        <td>
                            <input class="form-control" value="<?php echo $dta['nama_siswa'];?>" readonly/>
                        </td>
                    </tr>
                    <tr>
                    <td>KELAS</td>
                        <td>
                            <input class="form-control" value="<?php echo $dta['nama_kelas'];?>" readonly/>
                        </td>
                    </tr>
                    <tr>
                    <td>ANGKATAN</td>
                        <td>
                            <input class="form-control" value="<?php echo $dta['tahun_angkatan'];?>" readonly/>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>BIAYA SPP</td>
                        <td>
                            <input type="number" class="form-control" name="biaya_spp" value="<?php echo $dta['spp']; ?>" readonly/>
                        </td>
                    </tr>

                    <tr>
                        <td>TAHUN AJARAN</td>
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
                        </td>
                        
                    </tr>

                    <tr>
                    <td></td>
                    <td>
                    <input class="btn btn-success" type="submit" value="Simpan" />
                    </td>
                    </tr>
                </table>
                </div>
                
                <?php
            }
        ?>
    </form>
</body>
</html>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//variabel untuk menampung inputan dari form
		$nis 	= $_POST['nis'];
		$biaya 	= $_POST['biaya_spp'];
        $tahun_ajaran 	= $_POST['tahun_ajaran'];
		// Membuat Array untuk menampung bulan bahasa indonesia
		$bulanIndo = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		);
		//proses simpan
        $cek = mysqli_num_rows(mysqli_query($konek,"SELECT * FROM tb_tagihan_spp WHERE nis='$nis' AND tahun_ajaran='$tahun_ajaran'"));
		if($cek>0){
			echo"<script>alert('SISWA GAGAL DIINPUT / DATA SISWA SUDAH TERDAFTAR')
            location='buat_tagihan_spp.php'</script>";
		}else{
            	//ambil data id siswa terakhir
				$ds=mysqli_fetch_array(mysqli_query($konek, "SELECT nis FROM tb_siswa ORDER BY nis DESC LIMIT 1"));
				$idsiswa = $ds['nis'];
				//membuat tagihan (12 bulan dimulai dari Juli 2017 dan menyimpan tagihan di tabel spp
				for($i=4; $i<=15; $i++){
					$bulan = $bulanIndo[date('m', strtotime("+$i month"))];
					$simpan = mysqli_query($konek, "INSERT INTO tb_tagihan_spp(nis,bulan,biaya_spp,tahun_ajaran)
								values('$nis','$bulan','$biaya','$tahun_ajaran')");
								
				}
                    if(!$simpan){
                        echo "Penyimpanan data gagal..";
                    }else{
                        echo"<script>alert('SISWA BERHASIL DIINPUT')
                        location='buat_tagihan_spp.php'</script>";

                        
                    }
		}

	}
?>
</div>
<?php include "footer.php" ?>
<?php
    }else{
        session_destroy();
    }


