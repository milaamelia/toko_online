<?php 
	include"header.php";
	?>
<div class="content-wrapper">

	<section class="content-header">
		<h1>
		Ibazaar
		  <small>Data  Pamasok</small>
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
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-masuk"><span class="fa fa-plus" aria-hidden="true"></span>
		Add  Pamasok
		</button>
	</a>
		<a type="button" href="../assets/excelmasuk.php" class="btn btn-md btn-info"><span class="glyphicon glyphicon-PDF" aria-hidden="true"></span>
		&nbsp;Excel
	</a>
	</section>

<?php 
	$carikode = mysqli_query($conn, "select max(no_faktur) from tb_barangmasuk") or die (mysql_error());
	// menjadikannya array
	$datakode = mysqli_fetch_array($carikode);
	// jika $datakode
	if ($datakode) {
	$nilaikode = substr($datakode[0], 5);
	// menjadikan $nilaikode ( int )
	$kode = (int) $nilaikode;
	// setiap $kode di tambah 1
	$kode = $kode + 1;
	$kode_otomatis = "BM".str_pad($kode, 4, "0", STR_PAD_LEFT);
	} else {
	$kode_otomatis = "NK0001";
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
							<tr>
						
							<th>No Faktor</th>
							<th>Tanggal Masuk</th>
							<th>Nama Barang</th>
							<th>Nama Supplier</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Aksi</th>
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
								</button>
								<a href="pamasok.php?hapus_masuk=<?php echo $data['no_faktur']; ?>" name="hapus_masuk" title="Hapus" class="btn btn-danger" onclick="return confirm('Anda yakin?');">
					  				<i class='glyphicon glyphicon-trash'>Delete</i>
								</a>
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
<div class="modal modal-success fade" id="tambah-masuk">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<img src="../image/m.png" class="img-circle" alt="User Image" style="margin-right:;">
				<h4 class="modal-title">Add Pamasok</span></h4>
			</div>
			<form action="" role="form"  method="POST">
			<div class="modal-body">
				<div class="box-body">
					<div class="form-group">
						<label for="kd">No Faktur</label>
						<input type="text" name="no" class="form-control" id="kode" value="<?php echo $kode_otomatis; ?>" >
					</div>
					<div class="form-group">
			            <label>Tanggal Masuk:</label>

			            <div class="input-group date">
			              <div class="input-group-addon">
			                <i class="fa fa-calendar"></i>
			              </div>
			              <input type="text" name="tanggal" class="form-control pull-right" id="datepicker">
			            </div>
					<div class="form-group">
						<label for="jenis">Nama Barang </label>
						<select name="nm" for="jenis" class="form-control" required>
					<option value="">Pilih Jenis Nama Barang</option>
					<?php
					$sql=mysqli_query($conn,"SELECT * FROM tb_barang ORDER BY nama_barang ASC");
					while($tampil=mysqli_fetch_array($sql)){ ?>
					<option value="<?php echo $tampil['kode_barang']; ?>"><?php echo $tampil['nama_barang']; ?>
					</option>	
				 	<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="jenis">Nama Supplier </label>
				<select name="supplier" for="sp" class="form-control" required>
			<option value="">Pilih Jenis Nama Supplier</option>
			<?php
			$sql=mysqli_query($conn,"SELECT * FROM tb_supplier ORDER BY nama_supplier ASC");
			while($tampil=mysqli_fetch_array($sql)){ ?>
			<option value="<?php echo $tampil['kode_supplier']; ?>"><?php echo $tampil['nama_supplier']; ?>
			</option>	
		 	<?php } ?>
		</select>
			</div>
			
			<div class="input-group">
				<label for="keterangan">Jumlah</label>
				<input type="number" name="jumlah" class="form-control" id="number" placeholder="jumlah" required value="0">
			</div>
			<div class="form-group">
              <label for="harga">Harga</label>
              <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga" required>
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
	</div>
	<!-- /.modal-dialog -->
<!-- /.modal -->

<?php
include '../config/koneksi.php';
if(isset($_POST['simpan_barang'])) {
	$id          = $_POST['no'];
	$tanggal 	 = $_POST['tanggal'];
	$nama  	     = $_POST['nm'];
	$supplier 	 = $_POST['supplier'];
	$stok1 	     = $_POST['jumlah'];
	$ktg   	     = $_POST['harga'];
	$query       =  "INSERT INTO tb_barangmasuk VALUES ('$id','$tanggal','$nama','$supplier','$stok1','$ktg')";
	$q=mysqli_query($conn,$query) or die($query);
		$sql3=mysqli_query($conn, "UPDATE tb_stok SET stok  = '$stok1' + stok  WHERE kode_barang = ('$nama')");

	if($query)
	{
			echo "<script>alert('Tambah berhasil');location=('icomming.php');</script>";
		}

	else{
			echo "<script>alert('Tambah Gagal');location=('icomming.php');</script>";
		}
	
}
?>
<?php
if (isset($_GET['hapus_masuk'])) { // hapus satuan
  $query = "DELETE from tb_barangmasuk WHERE no_faktur = '$_GET[hapus_masuk]'";
  $sql = mysqli_query($conn, $query);
  if($sql){
        echo "<script>location=('pamasok.php');</script>";
    }else{
      echo "Error: " .$query;
      die();
    }

  }
  ?>
<?php 
	include"footer.php";
?>
