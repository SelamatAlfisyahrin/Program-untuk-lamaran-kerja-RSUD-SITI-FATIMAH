<?php
session_start();
include 'koneksi.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
	//variabel untuk menyimpan kiriman dari form
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	if($user=='' || $pass==''){
		echo "<div class='alert alert-warning' role='alert'>
		FORM ANDA TIDAK LENGKAP
		</div>";
	}else{
		include "koneksi.php";
		$sqlLogin = mysqli_query($konek, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
		$jml = mysqli_num_rows($sqlLogin);
		
		if($jml > 0){
			$d=mysqli_fetch_array($sqlLogin);
			if($d['level']=="bendahara"){
				$_SESSION['login']	= true;
				$_SESSION['id_user'] = $d['id_user'];
				$_SESSION['username']=$d['username'];
				$_SESSION['level']="bendahara";
	
				header('location:./index.php');
			}else if($d['level']=="operator"){
				$_SESSION['login']	= true;
				$_SESSION['id_user'] = $d['id_user'];
				$_SESSION['username']=$d['username'];
				$_SESSION['level']="operator";
	
				header('location:./index_operator.php');
			}else if($d['level']=="tu"){
				$_SESSION['login']	= true;
				$_SESSION['id_user'] = $d['id_user'];
				$_SESSION['username']=$d['username'];
				$_SESSION['level']="tu";

				header('location:./index_tu.php');
			}
			else{
				"<div class='alert alert-danger' role='alert'>
			TIDAK PUNYA HAK AKSES
			</div>";
			}
		
		}else{
			echo "<div class='alert alert-danger' role='alert'>
			USERNAME ATAU PASSWORD SALAH
			</div>";
		}
	}
}
?>
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>HALAMAN LOGIN</title>
    <style >
    	.col-md-4col-md-offset-4{
    		margin-top: 20px;
    	}
    </style>

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/style.css" rel="stylesheet">

  </head>
</head>
<body>

	<div class="container">
	<div class="col-md-4 col-md-offset-4">
		<div  class="panel panel-info">
		<div class="panel-heading">
			<h2 align="center">LOGIN</h2>
			<?php if (isset($error) ) :  ?>
				<div class="alert alert-warning">
		<span><b>Peringatan!!</b>Form Belum Lengkap</span>
		</div>
	<?php endif;  ?>

	</div>	
	<div class="panel-body">
		
	<form action="" method="post">
		<table class="table">
			<tr>
				<td>Username</td>
				<td>:</td>
				<td>
					<input class="form-control" type="text" name="username" placeholder="Masukan Username">
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td>
					<input class="form-control" type="Password" name="password" placeholder="password">
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<button class="btn btn-success" name="login">LOGIN</button>
				</td>
			</tr>
		</table>
	</form>
</div>
</div>
</div>
	</div>
</body>
</html>
