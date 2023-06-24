<?php include "header.php"; ?>
<div class="container">
    <div class="page-header">
    <h3 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">BENDAHARA SMP PGRI 1 PALEMBANG</h3>
    </div>

    <div class="table-responsive">
    <table class="table table-bordered table-striped">
    <tr>
        <th style="text-align: center;">USERNAME</th>
		<th style="text-align: center;">NAMA LENGKAP</th>
		<th style="text-align: center;">AKSI</th>
    </tr>
    <?php
    $id_user=$_SESSION['id_user'];
    include "koneksi.php";
    $sql = mysqli_query($konek,"SELECT * FROM users WHERE id_user='$id_user' ORDER BY id_user ASC");
    while($d=mysqli_fetch_array($sql)){
        echo"<tr>
            <td>$d[username]</td>
            <td>$d[namalengkap]</td>
            <td>
				<a class='btn btn-warning btn-sm' href='edit_bendahara.php?id=$d[id_user]'>Edit</a>
			</td>
        </tr>";
    }
    ?>
    </table>
    </div>
   
</div>
<?php include "footer.php"; ?>