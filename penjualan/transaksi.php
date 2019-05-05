  <?php ob_start(); ?>
<?php
include('../config/koneksi.php');

	include "../pages/header.php";


 if(isset($_POST['add'])){
    $id = $_POST['jual_id'];
    $harga = $_POST['harga_satuan'];
    $qty = $_POST['qty'];
    $total = $harga * $qty;
    $kode = $_POST['nama_barang'];
      $query=mysqli_query($conn,"insert into tb_detail_jual(jual_id, kode_barang, harga_jual, qty, harga_total)
       values('$id','$kode','$harga','$qty')");
      
      if($query){
        { 
         }
        }
        else
        {?><script language="javascript">
      alert("Gagal Menginput");
      </script><?php }

    
    }
   elseif (isset($_POST['simpan'])) {
     # code...
$code = $_POST['co'];
$id= $jsa;
$byr = $_POST['total'];
$hrg = $_POST['ttl'];
$tgl = date("y-m-d"); 

$kue = mysqli_query($conn,"insert into tb_jual(jual_id,tgl_jual, kode_pelanggan, total, )
    values('$code','$id','$byr','$hrg','$tgl')");
if($kue)
{
  header('location:simpan.php?id='.$code);
}
else
{ ?>
  <script> window.location = "../penjualan/"</script>
<?php
}

   }
    ?>
    <!DOCTYPE html>
<html>

<head>
<script language="JavaScript">
function formatangka(objek) {
   a = objek.value;
   b = a.replace(/[^\d]/g,"");
   c = "";
   panjang = b.length;
   j = 0;
   for (i = panjang; i > 0; i--) {
     j = j + 1;
     if (((j % 3) == 1) && (j != 1)) {
       c = b.substr(i-1,1) + "." + c;
     } else {
       c = b.substr(i-1,1) + c;
     }
   }
   objek.value = c;
}
</script>

<?php
$query = "SELECT kode_barang, nama_barang FROM tb_barang ORDER BY kode_barang";
$sql = mysqli_query($conn, $query);
$arr = array();
while ($row = mysqli_fetch_assoc($sql)) {
	$arrpropinsi [ $row['kode_barang'] ] = $row['nama_barang'];
}
?>

<script src="../assets/js/jquery.min.js"></script>
		<script src="libs/jquery.multiple.select.js"></script>
		<link rel="stylesheet" href="libs/multiple-select.css"/>
		<script>
			$(document).ready(function(){
				$('#index.php').multipleSelect({
					placeholder: "Pilih kode",
					filter:true
				});
			});
		</script>
<div class="content-wrapper">
</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        
        <!-- end navbar top -->

        <!-- navbar side -->
      
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper" class="col-md-12" style="margin:16px">
			<div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
					
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          TRANSAKSI
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <!-- form-group -->
                           <form class="form-horizontal" action="" method="POST" name="form1">
								<div class="form-group">
                        <label class="control-label col-lg-4">No Transaksi</label>
							<div class="col-lg-8">
						<?php
									
						include "../config/koneksi.php";
						/*-------------------------------*/
						$sql=mysqli_query($conn,"select * from tb_jual order by jual_id DESC ");
						$data=mysqli_fetch_array($sql);
						$kodeawal=substr($data['jual_id'],	9,4)+1;
						if($kodeawal<10){
						$kode='TRANSAKSI000'.$kodeawal;
						}elseif($kodeawal > 9 && $kodeawal <=99){
						$kode='TRANSAKSI00'.$kodeawal;
									}else{
									$kode='TRANSAKSI0'.$kodeawal;
									}
									?>	
                        <input type="text" readonly="" id="text1" maxlength="16" class="form-control" value="<?php echo $kode; ?>" name="kode">
                    </div>
                    </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Kode Barang</label>

                    <div class="col-lg-8">
                  <select class="form-control chzn-select" id="a" name="kode_barang" >
					<option disabled="" readonly selected=""></option>
						<?php
							foreach($arr as $kode_barang=>$nama_barang) {
								echo "<option value='$nama_barang'>$nama_barang</option>";
							}
						?>
						<?php 
							$a = mysqli_query($conn, "select * from tb_barang order by kode_barang asc");
							while($b = mysqli_fetch_array($a))
							{
								echo"<option value=$b[kode_barang]>$b[kode_barang]</option>";
							}
						?>
            </select>
            </div>
                    </div>
					
					 <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Nama Barang</label>

                    <div class="col-lg-8">
                  </select>
                  <select class="form-control chzn-select" id="h"  name="nama_barang" required="" onkeyup="test1()" readonly>
            
            </select>
                    </div>
                    </div>
            
                    <div class="form-group">
                        <label class="control-label col-lg-4">Harga Satuan</label>

                        <div class="col-lg-8">
                        <select class="form-control chzn-select"  id="b" name="harga_satuan" onkeyup="test1()" readonly>
            <option value="" readonly disabled selected="selected"></option>
           
                  </select>
                    </div>
                    </div>
                   <div class="form-group">
                        <label class="control-label col-lg-4">Jumlah Pembelian Barang</label>

                        <div class="col-lg-8">
                        <input type="number"  onkeyup="test1()" required="" placeholder="juamalh Barang" maxlength="12" class="form-control" name="qty">
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Nama Supplier</label>
                    <div class="col-lg-8">
                        <input type="number"  onkeyup="test1()" required="" placeholder="Jumlah buku" maxlength="12" class="form-control" name="qty">
                    </div>
                    </div>
          
					
					   <div class="form-group">
                        <label class="control-label col-lg-4"></label>

                        <div class="col-lg-8">
                        <button type="submit" class="btn btn-success" value="Tambah" name="add">Simpan</button>
					  <button type="submit" class="btn btn-danger" >Batal</button>
                    </div>
                    </div>
  
                             <!-- /.form-group -->
            </form>
                            </div>
                        </div>
                    </div>
          
            <div class="row" class="style:margin:20px">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Cetak
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <!---  Tabel Responsive  -->
                                <form name="form-cart" action="" method="POST">
    <table class="table table-striped table-hover">
    <tr>
    <td>Kode Barang</td>
    <td>Nama Barang</td>
    <td>Harga Satuan</td>
    <td>Qty</td>
    <td>Total</td>
    <td></td>
    </tr>
     <?php
    $pl = mysqli_query($conn,"select * FROM tb_barang b JOIN tb_detail_jual j ON j.kode_barang= b.kode_barang  ");
    while ($gas = mysqli_fetch_array($pl)) {
    $her = number_format($gas['harga_satuan']);
    $has = number_format($gas['qty']);
    $har = number_format($gas['harga_total']);
      echo "<tr>
      <td>$gas[kode_barang]</td>
      <td>$gas[nama_barang]</td>
      <td>$her</td>
      <td>$has</td>
      <td>$har</td>
      <td></td>
      </tr>";
    }
    ?>
    <form name="bayar"  method="POST" >
   <tr><input type="hidden" name="co" value="<?php echo "$kode"; ?>">
     <td colspan="4" ></td>
     <td>Harga Total :</td>
     <td  colspan=""> <?php $just = mysqli_fetch_assoc(mysqli_query($conn,"select sum(qty) as subtotal from tb_detail_jual where jual_id"));
     $gust = implode(".", $just); ?>
     <input type="text" name="qty" class="form-control" id="b" onkeyup="test1()" value="<?php echo $gust; ?>" readonly> </td>
      <td></td>
   </tr>
      <tr>
     <td colspan="4" ></td>
     <td></td>
     <td colspan=""><input type="submit" name="simpan" value="Transaksi" class="btn btn-success" > 
      <?php echo"<a onclick=\" return confirm('Batal Transaksi??')\" href='cancel.php?id=$kode'><button type=buttons class='btn btn-danger'>Batal</button></a> ";?></td>
       <td></td>
   </tr>
    </form>
    </table>                    <!---  Akhir Tabel Responsive  -->
        </div>
      </div>
    </div>
<!--End Advanced Tables -->
</div>
</div>
  </div>
  </div>
</div>
</div>
<script type="text/javascript">
$(function(){
   $('#a').change(function(){
      $('#b').after('<span class="loading">Tunggu..</span>');
    $('#b').load('cari.php?jk=' + $(this).val(),function(responseTxt,statusTxt,xhr)
    {
      if(statusTxt=="success")
      $('.loading').remove();
    
    });
    return false;
   });

});

</script>
<script type="text/javascript">
$(function(){
   $('#a').change(function(){
      $('#c').after('<span class="loading">Tunggu..</span>');
    $('#c').load('caria.php?jk=' + $(this).val(),function(responseTxt,statusTxt,xhr)
    {
      if(statusTxt=="success")
      $('.loading').remove();
    
    });
    return false;
   });

});

</script>
<script type="text/javascript">
$(function(){
   $('#a').change(function(){
      $('#f').after('<span class="loading">Tunggu..</span>');
    $('#f').load('caric.php?jk=' + $(this).val(),function(responseTxt,statusTxt,xhr)
    {
      if(statusTxt=="success")
      $('.loading').remove();
    
    });
    return false;
   });

});

</script>
<script type="text/javascript">
$(function(){
   $('#a').change(function(){
      $('#h').after('<span class="loading">Tunggu..</span>');
    $('#h').load('carid.php?jk=' + $(this).val(),function(responseTxt,statusTxt,xhr)
    {
      if(statusTxt=="success")
      $('.loading').remove();
    
    });
    return false;
   });

});

</script>
<script type="text/javascript">
$(function(){
   $('#a').change(function(){
      $('#d').after('<span class="loading">Tunggu..</span>');
    $('#d').load('carib.php?jk=' + $(this).val(),function(responseTxt,statusTxt,xhr)
    {
      if(statusTxt=="success")
      $('.loading').remove();
    
    });
    return false;
   });

});

</script>
<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('y').value;
      var txtSecondNumberValue = document.getElementById('q').value;
      
      var result = (parseInt(txtFirstNumberValue)*parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('u').value = result;
      }
}
</script>
<script>
function sum21() {
      var txtFirstNumberValue = document.getElementById('byr').value;
      var txtSecondNumberValue = document.getElementById('ttl').value;
      
      var result = (parseInt(txtFirstNumberValue)-parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('kmb').value = result;
      }
}
</script>
<script type="text/javascript">
        $(function(){
            $("#a").autocomplete({
                source:"auto1.php",
                minLength:2,
                select:function(event,data){
                    $('input[name=namaorga]').val(data.item.namaorga);
                    $('input[name=nama]').val(data.item.nama);
                    $('input[name=alamat]').val(data.item.alamat);
                }
            });
        });
    </script>
    <script language="javascript">function test1(){//hitung total kolom
    document.bayar.q.value=parseInt(document.bayar.x.value)-parseInt(document.bayar.b.value);
    document.form1.m.value=parseInt(document.form1.b.value)*parseInt(document.form1.x.value);
    document.bayar.kmb.value=parseInt(document.bayar.byr.value)-parseInt(document.bayar.ttl.value);}
    function test2(){//hitung total kolom
    document.form1.jumlah2.value=parseInt(document.form1.t_bayar.value);//hitung total semua
    document.form1.jmljumlah.value=parseInt(document.form1.jumlah1.value)-parseInt(document.form1.jumlah2.value)}

</script>

    <!-- Inputan Angka -->
<script language="javascript">
    function hanyaAngka(e, decimal) {
    var key;
    var keychar;
     if (window.event) {
         key = window.event.keyCode;
     } else
     if (e) {
         key = e.which;
     } else return true;
   
    keychar = String.fromCharCode(key);
    if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
        return true;
    } else
    if ((("0123456789").indexOf(keychar) > -1)) {
        return true;
    } else
    if (decimal && (keychar == ".")) {
        return true;
    } else return false;
    }
</script>
<!-- Akhir Inputan Angka -->
</body>
</div>
</html>

<?php ob_flush(); ?>
<?php 
include "../pages/footer.php";