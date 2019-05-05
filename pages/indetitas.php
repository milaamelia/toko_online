<?php
	include"header.php";
	?>
		<div class="content-wrapper">

	<section class="content-header">
		<h1>
		IBAZAAR
		<small>Indetity Data </small>
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
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-indetitas"><span class=" fa fa-plus" aria-hidden="true"></span>
	Add Identity Data
	</button>
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
						<th>Nama Indetitas</th>
						<th>email</th>
						<th>Alamat</th>
						<th>Telphone</th>
						<th>Keterangan</th>
						<th>Notifikasi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php

					include '../config/koneksi.php';
					$tampil = "SELECT * FROM tb_indetitas";
					$hasil = mysqli_query($conn, $tampil);
							$no =1;
					while ($data=mysqli_fetch_assoc($hasil)):					
 					?>
						<tr>
							<td><?= $no ?></td>							
							<td><?php echo $data['nama_indetitas']; ?></td>
							<td><?php echo $data['email'];?></td>
							<td><?php echo $data['alamat_indetitas']; ?></td>
							<td><?php echo $data['tlp']; ?></td>
							<td><?php echo $data['keterangan']; ?></td>
							<td><?php echo $data['notifikasi']; ?></td>

							<td>
								<button type="button" title="Update" class="btn btn-info" data-toggle="modal" 
								data-target="#edit_indetitas<?php echo $data['Id_indetitas']; ?>">
					  				<i class='glyphicon glyphicon-edit'> </i>Update
								</button>
								<a href="proses.php?hapus_indetitas=<?php echo $data['Id_indetitas']; ?>" name="hapus_indetitas" title="Delete" class="btn btn-danger" onclick="return confirm('Anda yakin?');">
					  				<i class='glyphicon glyphicon-trash'> </i>Delete
								</a>
							</td>  
								<?php $no++; ?>
							<!--modal edit data-->
							<div class="modal modal-info fade" id="edit_indetitas<?php echo $data['Id_indetitas']; ?>">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span></button>
							             <img src="../image/Admin.png" class="img-circle" alt="User Image" style="margin-right:;">
							        	<h4 class="modal-title">Edit Indetias</h4>
							    	  <form action="proses.php" role="form"  method="POST">
							    	 <input type="hidden" name="id_indetitas" value="<?php echo $data['Id_indetitas']; ?>">
							      		<div class="modal-body">
							          <div class="box-body">
							            <div class="form-group">
							              <label for="kd">Nama Indetitas</label>
							              <input type="text" name="edit-indetitas" class="form-control" id="kd" value="<?php echo $data['nama_indetitas']; ?>" placeholder="Nama Indetitas">
							            </div>
							            <div class="form-group">
							              <label for="kd">Email</label>
							              <input type="email" name="edit-email" class="form-control" id="kd" value="<?php echo $data['email']; ?>" placeholder="Email...">
							            </div>
							            <div class="form-group">
								          <label>Alamat</label>
								          <textarea class="form-control" name="edit-alamat" rows="3" value="<?php echo $data['alamat_indetitas'];?>" placeholder="Alamat ..."></textarea>
								        </div>
								        <div class="form-group">
							              <label for="tlp">Telphone</label>
							              <input type="number" name="edit-tlpn" class="form-control" id="tlp" value="<?php echo $data['tlp']; ?>" placeholder="Telphone" >
							            </div>
							            <div class="form-group">
							              <label for="keterangan">Ketrangan</label>
							              <input type="text" name="edit-keterangan" class="form-control" id="keterangan" value="<?php echo $data['keterangan']; ?>" placeholder="Ketrangan">
							            </div>
							            <div class="form-group">
											<label for="kategori">Notifikasi Emial</label>
											<select id="kategori" name="edit-notif" class="form-control">
											<option>True</option>
											<option>False</option>
	                    					</select>
										</div>
							      </div>
							      <div class="modal-footer">
							        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
							        <button type="submit" name="edit_indetitas1" class="btn btn-outline">Save</button>
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

<div class="modal modal-success fade" id="tambah-indetitas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <img src="../image/admin.png" class="img-circle" alt="User Image" style="margin-right:;">
        <h4 class="modal-title">Tambah indetitas</h4>
      </div>
      <form action="proses.php" role="form"  method="POST">
      <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <label for="kd">Nama Indetitas</label>
              <input type="text" name="nama" class="form-control" id="nama" value="" placeholder="Nama Indetitas" >
            </div>
             <div class="form-group">
              <label for="kd">Email</label>
              <input type="text" name="email" class="form-control" id="nama" value="" placeholder="Emial...." >
            </div>           
          <div class="form-group">
          <label>Alamat</label>
          <textarea class="form-control" name="alamat" rows="3" placeholder="Text ..."></textarea>
        </div>
        <div class="form-group">
          <label for="tlpn">Telphone</label>
          <input type="number" name="tlpn" class="form-control" id="tlpn" value="" placeholder="Telphone" >
        </div>
        <div class="form-group">
          <label for="tlpn">Keterangan</label>
          <input type="text" name="keterangan" class="form-control" id="keterangan" value="" placeholder="keterangan" >
        </div> 
         <div class="form-group">
			<label for="kategori">Notifikasi Emial</label>
			<select id="kategori" name="notif" class="form-control">
			<option>True</option>
			<option>False</option>
			</select>
		</div>                
        </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan_indetitas" class="btn btn-outline">Save</button>
      </div>
      </form>
    
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


</div>

	<?php
	include"footer.php";
	?>