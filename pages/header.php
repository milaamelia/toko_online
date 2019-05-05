<?php
    session_start();
    include "../config/koneksi.php";

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }else{
        header("location: ../login.php");
    }
    $session_id = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ibazaar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="icon" type="image/png" href="../image/logo.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>باز</b>اار</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Ibazaar</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">

<ul class="nav navbar-nav">
  <!-- Messages: style can be found in dropdown.less-->
  <li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <i class=""></i>

      <span class="label label-success"></span>

    </a>
    <ul class="dropdown-menu">
      <li class="header"></li>
      <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
          <li><!-- start message -->
            <a href="#">
              <div class="pull-left">
                <img src="" class="img-circle" alt="User Image">
              </div>
              <h4>
                <small></small>
              </h4>
              <p></p>
            </a>
          </li>
         </ul>
      </li>
      <li class="footer"><a href="../pages/tanya.php"></a></li>
    </ul>
  </li>
  <!-- Tasks: style can be found in dropdown.less -->
  <!-- User Account: style can be found in dropdown.less -->
  <li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="../image/user.png" class="user-image" alt="User Image">
      <span class="hidden-xs"><?php echo $username; ?></span>
    </a>
    <ul class="dropdown-menu">
      <!-- User image -->
      <li class="user-header">
        <img src="../image/user.png" class="img-circle" alt="User Image">
        <p>
                 Selamat Datang
            <small> <?php echo $username; ?></small>
        </p>
        
      </li>
      <!-- Menu Body -->
      <!-- Menu Footer-->
      <!--ganti password-->
      <li class="user-footer">
        <div class="pull-left">
          <a href="../ganti_pw.php" class="btn btn-default btn-flat">Ganti Password </a>
        </div>
        <div class="pull-right">
          <a href="../logout.php" class="btn btn-default btn-flat">Log out</a>
        </div>
      </li>
    </ul>
  </li>
  <!-- Control Sidebar Toggle Button -->
  </ul>
</div>
</nav>
</header>

    </nav>
  </header>
                                                                                
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../image/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $username; ?></p>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
       <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="glyphicon glyphicon-home"></i> <span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.php"><i class="fa fa-circle-o"></i> Home</a></li>
          </ul>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-dropbox"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="kategori.php"><i class="fa fa-circle-o"></i> Category</a></li>
            <li><a href="satuan.php"><i class="fa fa-circle-o"></i>Unit</a></li>
            <li><a href="suplier.php"><i class="fa fa-circle-o"></i>Supplier</a></i> 
            <li><a href="pelanggan.php"><i class="fa fa-circle-o"></i>Costumer</a></li>
          </a>
        </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-cubes"></i> <span>Master Goods</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="barang.php"><i class="fa fa-circle-o"></i> List Of Items </a></li>
             <li><a href="icomming.php"><i class="fa fa-circle-o"></i>Icoming goods</a></li>
              <li><a href="pamasok.php"><i class="fa fa-circle-o"></i>Pamasok</a></li>
              
        </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../penjualan/transaksi3.php"><i class="fa fa-circle-o"></i>Gooods Transaksi  </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class=" fa fa-file-text-o"></i> <span> PDF Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../laporan/periode_tanggal.php"><i class="fa fa-circle-o"></i>Report PDF Pamasok  </a></li>
            <li><a href="../laporan/laporanbarang.php"><i class="fa fa-circle-o"></i>Report PDF List Of Items</a></li>
            <li><a href="../laporan/laporanstok.php"><i class="fa fa-circle-o"></i>Report PDF Icoming Goods</a></li>
          </ul>
        </li>
         <li class="active">
          <a href="indetitas.php">
            <i class="fa fa-users"></i> <span>Indetity</span>
          </a>
        </li>
         <li class="active">
          <a href="user.php">
            <i class="fa fa-users"></i> <span>User Data</span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>