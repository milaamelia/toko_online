<?php
  include"header.php";
?>
    <div class="content-wrapper">

<section class="content-header">
<h1>
Ibazaar
  <small>Transaksi Barang</small>
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
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-transaksi"><span class=" fa fa-plus" aria-hidden="true"></span>
  Tambah Transaksi Barang
  </button>
    </a>
    <a type="button" href="../assets/excelkeluar.php" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>
      &nbsp;Export to Excel
    </a>
    </a>
    <a type="button" href="../assets/lapkeluar.php" class="btn btn-md btn-primary"><span class=" fa fa-file-pdf-o" aria-hidden="true"></span>
      &nbsp;PDF
    </a>
</section>

<?php 
  $carikode = mysqli_query($conn, "select max(jual_id) from tb_jual") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
  $nilaikode = substr($datakode[0], 1);
  // menjadikan $nilaikode ( int )
  $kode = (int) $nilaikode;
  // setiap $kode di tambah 1
  $kode = $kode + 1;
  $kode_otomatis = "B".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
  $kode_otomatis = "B0001";
  }
?>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
          <tr>
            <th>No Faktur</th>
            <th>Tanggal Transaksi</th>
            <th>Nama Pelanggan</th>
            <th>Total</th>
            <th>Nama Barang</th>
            <th>Harga Jual</th>
            <th>QTY</th>
            <th>Harga Total</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../config/koneksi.php';
          $tampil = "SELECT  d.jual_id, n.kode_pelanggan, n.nama_pelanggan, j.total, b.kode_barang, b.nama_barang, d.harga_jual, d.qty, d.harga_total, j.tgl_jual
                    FROM tb_detail_jual d
                    INNER JOIN tb_barang b ON b.kode_barang = d.kode_barang
                    INNER JOIN tb_jual j ON j.jual_id = d.jual_id 
                    INNER JOIN tb_pelanggan n ON j.kode_pelanggan= n.kode_pelanggan";
          $hasil = mysqli_query($conn, $tampil);
          // $hasil1 = mysqli_query($conn, $tampil1);
          while ($data=mysqli_fetch_assoc($hasil)):
          // while ($data1=mysqli_fetch_assoc($hasil1)):
          ?>  
            
              <tr>
              <td><?php echo $data['jual_id']; ?></td>
              <td><?php echo $data['tgl_jual']; ?></td>
              <td><?php echo $data['nama_pelanggan']; ?></td>
              <td><?php echo $data['total']; ?></td>
              <td><?php echo $data['nama_barang'];?></td>
              <td><?php echo $data['harga_jual'];?></td>
              <td><?php echo $data['qty'];?></td>
              <td><?php echo $data['harga_total'];?></td> 
              <td>

                <button type="button" title="Edit Transaksi" class="btn btn-info disabled" data-toggle="modal" data-target="#edit_transaksi<?php echo $data['jual_id']; ?>">
                    <i class='glyphicon glyphicon-edit'disabled> Edit</i>
                </button>
                <a href="proses.php?hapus_transaksi=<?php echo $data['jual_id']; ?>" name="hapus_transaksi" title="Hapus" class="btn btn-danger" onclick="return confirm('Anda yakin?');">
                    <i class='glyphicon glyphicon-trash'> Hapus</i>
                </a>
              </td>

              <!--modal edit data-->
              <div class="modal modal-info fade" id="edit_transaksi<?php echo $data['jual_id']; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                           <img src="../image/m.png" class="img-circle" alt="User Image" style="margin-right:;">
                          <h4 class="modal-title">Edit transaksi Barang</h4>
                        <form action="" role="form"  method="POST">
                        <div class="modal-body">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="no">No Faktur</label>
                            <input type="text" name="edit-No" class="form-control" id="kd" value="<?php echo $data['jual_id']; ?>" readonly>
                              </div>
                              <div class="form-group">
                              <label>Tanggal Jual:</label>
                              <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                           <input type="text" value="<?php echo $data['tgl_jual']; ?>"  name="edit-tanggal_jual" class="form-control pull-right" id="datepicker">
                  
                     </div>
                     </div>
                        <div class="form-group">
                      <label for="kategori">Nama Pelanggan </label>
                      <select id="kategori" name="edit-pelanggan" class="form-control">
                        <?php
                        $sql1 =mysqli_query($conn,"SELECT * FROM tb_pelanggan  ORDER BY nama_pelanggan   ASC");
                        while($tampil=mysqli_fetch_array($sql1)){
                        ?>
                        <option value="<?php echo $tampil['kode_pelanggan']; ?>"><?php echo $tampil['nama_pelanggan']; ?>
                        </option> 
                        <?php } 
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                            <label for="total">Total</label>
                            <input type="number" name="edit-total" class="form-control" id="nb" value="<?php echo $data['total']; ?>" placeholder="Harga Total" required>
                    </div>
                    <div class="form-group">
                            <label for="nb">Harga Kirim</label>
                            <input type="text" name="edit-harga" class="form-control" id="nb" value="<?php echo $data['harga_kirim']; ?>" placeholder="Harga Kirim" required>
                      </div>
                      <div class="form-group">
                      <label for="kategori">Nama Barang </label>
                      <select id="kategori" name="edit-barang" class="form-control">
                        <?php
                        $sql1 =mysqli_query($conn,"SELECT * FROM tb_barang  ORDER BY nama_barang   ASC");
                        while($tampil=mysqli_fetch_array($sql1)){
                        ?>
                        <option value="<?php echo $tampil['kode_barang']; ?>"><?php echo $tampil['nama_barang']; ?>
                        </option> 
                        <?php } 
                        ?>
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="nb">QTY</label>
                            <input type="text" name="edit-qty" class="form-control" id="nb" value="<?php echo $data['qty']; ?>" placeholder="Harga Kirim" required>
                      </div>
                        <div class="form-group">
                            <label for="nb">Harga Total</label>
                            <input type="text" name="edit-total" class="form-control" id="nb" value="<?php echo $data['harga_total']; ?>" placeholder="Harga Kirim" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" name="edit_transaksi" class="btn btn-outline">Simpan</button>
                    </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

            </tr>
          <?php endwhile; ?>
     </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal modal-success fade" id="tambah-transaksi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <img src="../image/m.png" class="img-circle" alt="User Image" style="margin-right:;">
        <h4 class="modal-title">Tambah Transaksi Barang</span></h4>
      </div>
   <form action="" role="form"  method="POST">
      <div class="modal-body">
        <div class="box-body">
          <div class="form-group">
            <label for="kd">No Faktur</label>
            <input type="text" name="kode" class="form-control" id="kode" value="<?php echo $kode_otomatis; ?>" >
          </div>
          <div class="form-group">
            <label>Tanggal Transaksi:</label>
            <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
            </div>
            <input type="text"  value="<?php echo $data['tgl_jual']; ?>" name="tanggal_jual" class="form-control pull-right" id="datepicker">
          </div>
          <!-- /.input group -->
          </div>
                <div class="form-group">
                      <label for="pelanggan">Nama Pelanggan </label>
                    <select id="pelanggan" name="pelanggan" class="form-control">
                    <option value="">---Pilih Nama Pelanggan---</option>
                        <?php
                        $sql1 =mysqli_query($conn,"SELECT kode_pelanggan, nama_pelanggan FROM tb_pelanggan  ORDER BY nama_pelanggan ASC");
                        while($tampil=mysqli_fetch_array($sql1)){
                        ?>
                        <option value="<?php echo $tampil['kode_pelanggan']; ?>"><?php echo $tampil['nama_pelanggan']; ?>
                        </option> 
                        <?php } 
                        ?>s
                        </select>
                    </div>
            <div class="input-group">
              <label for="total">Total</label>
              <input type="number" name="total" class="form-control" id="total1" placeholder="Total" required>
              </div>
              </div>
                   <div class="form-group">
                      <label for="pelanggan">Nama Barang </label>
                    <select id="pelanggan" name="barang" class="form-control">
                    <option value="">---Pilih Nama Barang---</option>
                        <?php
                        $sql1 =mysqli_query($conn,"SELECT kode_barang, nama_barang FROM tb_barang  ORDER BY nama_barang ASC");
                        while($tampil=mysqli_fetch_array($sql1)){
                        ?>
                        <option value="<?php echo $tampil['kode_barang']; ?>"><?php echo $tampil['nama_barang']; ?>
                        </option> 
                        <?php } 
                        ?>
                </select>
            </div>
              <div class="form-group">
              <label for="nb">Harga jual</label>
              <input type="number" name="jual" class="form-control" id="jual"  placeholder="harga Jual" onkeyup="sum();" />
            </div>
              <div class="form-group">
              <label for="nb">QTY</label>
              <input type="number" name="qty" class="form-control" id="qty"  placeholder="QTY"  onkeyup="sum();" />
            </div>
              <div class="form-group">
              <label for="nb">Harga Total</label>
              <input type="number" name="hartol" class="form-control" id="hartol"  placeholder="Harga Total" placeholder="QTY"  onkeyup="sum();" />
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan_transaksi" class="btn btn-outline">Simpan</button>
      </div>
      </form>
      <script>
