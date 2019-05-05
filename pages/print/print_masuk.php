
<body onLoad="window.print();">
   <?php include '../config/koneksi.php'; ?>
   
    <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
          <tr>
            <th>No Faktur</th>
            <th>Tanggal Masuk</th>
            <th>Nama Barang</th>
            <th>Nama supplier</th>
            <th>Jumlah</th>
            <th>Harga Beli</th>
          </tr>
        </thead>
        <?php

            include '../config/koneksi.php';

            $tampil = "SELECT  s.no_faktur, s.tgl_masuk,b.nama_barang, r.nama_supplier, s.jumlah, s.harga_beli   FROM tb_barangmasuk s JOIN tb_barang b ON s.kode_barang= b.kode_barang JOIN tb_supplier r ON s.kode_supplier = r.kode_supplier";
            $hasil = mysqli_query($conn, $tampil);

            while ($data=mysqli_fetch_assoc($hasil)):
            ?>
             <tr>
              <td><?php echo $data['no_faktur']; ?></td>
              <td><?php echo $data['tgl_masuk']; ?></td>
              <td><?php echo $data['nama_barang']; ?></td>
              <td><?php echo $data['nama_supplier']; ?></td>
              <td><?php echo $data['jumlah']; ?></td>
              <td><?php echo $data['harga_beli']; ?></td>
        </tbody>
            <?php endwhile; ?>
      </table>
      </section>
</body>
</html>