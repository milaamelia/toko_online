<?php 
	include"header.php";
	?>
<div class="content-wrapper">

<section class="content-header">	
<h1>
Ibazaar
  <small>Goods Data</small>
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
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-barang"><span class=" fa fa-plus" aria-hidden="true"></span>
	Add Goods Data
	</button>
				</a>
							<a type="button" href="../assets/excelbarang.php" class="btn btn-md btn-info"><span class="glyphicon glyphicon-PDF" aria-hidden="true"></span>
						&nbsp;Excel
					</a>

		</section>

<?php 
	$carikode = mysqli_query($conn, "select max(kode_barang) from tb_barang") or die (mysql_error());
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
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>kategori</th>
						<th>Berat</th>
						<th>Nama Satuan</th>
						<th>Nama Supplier</th>
						<th>Harga Satuan</th>
						<th>Harga Jual</th>
						<th>Aksi</th>
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

								<button type="button" title="Edit Barang" class="btn btn-info" data-toggle="modal" data-target="#edit_barang<?php echo $data['kode_barang']; ?>">
					  				<i class='glyphicon glyphicon-edit'></i>Update
								</button>
								<a href="proses.php?hapus=<?php echo $data['kode_barang']; ?>" name="hapus" title="Hapus" class="btn btn-danger" onclick="return confirm('Are you sure?');">
					  				<i class='glyphicon glyphicon-trash'></i>Delete

							</td>
						</tr>
							<!--modal edit data-->
							<div class="modal modal-info fade" id="edit_barang<?php echo $data['kode_barang']; ?>">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span></button>
							             <img src="../image/m.png" class="img-circle" alt="User Image" style="margin-right:;">
							       	<h4 class="modal-title">Edit Barang</h4>
							       </div>
							      <form action="proses.php" role="form"  method="POST">
							      <div class="modal-body">
							          <div class="box-body">
							            <div class="form-group">
							              <label for="kd">Kode Barang</label>
							              <input type="text" name="edit-kode" class="form-control" id="kd" value="<?php echo $data['kode_barang']; ?>" readonly>
							            </div>
							            <div class="form-group">
							              <label for="nb">Nama Barang</label>
							              <input type="text" name="edit-nama" class="form-control" id="nb" value="<?php echo $data['nama_barang']; ?>" placeholder="Nama Barang" required>
							            </div>
							            <div class="form-group">
											<label for="kategori">Nama kategori </label>
											<select id="kategori" name="edit-kategori" class="form-control">
												<?php
												$sql1 =mysqli_query($conn,"SELECT * FROM tb_kategori ORDER BY nama_kategori ASC");
												while($tampil=mysqli_fetch_array($sql1)){
												?>
												<option value="<?php echo $tampil['id_kategori']; ?>"><?php echo $tampil['nama_kategori']; ?>
												</option>	
												<?php } 
												?>
	                    					</select>
										</div>
							            <div class="input-group">
							              <label for="Berat">Berat</label>
							              <input type="number" name="edit-berat" class="form-control" id="Berat" value="<?php echo $data['berat']; ?>" placeholder="Berat" required>
							            </div>
							            <div class="form-group">
											<label for="kategori">Nama Satuan </label>
											<select id="kategori" name="edit-satuan" class="form-control">
												<?php
												$sql2 =mysqli_query($conn,"SELECT * FROM tb_satuan_barang ORDER BY nama_satuan ASC");
												while($tampil=mysqli_fetch_array($sql2)){
												?>
												<option value="<?php echo $tampil['Id']; ?>"><?php echo $tampil['nama_satuan']; ?>
												</option>	
												<?php } 
												?>
	                    					</select>
										</div>
										<div class="form-group">
											<label for="kategori">Nama Supplier</label>
											<select id="kategori" name="edit-supplier" class="form-control">
												<?php
												$sql3 =mysqli_query($conn,"SELECT * FROM tb_supplier ORDER BY nama_supplier ASC");
												while($tampil=mysqli_fetch_array($sql3)){
												?>
												<option value="<?php echo $tampil['kode_supplier']; ?>"><?php echo $tampil['nama_supplier']; ?>
												</option>	
												<?php } 
												?>
	                    					</select>
										</div>
										
										<div class="form-group">
							              <label for="nb" >Harga</label>
							              <input type="text" name="edit-harga" class="form-control disabled" id="nb" value="<?php echo $data['harga_satuan']; ?>" placeholder="Harga Satuan" required>
							            </div>
							            <div class="form-group">
							              <label for="nb" >Harga Jual</label>
							              <input type="text" name="edit-jual" class="form-control disabled" id="nb" value="<?php echo $data['harga_jual']; ?>" placeholder="Harga Satuan" required>
							            </div>
									</div>
							      </div>
							      <div class="modal-footer">
							        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
							        <button type="submit" name="edit_barang" class="btn btn-outline">Save</button>
							      </div>
							      </form>
							    </div>
							    <!-- /.modal-content -->
							  </div>
							  <!-- /.modal-dialog -->
							</div>
					<?php endwhile; ?>
				</tbody>
		      </table>
		    </div>
	    </div>
	  </div>
	</div>
