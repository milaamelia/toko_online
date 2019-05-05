<?php
include "header.php";
?>
<div class="content-wrapper">

<section class="content-header">
<h1>
  Data 
  <small>Costumer </small>
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
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-pelanggan"><span class="fa fa-plus" aria-hidden="true"></span>
	Add Customer Data
	</button>
	<?php 
	$carikode = mysqli_query($conn, "select max(kode_pelanggan) from tb_pelanggan") or die (mysql_error());
	// menjadikannya array
	$datakode = mysqli_fetch_array($carikode);
	// jika $datakode
	if ($datakode) {
	$nilaikode = substr($datakode[0], 1);
	// menjadikan $nilaikode ( int )
	$kode = (int) $nilaikode;
	// setiap $kode di tambah 1
	$kode = $kode + 1;
	$kode_otomatis = "P".str_pad($kode, 4, "0", STR_PAD_LEFT);
	} else {
	$kode_otomatis = "P0001";
	}
?>
</section>
<section class="content">
	<div class="row">
	  <div class="col-md-12">
	    <div class="box">
		    <div class="box-body">
		      <table id="example1" class="table table-bordered table-striped">
		      	<thead>
					<tr>
						<th>Kode Pelanggan</th>
						<th>Nama Pelanggan</th>
						<th>Alamat</th>
						<th>Kota</th>
						<th>Email</th>
						<th>Telphone</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php

					include '../config/koneksi.php';

					$tampil = "SELECT * FROM tb_pelanggan";
					$hasil = mysqli_query($conn, $tampil);

					while ($data=mysqli_fetch_assoc($hasil)):
					?>
						<tr>
							<td><?php echo $data['kode_pelanggan']; ?></td>
							<td><?php echo $data['nama_pelanggan']; ?></td>
							<td><?php echo $data['alamat_pelanggan']; ?></td>
							<td><?php echo $data['kota_pelanggan']; ?></td>
							<td><?php echo $data['email_pelanggan']; ?></td>
							<td><?php echo $data['tlp_pelanggan']; ?></td>
							<td>
								<button type="button" title="Update" class="btn btn-info" data-toggle="modal" data-target="#edit_pelanggan<?php echo $data['kode_pelanggan']; ?>">
					  				<i class='glyphicon glyphicon-edit'></i> Update
								</button>
								<a href="proses.php?hapus_pelanggan=<?php echo $data['kode_pelanggan']; ?>" name="hapus_pelanggan" title="Delete" class="btn btn-danger" onclick="return confirm('You are sure?');">
					  				<i class='glyphicon glyphicon-trash'></i>Delete
								</a>
							</td>

							<!--modal edit data-->
							<div class="modal modal-info  fade" id="edit_pelanggan<?php echo $data['kode_pelanggan']; ?>">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span></button>
							          <img src="../image/supplier.png" class="img-circle" alt="User Image" style="margin-right:;">
							        <h4 class="modal-title">Edit Pelanggan</h4>
							      <form action="proses.php" role="form" method="POST">
							      <input type="hidden" name="kode_pelanggan" value="<?php echo $data['kode_pelanggan']; ?>">
							      <div class="modal-body">
							          <div class="box-body">
							            <div class="form-group">
							              <label for="kd">Kode Pelanggan</label>
							              <input type="text" name="edit-pelanggan" class="form-control" id="kd" value="<?php echo $data['kode_pelanggan']; ?>" readonly>
							            </div>
							            <div class="form-group">
							              <label for="nb">Nama Pelanggan</label>
							              <input type="text" name="edit-nama" class="form-control" id="nb" value="<?php echo $data['nama_pelanggan']; ?>" placeholder="Nama Pelanggan" required>
							            </div>
										<div class="form-group">
						                  <label>Alamat Pelanggan</label>
						                  <textarea class="form-control"  rows="3"  name="edit-alamat" value="<?php echo $data['alamat_pelanggan']; ?>" placeholder="Alamat ..."></textarea>
						                </div>
						                <div class="form-group">
							              <label for="kota">Kota Pelanggan</label>
							              <input type="text" name="edit-kota" class="form-control" id="kota" value="<?php echo $data['kota_pelanggan']; ?>" placeholder="Nama Pelanggan" required>
							            </div>
							            </div>
							            <div class="form-group">
							              <label for="nb">Email Pelanggan</label>
							              <input type="email" name="edit-email" class="form-control" id="nb" value="<?php echo $data['email_pelanggan']; ?>" placeholder="Nama Supplier" required>
							            </div>
							            <div class="box-body">
						                <div class="form-group">
							              <label for="nb">Telphone</label>
							              <input type="number" name="edit-tlp" class="form-control" id="nb" value="<?php echo $data['tlp-pelanggan']; ?>" placeholder="Nama Supplier" required>
							            </div>
									<div class="modal-footer">
							        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
							        <button type="submit" name="edit_pelanggan" class="btn btn-outline">Save</button>
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

<div class="modal modal-success fade" id="tambah-pelanggan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <img src="../image/supplier.png" class="img-circle" alt="User Image" style="margin-right:;">
        <h4 class="modal-title">Tambah Data Pelanggan</h4>
      </div>
      <form action="proses.php" role="form"  method="POST">
      <div class="modal-body">
          <div class="box-body">
          <div class="form-group">
              <label for="kd">Kode Pelanggan</label>
              <input type="text" name="kode" class="form-control" id="kd" value="<?php echo $kode_otomatis; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="nb">Nama Pelanggan</label>
              <input type="text" name="nama_pelanggan" class="form-control" id="nama_supplier" placeholder="Nama supplier" required>
            </div>
	      <div class="form-group">
          <label>Alamat Pelanggan</label>
          <textarea class="form-control"  rows="3" name="alamat" placeholder="Alamat ..."></textarea>
        </div>
        <div class="form-group">
          <label for="nb">Kota Pelanggan</label>
          <input type="text" name="kota" class="form-control" id="nb"  placeholder="Kota " required>
        </div>
        </div>
         <div class="form-group">
          <label for="nb">Email Pelanggan</label>
          <input type="text" name="email" class="form-control" id="nb"  placeholder="email" required>
        </div>
        <div class="form-group">
          <label for="nb">Telphone</label>
          <input type="number" name="tlpn" class="form-control" id="nb"  placeholder="Telphone" required>
        </div>
        	</div>
       </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan_pelanggan" class="btn btn-outline">Save</button>
      </div>
      </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


</div>

<?php
include "footer.php";
?>