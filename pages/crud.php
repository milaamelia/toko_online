<?php
	include 'header.php'; 
?>

	<div class="content-wrapper">

<section class="content-header">
<h1>
Ibazaar
  <small>Data Barang</small>
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
</script>
<?php 
	$carikode = mysqli_query($conn, "select max(jual_id) from tb_jual") or die (mysql_error());
	// menjadikannya array
	$datakode = mysqli_fetch_array($carikode);
	// jika $datakode
	if ($datakode) {
	$nilaikode = substr($datakode[0], 1);
	// menjadikan $nilaikode ( int )
	$kode = (int) $nilaikode;
	// setiap $kode di tambah 1
	$kode = $kode + 1;
	$kode_otomatis = "N".str_pad($kode, 3, "B-", STR_PAD_LEFT);
	} else  {
	$kode_otomatis = "N";
	}
?>
<div class="row">
  <div class="col-md-3 col-md-offset-9">
<center>
	<h6 style="font-size: 34px; font-family: arial; color:#000;" id="jam"></h6>
</center>
</div>
	</div>
<section class="content">
	<div class="row">
	  <div class="col-md-12">
	    <div class="box">
		    <div class="box-body">
		      <table id="example1" class="table table-bordered table-striped">
		      	<thead>
					<tr><th>No</th>
						
						<th>kode Barang </th>
						<th>Nama Barang</th>
						<th>Harga Satuan</th>
						<th >Stok Barang</th>
						<th>Jumlah</th>
						<th>Sub Total</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
			
		    <?php
				//MENAMPILKAN DETAIL KERANJANG BELANJA//
                
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
            $query = mysqli_query($conn, "SELECT b.kode_barang, b.nama_barang, k.nama_kategori, b.berat, s.nama_satuan, r.nama_supplier, b.harga_satuan, t.stok
					 FROM tb_barang b JOIN tb_kategori k ON b.id_kategori = k.id_kategori JOIN tb_satuan_barang s ON b.Id = s.Id 
					 JOIN tb_supplier r ON b.kode_supplier = r.kode_supplier JOIN tb_stok t on t.kode_barang= b.kode_barang = '$key'");
            $data = mysqli_fetch_array($query);
            
            $jumlah_harga = $data['harga_satuan'] * $val;
            $total += $jumlah_harga;
            $no = 1;
            ?>
                <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $data['kode_barang']; ?></center></td>
                <td><center><?php echo $data['nama_barang']; ?></center></td>
                <td><center><?php echo number_format($data['harga_satuan']); ?></center></td>
                <td><center><?php echo number_format($data['stok']); ?></center></td>
                <td><center><?php echo number_format($val); ?></center></td>
                <td><center><?php echo number_format($jumlah_harga); ?></center></td>
                <td><center><a href="detail.php?act=plus&amp;kode_barang=<?php echo $key; ?>&amp;ref=crud.php" class="btn btn-xs btn-success">Tambah</a>
                 <a href="detail.php?act=min&amp;kode_barang=<?php echo $key; ?>&amp;ref=crud.php" class="btn btn-xs btn-info">Kurang</a> 
                 <a href="detail.php?act=del&amp;kode_barang=<?php echo $key; ?>&amp;ref=crud.php" class="btn btn-xs btn-warning">Hapus</a></center></td>
                </tr>
                </tr>
                
					<?php
                    //mysql_free_result($query);			
						}
							//$total += $sub;
						}?>  
                         <?php
				if($total == 0){
					echo '<tr><td colspan="8" align="center">Ups, Keranjang kosong!</td></tr></table>';
				} else {
					echo '
						<tr style="background-color: #DDD;"><td colspan="6" align="center"><b>Total :</b></td><td align="right"><b>Rp. '.number_format($total,2,",",".").'</b></td></td></td><td></td></tr></table>
						<p><div align="right">
						</div>
						
					';

				}
				?>
				<div class="col-md-3 col-md-offset-9">
						<div class="form-group">
						<b>Total Bayar</b>
	                   <input type="text" name="bayar" class="form-control" id="kd" value="" readonly>
	                   </div>
				</tbody>
          </table>
			
				
			<!-- end: Table -->

		</div>
		<!-- end: Container -->
				
	</div>
	</div>
</div>	<!-- end: Wrapper  -->			
</section>
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="box">
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
            <tr>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Satuan</th>
              <th>Harga Satuan</th>
              <th>stok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          	<tbody>
          <?php

				include '../config/koneksi.php';
				$no=0;
				$tampil = "SELECT b.kode_barang, b.nama_barang, k.nama_kategori, b.berat, s.nama_satuan, r.nama_supplier, b.harga_satuan, t.stok
				 FROM tb_barang b JOIN tb_kategori k ON b.id_kategori = k.id_kategori JOIN tb_satuan_barang s ON b.Id = s.Id 
				 JOIN tb_supplier r ON b.kode_supplier = r.kode_supplier JOIN tb_stok t on t.kode_barang= b.kode_barang  ";
				$hasil = mysqli_query($conn, $tampil);
				while ($data=mysqli_fetch_assoc($hasil)):
				
				?>
		<tr>
			<td><?php echo $data['kode_barang']; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo $data['nama_satuan']; ?></td>
			<td><?php echo $data['harga_satuan']; ?></td>
			<td><?php echo $data['stok']; ?></td>
			<td><div class="clear"><a href="detail.php?act=add&amp;kode_barang=<?php echo $data['kode_barang']; ?>&amp;ref=crud.php?kode_barang=<?php echo $data['kode_barang'];?>" class="btn btn-lg btn-info"><i class='fa fa-cart-arrow-down'>  Beli</i></a></div></td>
          </tr>
			</td>
		</tr>
	<?php endwhile; ?>
		</tbody>
		</table>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box">
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
				<div class="form-group">
	              <label for="kd">Kode Transaksi</label>
	              <input type="text" name="kode" class="form-control" id="kd" value="<?php echo $kode_otomatis; ?>" readonly>
	            </div>
        		<div class="form-group">
				<label>Tanggal Masuk:</label>
				<div class="input-group date">
				<div class="input-group-addon">
				<i class="fa fa-calendar"></i>
				</div>
				<input type="text" value=""  name="tanggal_masuk" class="form-control pull-right" id="datepicker">
					</div>
				 <div class="form-group">
				<label for="kategori">Nama Supplier</label>
				<select id="kategori" name="edit-supplier" class="form-control">
					<?php
					$sql3 =mysqli_query($conn,"SELECT * FROM tb_pelanggan ORDER BY nama_pelanggan ASC");
					while($tampil=mysqli_fetch_array($sql3)){
					?>
					<option value="<?php echo $tampil['kode_pelanggan']; ?>"><?php echo $tampil['nama_pelanggan']; ?>
					</option>	
					<?php } 
					?>
				</select>

					<!-- /.input group -->
					</div>
				</div>
			</table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>



<?php 
	include 'footer.php';
?>