function sum() {
      var txtFirstNumberValue = document.getElementById('jual').value;
      var txtSecondNumberValue = document.getElementById('qty').value;
       var txtSecondNumberValue = document.getElementById('qty').value;

      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('hartol').value = result;
      }
}
</script>
      
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>
<!-- /.moda---->
<?php
include '../config/koneksi.php';
if(isset($_POST['simpan_transaksi'])) {
  $kode         =$_POST['kode'];
  $tanggal      =$_POST['tanggal_jual'];
  $pelanggan    =$_POST['pelanggan'];
  $total        =$_POST['total'];
  $barang       =$_POST['barang'];
  $jual         =$_POST['jual'];
  $qty          =$_POST['qty'];
  $hartol       =$_POST['hartol'];
  $query =  "INSERT INTO tb_jual VALUES ('$kode','$tanggal','$pelanggan','$total')";
  $q=mysqli_query($conn,$query) or die($query);
  $query1 =  "INSERT INTO tb_detail_jual VALUES ('$kode','$barang','$jual','$qty','$hartol')";
  $q1=mysqli_query($conn,$query1) or die($query1);
  $sql2=mysqli_query($conn, "Select * from tb_stok where kode_barang = ('$barang')");
  $rc=mysqli_num_rows($sql2);

  if($rc==1)
  {
    $sql3=mysqli_query($conn, "UPDATE tb_stok SET stok  = stok - $qty WHERE kode_barang = ('$barang')");
    $sql4 = mysqli_query($conn,"INSERT INTO tb_detail_jual VALUES ('$kode','$barang','$jual','$qty','$hartol')");
    if($sql3)
    {
      echo "<script>alert(' Stok Berkurang berkurang ');location=('stok.php');</script>";
    }

  }else{
     $sq4=mysqli_query($conn, "INSERT into tb_detail_jual  VALUES ('$kode','$barang','$jual','$qty','$hartol')");
    if($sq4)
    {
      echo "<script>alert('Tambah Data berhasil');location=('stok.php');</script>";
    }
  }
}
?>

<?php
  include "footer.php";
?>