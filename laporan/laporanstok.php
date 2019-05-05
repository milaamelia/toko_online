<?php 
	include"../pages/header.php";
	?>
		<div class="content-wrapper">

<section class="content-header">
<h1>
Ibazaar
  <small>Report PDF Icoming Goods</small>
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
<a type="button" href="../assets/lapstok.php" class="btn btn-md btn-info"><span class="glyphicon glyphicon-PDF" aria-hidden="true"></span>
		&nbsp; Print PDF
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
						<th>NO</th>
						<th>Nama Barang</th>
						<th>Nama kategori</th>
						<th>Nama Supplier</th>
						<th>stok</th>
					</tr>
				</thead>
				<tbody>
					<?php

					include '../config/koneksi.php';

					$tampil = "SELECT s.id_stok, concat(b.kode_barang, ' - ', b.nama_barang) as barang, t.nama_kategori, r.nama_supplier, s.stok 
								FROM tb_stok s 
								JOIN tb_barang b ON s.kode_barang = b.kode_barang 
								JOIN tb_kategori t ON s.id_kategori = t.id_kategori 
								JOIN tb_supplier r ON s.kode_supplier = r.kode_supplier";

					$hasil = mysqli_query($conn, $tampil);
						$no =1;
					while ($data=mysqli_fetch_assoc($hasil)):
					?>
						<tr>
							<td><?= $no ?></td>
							<td><?php echo $data['barang']; ?></td>
							<td><?php echo $data['nama_kategori']; ?></td>
							<td><?php echo $data['nama_supplier']; ?></td>
							<td><?php if ($data['stok'] == 0) { echo "0"; } else { echo $data['stok']; } ?></td>
							<td>
							
								<?php $no++; ?>
							</td>
							      </form>
							    </div>
							    <!-- /.modal-content -->
							  </div>
							  <!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
						</div>
					<?php endwhile; ?>
				</tbody>
		      </table>
		    </div>
	    </div>
	  </div>
	</div>
	</div>
</section>
<?php
include"../pages/footer.php";
?>