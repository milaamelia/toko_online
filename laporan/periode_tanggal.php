<?php 
  include"../pages/header.php";
  ?>
<div class="content-wrapper">

  <section class="content-header">
    <h1>
    Ibazaar
      <small>Laporan  Barang Masuk</small>
    </h1>
  </section>
  <script type="text/javascript">
    window.onload = function() { jam(); }
    function jam() {
      var e = document.getElementById('jam'),
        d = new Date(), h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML = h +':'+ m +':'+ s;

        setTimeout('jam()', 1000);
      }

    function set(e) {
     e = e < 10 ? '0'+ e : e;
      return e;
 }
</script>
<div class="row">
  <div class="col-md-3 col-md-offset-9">
<center>
  <h6 style="font-size: 34px; font-family: arial; color:#000;" id="jam"></h6>
</center>
</div>
  </div>

  <section class="content-header">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-masuk"><span class="fa fa-plus" aria-hidden="true"></span>
   Laporan Barang Masuk
    </button>
      <a type="button" href="periode.php" class="btn btn-md btn-primary"><span class=" fa fa-file-pdf-o" aria-hidden="true"></span>
        &nbsp;PDF
      </a>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
            <tr>
              <th>No Faktor</th>
              <th>Tanggal Masuk</th>
              <th>Nama Barang</th>
              <th>Nama Supplier</th>
              <th>Jumlah</th>
              <th>Harga</th>
            </tr>
          </thead>

          <?php
if(isset($_POST['mila'])){

      $awal=$_POST['awl'];
      $akhir=$_POST['ahr'];
      $sql= "SELECT *  FROM tb_barangmasuk s JOIN tb_barang b ON s.kode_barang= b.kode_barang JOIN tb_supplier r ON s.kode_supplier = r.kode_supplier WHERE tgl_masuk BETWEEN '$awal' AND '$akhir' ORDER BY tgl_masuk ASC";
    }
    else{
      $sql= "SELECT * FROM tb_barangmasuk s JOIN tb_barang b ON s.kode_barang= b.kode_barang JOIN tb_supplier r ON s.kode_supplier = r.kode_supplier ORDER BY tgl_masuk";
    }

    $data = $conn->query($sql);

  if ($data->num_rows > 0) {   // jika data benar
    
    while($row = $data->fetch_assoc()){ ?>
        <tr>
          <td><?php echo $row['no_faktur'];?></td>
          <td><?php echo $row['tgl_masuk'];?></td>
          <td><?php echo $row['nama_barang'];?></td>
          <td><?php echo $row['nama_supplier'];?></td>
          <td><?php echo $row['jumlah']; ?></td>
          <td><?php echo $row['harga']; ?></td>
        </tr>

    <?php   }?> <!-- endwhile  --> 

    </table>

  <?php } // endif
    else {
    // jika data salah
    echo "<tr><td colspan='7' align='center'><b>Data Kosong</b></td></tr>";
    } 
?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="modal modal-success fade" id="tambah-masuk">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <img src="../image/paper.png" class="img-circle" alt="User Image" style="margin-right:;">
        <h4 class="modal-title">Laporan Barang Masuk</span></h4>
      </div>
      <form action="" role="form"  method="POST">
      <div class="modal-body">
        <div class="box-body">
          <div class="form-group">
            <label>Tanggal Awal:</label>
            <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
            </div>
            <input type="text" value=""  name="awl" class="form-control pull-right" id="datepicker">
        </div>
          <!-- /.input group -->
       </div>
       <div class="form-group">
            <label>Tanggal Akhir:</label>
            <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
            </div>
            <input type="text" value=""  name="ahr" class="form-control pull-right" id="datepicker">
        </div>
          <!-- /.input group -->
       </div>
       </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="submit" name="mila" class="btn btn-outline">Cari</button>
      </div>
      </form>
    </div>
  <!-- /.modal-content -->
  </div>
  </div>
  <!-- /.modal-dialog -->
<!-- /.modal -->


    <?php 
    include '../pages/footer.php';
    ?>
     <!-- endwhile  --> 


