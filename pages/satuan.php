<?php
include "header.php";
?>



<div class="content-wrapper">

<section class="content-header">
<h1>
  Data 
  <small> Unit</small>
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
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-satuan"><span class="fa fa-plus" aria-hidden="true"></span>
    	Add Data Unit
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
						<th>No </th>
						<th>ID Satuan</th>
						<th>Nama Satuan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php

					include '../config/koneksi.php';

					$tampil = "SELECT * FROM tb_satuan_barang";
					$hasil = mysqli_query($conn, $tampil);
						$no =1;
					while ($data=mysqli_fetch_assoc($hasil)):
					?>
						<tr>
							<td><?= $no ?></td>	
							<td><?php echo $data['Id']; ?></td>
							<td><?php echo $data['nama_satuan']; ?></td>
							<td>


								<button type="button" title="Update" class="btn btn-info" data-toggle="modal" data-target="#edit_satuan<?php echo $data['Id']; ?>">
					  				<i class='glyphicon glyphicon-edit'></i>Update
								</button>
								<a href="proses.php?hapus_satuan=<?php echo $data['Id']; ?>" name="hapus_satuan" title="Delete" class="btn btn-danger" onclick="return confirm('You are sure?');">
					  				<i class='glyphicon glyphicon-trash'></i>Delete
								</a>
							</td>
							<?php $no++; ?>
							<!--modal edit data-->
							<div class="modal modal-info  fade" id="edit_satuan<?php echo $data['Id']; ?>">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span></button>
							          <img src="../image/timbangan.png" class="img-circle" alt="User Image" style="margin-right:;">
							        <h4 class="modal-title">Edit Satuan</h4>
							      <form action="proses.php" role="form" method="POST">
							      <input type="hidden" name="id_satuan" value="<?php echo $data['Id']; ?>">
							      <div class="modal-body">
							          <div class="box-body">
							            <div class="form-group">
							              <label for="nb">Nama Satuan</label>
							              <input type="text" name="edit-satuan" class="form-control" id="nb" value="<?php echo $data['nama_satuan']; ?>" placeholder="Nama Satuan" required>
							            </div>
							            
							      <div class="modal-footer">
							        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
							        <button type="submit" name="edit_satuan" class="btn btn-outline">Save</button>
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

<div class="modal modal-success fade" id="tambah-satuan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <img src="../image/timbangan.png" class="img-circle" alt="User Image" style="margin-right:;">
        <h4 class="modal-title">Tambah Data Satuan</h4>
      </div>
      <form action="proses.php" role="form"  method="POST">
      <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <label for="nb">Nama Satuan</label>
              <input type="text" name="nama_satuan" class="form-control" id="nama_satuan" placeholder="Nama Satuan" required>
            </div>
       	</div>
       </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan_satuan" class="btn btn-outline">Save</button>
      

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
include "footer.php";
?>