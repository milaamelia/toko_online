<?php
	include"header.php";
	?>
		<div class="content-wrapper">

	<section class="content-header">
		<h1>
		IBAZAAR
		<small>User Data </small>
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
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-petugas"><span class=" fa fa-plus" aria-hidden="true"></span>
	Add user data
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
						<th>Username</th>
						<th>Level</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php

					include '../config/koneksi.php';
					$tampil = "SELECT * FROM tb_login";
					$hasil = mysqli_query($conn, $tampil);
						$no =1;
					while ($data=mysqli_fetch_assoc($hasil)):
					 					
 					?>
						<tr>
						    <td><?= $no ?></td>
							<td><?php echo $data['username']; ?></td>
							<td><?php echo $data['level']; ?></td>
							<td>
								<button type="button" title="Upadate" class="btn btn-info" data-toggle="modal" 
								data-target="#edit_petugas<?php echo $data['idlogin']; ?>">
					  				<i class='glyphicon glyphicon-edit'> </i>Update
								</button>
								<a href="proses.php?hapus_petugas=<?php echo $data['idlogin']; ?>" name="hapus_petugas" title="Delete" class="btn btn-danger" onclick="return confirm('Anda yakin?');">
					  				<i class='glyphicon glyphicon-trash'> </i>Hapus
								</a>
							</td>
							<?php $no++ ?>
							<!--modal edit data-->
							<div class="modal modal-info fade" id="edit_petugas<?php echo $data['idlogin']; ?>">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span></button>
							             <img src="../image/Admin.png" class="img-circle" alt="User Image" style="margin-right:;">
							        	<h4 class="modal-title">Edit Petugas</h4>
							    	  <form action="proses.php" role="form"  method="POST">
							    	  <input type="hidden" name="idlogin" value="<?php echo $data['idlogin']; ?>">
							      		<div class="modal-body">
							          <div class="box-body">
							         <div class="form-group">
							            </div>
								        <div class="form-group">
							              <label for="tlp">Username</label>
							              <input type="text" name="edit-user" class="form-control" id="tlp" value="<?php echo $data['username']; ?>" placeholder="Username" >
							            </div>
							            <div class="form-group">
							              <label for="tlp">Password</label>
							              <input type="password" name="edit-password" class="form-control" id="tlp" value="<?php echo $data['password']; ?>" placeholder="password"  readonly>
							            </div>
							            <div class="form-group">
						            <label>Level</label>
						            <select class="form-control select2" name="edit-level" style="width: 100%;">
						              <option selected="selected">Pilih Level</option>
						              					             
						              <option>Admin</option>
									 </select>
						          </div>
							      </div>
							      <div class="modal-footer">
							        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
							        <button type="submit" name="edit_petugas" class="btn btn-outline">Save</button>
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

<div class="modal modal-success fade" id="tambah-petugas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <img src="../image/admin.png" class="img-circle" alt="User Image" style="margin-right:;">
        <h4 class="modal-title">Tambah Petugas</h4>
      </div>
      <form action="proses.php" role="form"  method="POST">
      <div class="modal-body">
          <div class="box-body">
            <div class="form-group"> 
            <div class="form-group">
              <label for="user">Username</label>
              <input type="text" name="username" class="form-control" id="user" value="" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="pw">Password</label>
              <input type="password" name="password" class="form-control" id="pw" value="" placeholder="Password">
            </div>           
          <div class="form-group">
        <label>Level</label>
        <select class="form-control select2" name="level"  style="width: 100%;">
          <option selected="selected">Pilih Level</option>
          <option>Admin</option>
        </select>
      </div>            
        </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan_petugas" class="btn btn-outline">Save</button>
      </div>
      </form>
    
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