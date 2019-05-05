<?php
  include '../pages/header.php';
?>
<?php
   include '../config/koneksi.php';
?>
<div class="content-wrapper">

<section class="content-header">
<h1>
Ibazaar
  <small>DATA Goods transaksi</small>
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
<script type="text/javascript">
  function sum() {
    var harga_jual = document.getElementById('harga_jual').value;
    var qty = document.getElementById('jumlah').value;
    var result = parseInt(harga_jual) * parseInt(qty);
    if (!isNaN(result)) {
      document.getElementById('harga_total').value = result;
    };
  }

</script>

<form method="POST" class="form-horizontal" role="form">
<div class="row">
  <div class="col-md-2 col-md-offset-3">
<center>
  <h6 style="font-size: 34px; font-family: arial; color:#000;" id="jam"></h6>
</center>
</div>
  </div>
  <div class="panel panel-default">
  <div class="panel-heading" >
    <h3 class="panel-title">Transaksi</h3>
  </div>
  <div class="panel-body">
    <div class="form-group">
      <div class="col-sm-12">
         <div class="col-sm-2">
            <label for="kategori">Nama Pelanggan </label>
            <select id="kategori" name="pelanggan" class="form-control">
              <?php
              $sql1 =mysqli_query($conn,"SELECT * FROM tb_pelanggan ORDER BY nama_pelanggan ASC");
              while($tampil=mysqli_fetch_array($sql1)){
              ?>
              <option value="<?php echo $tampil['kode_pelanggan']; ?>"><?php echo $tampil['nama_pelanggan']; ?>
              </option> 
              <?php } 
              ?>
              </select>
              </div>
         <div class="col-sm-2">
          <label>Kode Barang</label>
         <select id="kode_barang" name="kode_barang" onchange="changeValue(this.value)"  for="satuan" class="form-control" required>
             <option value=0>-Pilih Kode</option>
              <?php
                  $result = mysqli_query($conn,"select * from tb_barang");   
                  $jsArray = "var dtMhs = new Array();\n";       
                  while ($row = mysqli_fetch_array($result)) {   
                      echo '<option value="' . $row['kode_barang'] . '">' . $row['kode_barang'] . $row['nama_barang'] . '</option>';   
                      $jsArray .= "dtMhs['" . $row['kode_barang'] . "'] = {nama_barang:'" . addslashes($row['nama_barang']) . "',harga_jual:'".addslashes($row['harga_jual'])."'};\n";   
                  }     
              ?>   
            </select>
        </div>
        <div class="col-sm-3">
          <label>Nama Barang</label>
          <input type="text" name="nama_barang" id="nama_barang" class="form-control" readonly="true" placeholder="nama_barang">
        </div>
           <div class="col-sm-2">
          <label>Harga Jual</label>
          <input type="text" name="harga_jual" id="harga_jual" class="form-control" readonly="true" placeholder="Harga" onKeypress="if(event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" >
        </div>
        <div class="col-sm-1">
          <label>Quantity</label>
          <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Qty" onKeypress="if(event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" autocomplete="off">
        </div>
        <div class="col-sm-2"><br/>
         <td>
         <button type='button'  name="add" title="add" class="btn btn-info">
          <i class='fa fa-cart-arrow-down'></i>Add</button>
         </td>
        </div>
      </div>
    </div> 
  <hr/>
  </div>
</div>
</form>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Print</h3>
  </div>
  <div class="panel-body">         
<div class="box-body">
  <table id="example1 " class="table table-bordered table-striped keranjang">
    <thead>
      <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga Jual</th>
        <th>Qty</th>
        <th>Total Harga</th>
        <th>Aksi</th>
    </thead>
    <tbody>
    </tbody>
  </table>  
  <div class="form-horizontal" role="form"> 
    <div class="form-group">
    </div>
  <div class="form-group">
      <div class="col-sm-12">
       </div>
        </div>
  <div class="col-sm-3"></div>
      <tr>
     <td></td>
     <td colspan=""><input type="submit" name="simpan" value="Transaksi" class="btn btn-success" > 
   </tr>
        </div>
      </div>
   </div>
 </div>
</tr>

<script type="text/javascript">   
    <?php echo $jsArray; ?> 
    function changeValue(kode_barang){ 
    document.getElementById('nama_barang').value = dtMhs[kode_barang].nama_barang; 
    document.getElementById('harga_jual').value = dtMhs[kode_barang].harga_jual; 
    }; 
    </script>


</div>
</form>
  <?php 
    include'../pages/footer.php';
  ?>
  <script type="text/javascript">
  $("button[name='add']").click(function(){
          var code = $("#kode_barang").val();
          var nama = $("#nama_barang").val();
          var harga_jual = parseFloat($("#harga_jual").val());
          var jumlah = parseFloat ($("#jumlah").val());
          var total = harga_jual * jumlah;

          //document.getElementById('total').value = total;
          tr = "<tr>";
          tr += "<td>"+code+"</td>"; 
          tr += "<td>"+nama+"</td>"; 
          tr += "<td>"+harga_jual+"</td>"; 
          tr += "<td>"+jumlah+"</td></br>";
          tr += "<td>"+total+"</td>";
            tr += "<td><button type='button' onClick='remove()' id='remove' class='btn btn-danger'><i class='fa fa-remove'></i></button></td>"; 
          tr += "</tr>"; 

          $(".keranjang tbody").append(tr);
    });

    function remove(btn)
    {
      $(btn).parent().remove(); 
    }

  </script>
