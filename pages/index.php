<?php 
include "header.php";
date_default_timezone_set("ASIA/JAKARTA");
  if(empty($_SESSION['username'])){
    echo "<script>location=('../index.php');</script>";
  }
  else{
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Ibazaar
      <small>ابازاار</small>
    </h1>
  </section>
  <br>
<section class="content">
        <div class="callout callout-success">
          <h4></h4>
          <center><font size=""><p>Selamat Datang Aku <b><?php echo $username; ?></font></b></p></center>
        </div>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>
             <?php
            include '../config/koneksi.php';
            $query = "select count(*) jumlah_barang from tb_barang ";
            $sql = mysqli_query($conn,$query);
            $tampil = mysqli_fetch_assoc($sql);
            echo $tampil['jumlah_barang']; ?>
            </h3>

            <p>List Items Goods</p>
          </div>
          <div class="icon">
            <i class="fa  fa-cubes"></i>
          </div>
          <a href="" class="small-box-footer">
           List Items Good <i class="fa  fa-cubes"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-4">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>
             <?php
            include '../config/koneksi.php';
            $query = "select count(*) jumlah_stok from tb_stok";
            $sql = mysqli_query($conn,$query);
            $tampil = mysqli_fetch_assoc($sql);
            echo $tampil['jumlah_stok']; ?>
            </h3>

            <p>Stock of Goods</p>
          </div>
          <div class="icon">
            <i class="fa fa-bar-chart-o"></i>
          </div>
          <a href="../mila.js/index.php" class="small-box-footer">
            Stock of Goods <i class="fa   fa-bar-chart-o"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php
            include '../config/koneksi.php';
            $query = "select count(*) jumlah_barang_masuk from tb_barangmasuk ";
            $sql = mysqli_query($conn,$query);
            $tampil = mysqli_fetch_assoc($sql);
            echo $tampil['jumlah_barang_masuk']; ?><sup style="font-size: 20px"></sup></h3>

            <p>Icoming of Goods</p>
          </div>
          <div class="icon">
            <i class=" fa fa-arrow-down"></i>
          </div>
          <a href="../mila.js/diagrammasuk.php"     class="small-box-footer">
            Icomming of Goods<i class="fa fa-arrow-down"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php
            include '../config/koneksi.php';
            $query = "select count(*) jumlah_indetitas from tb_indetitas ";
            $sql = mysqli_query($conn,$query);
            $tampil = mysqli_fetch_assoc($sql);
            echo $tampil['jumlah_indetitas'];?></h3>

            <p>identity
          </div>
          <div class="icon">
            <i class=" fa fa-arrow-up"></i>
          </div>
          <a href="#" class="small-box-footer">
         identity<i class="fa fa-arrow-up"></i>
          </a>
        </div>
      </div>

      <!-- ./col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<?php 
include "footer.php";
}
?>