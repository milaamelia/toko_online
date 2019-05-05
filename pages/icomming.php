<?php 
	include"header.php";
	?>
		<div class="content-wrapper">

<section class="content-header">
<h1>
Ibazaar
  <small>Icoming Gooods</small>
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
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-stok"><span class=" fa fa-plus" aria-hidden="true"></span>
	Add Icoming Goods
	</button>
	</a>
		<a type="button" href="../assets/excelstok.php" class="btn btn-md btn-info"><span class="glyphicon glyphicon-PDF" aria-hidden="true"></span>
		&nbsp;Excel
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
						<th>Aksi</th>
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
								<button type="button" title="Update" class="btn btn-info" data-toggle="modal" data-target="#edit_stok<?php echo $data['id_stok']; ?>">
					  				<i class='glyphicon glyphicon-edit'> </i> Update
								</button>
								<a href="proses.php?hapus_stok=<?php echo $data['id_stok']; ?>" name="hapus_stok" title="Delete" class="btn btn-danger" onclick="return confirm('Are You Sure?');">
					  				<i class='glyphicon glyphicon-trash'> </i> Delete
								</a>
								
							</td>
						</tr>
						<?php $no++; ?>
							<!--modal edit data-->
							<div class="modal modal-info fade" id="edit_stok<?php echo $data['id_stok']; ?>">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span></button>
							             <img src="../image/stok.png" class="img-circle" alt="User Image" style="margin-right:;">
							        <h4 class="modal-title">Update Icoming Gooods</h4>
							      <form action="proses.php" role="form"  method="POST">
							      <input type="hidden" name="id_satuan" value="<?php echo $data['id_stok']; ?>">
							      <div class="modal-body">
							          <div class="box-body">
							             <div class="form-group">
											<label for="kategori">Nama Barang </label>
											<select id="kategori" name="edit-barang" class="form-control">
												<?php
												$sql1 =mysqli_query($conn,"SELECT * FROM tb_barang ORDER BY nama_barang ASC");
												while($tampil=mysqli_fetch_array($sql1)){
												?>
												<option value="<?php echo $tampil['kode_barang']; ?>"><?php echo $tampil['nama_barang']; ?>
												</option>	
												<?php } 
												?>
	                    					</select>
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
										<div class="form-group">
											<label for="supplier">Nama Supplier</label>
											<select id="supplier" name="edit-supplier" class="form-control">
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
							      </div>
							      <div class="modal-footer">
							        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
							        <button type="submit" name="edit_stok" class="btn btn-outline">Save</button>
							      </div>
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
</section>

<div class="modal modal-success fade" id="tambah-stok">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <img src="../image/stok.png" class="img-circle" alt="User Image" style="margin-right:;">
        <h4 class="modal-title">Add Icoming Gooods</span></h4>
      </div>
      <form action="proses.php" role="form"  method="POST">
      <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
				<label for="jenis">Nama Barang </label>
				<select name="barang" for="jenis" class="form-control" required>
					<option value="">Pilih Jenis Nama Barang</option>
					<?php
					$sql=mysqli_query($conn,"SELECT * FROM tb_barang ORDER BY nama_barang ASC");
					while($tampil=mysqli_fetch_array($sql)){ ?>
					<option value="<?php echo $tampil['kode_barang']; ?>"><?php echo $tampil['nama_barang']; ?>
					</option>	
				 	<?php } ?>
				</select>
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
		 <div class="form-group">
				<label for="jenis">Nama Supplier </label>
				<select name="supplier" for="jenis" class="form-control" required>
					<option value="">Pilih Jenis Nama Supplier</option>
					<?php
					$sql=mysqli_query($conn,"SELECT * FROM tb_supplier ORDER BY nama_supplier ASC");
					while($tampil=mysqli_fetch_array($sql)){ ?>
					<option value="<?php echo $tampil['kode_supplier']; ?>"><?php echo $tampil['nama_supplier']; ?>
					</option>	
				 	<?php } ?>
				</select>
			</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan_stok" class="btn btn-outline">Save</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>	
<!-- /.modal -->


</div>


	<?php 
	include"footer.php";
	?>
