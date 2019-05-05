<?php 
	include"../pages/header.php"
?>

<div class="content-wrapper">

	<section class="content-header">
		<h1>
		Ibazaar
		  <small>Transaksi</small>
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
<div class="box-body">
<div class="form-group">
<div class="box box-danger">
	<div class="box-header with-border">
		<h3 class="box-title">Transaksi Barang</h3>
		</div>
			<div class="box-body">
				<div class="row">
					<div class="col-xs-2">
					<label>Kode Barang</label>
						<input type="text"  name="" class="form-control" placeholder="kode Barang">
					</div>
					<div class="col-xs-2">
					<label>Nama Barang </label>
						<input type="text"  name= "naba" class="form-control" placeholder="Nama Barang">
					</div>
					<div class="col-xs-2">
					<label>Stok</label>
						<input type="text" name="stok" class="form-control" placeholder="Stok">
					</div>
					<div class="col-xs-2">
					<label>Harga</label>
						<input type="text"  name="harga" class="form-control" placeholder="Harga">
					</div>
					<div class="col-xs-2">
					<label>jumlah</label>
						<input type="text" name="jumlah" class="form-control" placeholder="jumlah">
					</div>
				</div>
		</div>
	<!-- /.box-body -->
	</div>
<!-- /.box -->

</div>
</div>
</div>



<?php
	include"../pages/footer.php"
?>