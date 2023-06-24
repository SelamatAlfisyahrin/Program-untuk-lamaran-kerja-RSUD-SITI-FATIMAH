<?php include"header.php";?>
<?php
include'koneksi.php';

$sqlEdit=mysqli_query($konek,"SELECT*FROM users WHERE id_user='$_GET[id]'");
$edit=mysqli_fetch_array($sqlEdit);
?>
<div class="container">

    <h3>EDIT BENDAHARA</h3>
 
    <form action="" method="POST">
    <input type="hidden" name="id_user" value="<?php echo $edit['id_user'];?>">
	<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<td>USERNAME</td>
			<td><input class="form-control" type="text"   name="username" value="<?php echo $edit['username']; ?>"></td>
		</tr>
        <tr>
			<td>PASSWORD</td>
			<td><input class="form-control" type="password"  name="password" value="<?php echo $edit['password']; ?>"></td>
		</tr>
        <tr>
			<td>NAMA LENGKAP</td>
			<td><input class="form-control" type="text"  name="namalengkap" value="<?php echo $edit['namalengkap']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input class="btn btn-success"  type="submit" value="Update"/></td>
		</tr>
	</table>
	</div>
    

</form>
</div>

<?php
include"koneksi.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    //proses edit
    $id_user	= $_POST['id_user'];
	$username 	= $_POST['username'];
    $password 	= $_POST['password'];
    $namalengkap 	= $_POST['namalengkap'];

    if($username==''||$password==''||$namalengkap==''){
        echo"FORM ANDA BELUM LENGKAP";
    }else{
        //proses edit berhasil

        $editdata= mysqli_query($konek,"UPDATE users SET username='$username',password='$password',namalengkap='$namalengkap'
        WHERE id_user='$id_user'");

        if(!$editdata){
            echo"PROSES EDIT DATA ANDA GAGAL";
        }else{
			echo "<script>
			alert('data berhasil diedit');
			document.location.href = 'bendahara.php';
			</script>
			";
		}
    }
}
?>
<?php include"footer.php";?>