<?php
	include'../pages/header.php';
?>
<div class="content-wrapper">

<section class="content-header">
<h1>
Ibazaar
  <small>Report PDF List Of Items</small>
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
	
							<a type="button" href="../assets/lap.php" class="btn btn-md btn-info"><span class="glyphicon glyphicon-PDF" aria-hidden="true"></span>
						&nbsp;Print PDF
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
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>kategori</th>
							<th>Berat</th>
							<th>Nama Satuan</th>
							<th>Nama Supplier</th>
							<th>Harga Satuan</th>
							<th>Harga Jual</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include '../config/koneksi.php';
						$no=0;
						$tampil = "SELECT * 
						 FROM tb_barang b JOIN tb_kategori k ON b.id_kategori = k.id_kategori JOIN tb_satuan_barang s ON b.Id = s.Id 
						 JOIN tb_supplier r ON b.kode_supplier = r.kode_supplier ";
						$hasil = mysqli_query($conn, $tampil);
						while ($data=mysqli_fetch_assoc($hasil)):
							$no++;
						?>
							<tr>
								<td><?php echo $data['kode_barang']; ?></td>
								<td><?php echo $data['nama_barang']; ?></td>
								<td><?php echo $data['nama_kategori']; ?></td>
								<td><?php echo $data['berat']; ?></td>
								<td><?php echo $data['nama_satuan']; ?></td>
								<td><?php echo $data['nama_supplier']; ?></td>
								<td><?php echo $data['harga_satuan']; ?></td>
								<td><?php echo $data['harga_jual']; ?></td>
								<td>
								</td>
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