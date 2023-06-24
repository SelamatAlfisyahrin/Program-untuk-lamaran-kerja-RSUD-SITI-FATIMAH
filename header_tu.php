<?php
session_start();

if(!isset($_SESSION['login'])){
	header('location:login.php');
}



include "koneksi.php";
include "fungsi.php";
if($_SESSION['level']=='tu'){
  ?>

  <!DOCTYPE html>
  <html>
  <head>
    
  <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="./assets/favicon.png">
      <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/sticky-footer-navbar/">
  
      <title>Tata Usaha</title>
  
      <!-- Bootstrap core CSS -->
      <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="./assets/style.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
      
  </head>
  <body>
  <hr/>
  
  <hr/>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"></a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
            <li class=""><a href="index_tu.php">HOME</i></a></li>
              <li class=""><a href="tu.php">TATA USAHA</a></li>
              <li class=""><a href="data_buku.php">INFORMASI BUKU</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
      </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
      <?php
}elseif($_SESSION['level']=='bendahara'){
  echo"<script>alert('DILARANG MELAKUKAN PENEROBOSAN HAK AKSES')
					location='index.php'</script>";
}elseif($_SESSION['level']=='operator'){
  echo"<script>alert('DILARANG MELAKUKAN PENEROBOSAN HAK AKSES')
					location='index_operator.php'</script>";
        }

	