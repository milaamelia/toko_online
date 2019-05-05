
<?php
	include'../pages/header.php';
	?>
<div class="content-wrapper">

	<section class="content-header">
		<h1>
		Ibazaar
		  <small> Report PDF Pamasok </small>
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
	</a>
		<a type="button" href="../assets/lapbm.php" class="btn btn-md btn-info"><span class="glyphicon glyphicon-PDF" aria-hidden="true"></span>
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
							<tr>
						
							<th>No Faktor</th>
							<th>Tanggal Masuk</th>
							<th>Nama Barang</th>
							<th>Nama Supplier</th>
							<th>Jumlah</th>
							<th>Harga</th>
						</tr>
						</tr>
					</thead>
					<tbody>
						<?php

						include '../config/koneksi.php';

						$tampil = "SELECT  s.no_faktur,s.tgl_masuk, concat(b.kode_barang, ' - ', b.nama_barang) as barang, r.nama_supplier, s.jumlah, s.harga   FROM tb_barangmasuk s JOIN tb_barang b ON s.kode_barang= b.kode_barang JOIN tb_supplier r ON s.kode_supplier = r.kode_supplier";
						$hasil = mysqli_query($conn, $tampil);

							while ($data=mysqli_fetch_assoc($hasil)):
						?>
							<tr>
								
								<td><?php echo $data['no_faktur']; ?></td>
								<td><?php echo $data['tgl_masuk']; ?></td>
								<td><?php echo $data['barang']; ?></td>
								<td><?php echo $data['nama_supplier']; ?></td>
								<td><?php echo $data['jumlah']; ?></td>
								<td><?php echo $data['harga']; ?></td>
							<td>
							</td>
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
</div>
<?php
	include'../pages/footer.php'; 
?>