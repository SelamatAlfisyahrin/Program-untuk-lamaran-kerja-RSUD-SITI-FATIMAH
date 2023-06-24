<?php include "header.php" ?>
<?php
if($_SESSION['level']=='bendahara'){
    ?>
<div class="container">
        <h3>INPUT TAGIHAN BUKU SISWA</h3>
    <form method="get" action="">
    <div class="table-responsive">
    <table class="table">
       <tr>
       <td>
             <select class="form-control" name="kd_buku">
                            <option value="">--pilih buku--</option>
                            <?php
                            $sql_buku =mysqli_query($konek,"SELECT * FROM tb_buku") or die (mysqli_error($konek));
                            while($buku = mysqli_fetch_array($sql_buku)){
                                echo'<option value="'.$buku['kd_buku'].'">'.$buku['nama_buku'].'  '.'Tingkat : '.$buku['tingkat'].'</option>';
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
    if(isset($_GET['kd_buku']) && $_GET['kd_buku']!=''){
        $buku = mysqli_query($konek,"SELECT * FROM tb_buku WHERE kd_buku='$_GET[kd_buku]'");
        $dta = mysqli_fetch_assoc($buku);
        $kd_buku = $dta['kd_buku'];
        ?>
        <div class="table-responsive">
        <table class="table table-bordered">
      
            <tr>
            <td>KODE BUKU</td>
                <td>
                    <input type="text" class="form-control" name="kd_buku" value="<?php echo $dta['kd_buku'];?>" readonly/>
                </td>
            </tr>
            <tr>
                <td>NAMA BUKU</td>
                <td>
                    <input class="form-control" value="<?php echo $dta['nama_buku'];?>" readonly/>
                </td>
            </tr>
            <tr>
                <td>TINGKAT BUKU</td>
                <td>
                    <input class="form-control" value="<?php echo $dta['tingkat'];?>" readonly/>
                </td>
            </tr>
            <tr>
                <td>TIPE BUKU</td>
                <td>
                    <input class="form-control" value="<?php echo $dta['tipe'];?>" readonly/>
                </td>
            </tr>
            <tr>
                <td>HARGA BUKU</td>
                <td>
                    <input type="number" class="form-control" name="harga_buku" value="<?php echo $dta['harga'];?>" readonly/><br>
                    
                </td>
            </tr>
                    <tr>
                        <td>NIS</td>
                        <td><select class="form-control" name="nis" required>
                            <option value="">--Pilih NIS--</option>
                            <?php
                            $sql_siswa =mysqli_query($konek,"SELECT tb_siswa.*,tb_kelas.* FROM tb_siswa JOIN tb_kelas ON tb_siswa.kd_kelas=tb_kelas.kd_kelas ORDER BY tb_kelas.nama_kelas ASC") or die (mysqli_error($konek));
                            while($siswa = mysqli_fetch_array($sql_siswa)){
                                echo'<option value="'.$siswa['nis'].'">'.$siswa['nis'].' | Kelas :'.$siswa['nama_kelas'].'</option>';
                            }
                            ?>
                        </select><br><button type="submit" class="btn btn-success" name="cari" value="Simpan">simpan</button></td>
                        
                    </tr>      
        </table>
        </div>
      
        <?php
    }
    ?>
</form>
</body>
</htm>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    //menyimpan inputan ke variable
    $kd_buku = $_POST['kd_buku'];
    $nis = $_POST['nis'];
    $harga_buku = $_POST['harga_buku'];

    $cek = mysqli_num_rows(mysqli_query($konek,"SELECT * FROM tb_tagihan_buku WHERE nis='$nis' AND kd_buku='$kd_buku'"));
    if($cek>0){
        echo"<script>alert('GAGAL BUKU SUDAH DIINPUTKAN')
        location='buat_tagihan_buku.php'</script>";
    }else{ 
      $query="INSERT INTO tb_tagihan_buku (nis,kd_buku,harga_buku) VALUES ('$nis','$kd_buku','$harga_buku')";
      $result = mysqli_query($konek, $query);
      if(!$result){
          die ("Query gagal dijalankan: ".mysqli_errno($konek).
               " - ".mysqli_error($konek));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil ditambah.');window.location='buat_tagihan_buku.php';</script>";
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