</section>

<div class="modal modal-success fade" id="tambah-barang">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <img src="../image/m.png" class="img-circle" alt="User Image" style="margin-right:;">
        <h4 class="modal-title">TambahBarang</span></h4>
      </div>
      <form action="proses.php" role="form"  method="POST">
      <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <label for="kd">Kode Barang</label>
              <input type="text" name="kode" class="form-control" id="kode" value="<?php echo $kode_otomatis; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="nb">Nama Barang</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Barang" onkeyup="validhuruf(this)" required>
            </div>
            <script language='javascript'>
								function validhuruf(a)
									{
   										 if(!/^[a-zA-Z ]+$/.test(a.value))

   									{
    									a.value = a.value.substring(0,a.value.length-2);
    									alert ('inputan hanya berupa huruf!');
   									}
									}
							</script>
            <div class="form-group">
				<label for="jenis">Nama kategori </label>
				<select name="kategori" for="jenis" class="form-control" required>
					<option value="">Pilih Jenis Nama kategori</option>
					<?php
					$sql=mysqli_query($conn,"SELECT * FROM tb_kategori ORDER BY nama_kategori ASC");
					while($tampil=mysqli_fetch_array($sql)){ ?>
					<option value="<?php echo $tampil['id_kategori']; ?>"><?php echo $tampil['nama_kategori']; ?>
					</option>	
				 	<?php } ?>
				</select>
			</div>
            <div class="input-group">
              <label for="Berat">Berat</label>
              <input type="number" name="berat" class="form-control" id="Berat" placeholder="Berat" utocomplete="off" required>
            </div>
           <div class="form-group">
			<label for="jenis">Nama Satuan </label>
			<select name="nama_satuan" for="satuan" class="form-control" required>
				<option value="">Pilih Jenis Satuan</option>
				<?php
				$sql=mysqli_query($conn,"SELECT * FROM tb_satuan_barang ORDER BY nama_satuan ASC");
				while($tampil=mysqli_fetch_array($sql)){ ?>
				<option value="<?php echo $tampil['Id']; ?>"><?php echo $tampil['nama_satuan']; ?>
				</option>	
			 	<?php } ?>
			</select>
			</div>
			<div class="form-group">
			<label for="jenis">Nama Supplier</label>
			<select name="nama_supplier" for="supplier" class="form-control" required>
				<option value="">Pilih Jenis Nama Supplier</option>
				<?php
				$sql=mysqli_query($conn,"SELECT * FROM tb_supplier ORDER BY nama_supplier ASC");
				while($tampil=mysqli_fetch_array($sql)){ ?>
				<option value="<?php echo $tampil['kode_supplier']; ?>"><?php echo $tampil['nama_supplier']; ?>
				</option>	
			 	<?php } ?>
			</select>
			</div>
			<div class="form-group">
              <label for="nb">Harga Satuan</label>
              <input type="text" name="harga" class="form-control" id="harga" value="<?php echo $data['harga_satuan']; ?>" placeholder="harga satuan" utocomplete="off" required>
            </div>
            <div class="form-group">
              <label for="nb">Harga Jual</label>
              <input type="text" name="jual" class="form-control" id="harga" value="<?php echo $data['harga_jual']; ?>" placeholder="harga satuan" utocomplete="off" required>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan_barang" class="btn btn-outline">Save</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


</div>


	<?php 
	include"footer.php";
	?>
