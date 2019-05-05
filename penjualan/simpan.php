<?php 

include("../config/koneksi.php");


$code = $_GET['jual_id'];
$pel = $conn->query("SELECT * FROM tb_jual a JOIN tb_pelanggan b USING(kode_pelanggan) WHERE jual_id=$code")->fetch_assoc();
?>

<link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/pace/pace-theme-big-counter.css" rel="stylesheet" />
  <link href="../assets/css/style.css" rel="stylesheet" />
      <link href=../"assets/css/main-style.css" rel="stylesheet" />

<h1 align="center">IBAZAAR</h1>
  <h5 align="center">Alamat: Jl. Cinere Raya 102G, 3rd Floor, Cinere, Depok, Jawa Barat<h5>
    <h5 align="center">Telphone: +6281915307325 Email: ibazaar.id@gmail.com</h5>


<BR>
<BR>
<h4>No Transaksi:<?=$pel['jual_id']?></h4>
<h4>Tanggal:<?=$pel['tgl_jual']?></h4>
<h4>Pelanggan:<?=$pel['nama_pelanggan']?></h4>
<script type="text/javascript">window.print()</script>
<BR>
<BR>

 <table id= "table" class="table table-striped table-hover" style="margin:buttom:100px">
 <thead>
  <tr width="100px">
    <th>No Transaksi</th>
     <th>Nama Pelanggan</th>
    <th>Kode barang</th>
    <th>Nama Barang</th>
    <th>Harga Jual</th>
    <th>Qty</th>
    <th>Harga Total</th>
   
    
    </tr>
    </thead>
    <tbody>
<?php
    
$pl = mysqli_query($conn,"select * From tb_detail_jual j JOIN tb_barang b ON j.kode_barang=b.kode_barang JOIN tb_jual a on j.jual_id= a.jual_id JOIN tb_pelanggan g ON g.kode_pelanggan = a.kode_pelanggan
where a.jual_id ='$code'");
    while ($data = mysqli_fetch_array($pl)) {
    //$has = number_format($data['qty']);
    //$har = number_format($data['harga_total']); ?>
    <tr>
      <td><?=$data['jual_id']?></td>
        <td><?=$data['nama_pelanggan']?></td>
      <td><?=$data['kode_barang']?></td>
      <td><?=$data['nama_barang']?></td>
      <td><?=$data['harga_jual']?></td>
      <td><?=$data['qty']?></td>
        <td><?=$data['total']?></td>

      </tr>
<?php 
    }
    ?>
      </td>
   </tr>
    </tbody>
  
    </table>
 