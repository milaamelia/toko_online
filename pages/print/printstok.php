
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
            <th>Kode Stok</th>
            <th>Nama Barang</th>
            <th>Nama kategori</th>
            <th>Nama Supplier</th>
            <th>Stok</th>
          </tr>
        </thead>
        <?php

          include '../config/koneksi.php';

          $tampil = "SELECT s.kode_stok,b.nama_barang, t.nama_kategori, r.nama_supplier, s.stok FROM tb_stok s JOIN tb_barang b ON s.kode_barang = b.kode_barang JOIN tb_kategori t ON s.id_kategori = t.id_kategori  JOIN tb_supplier r ON s.kode_supplier = r.kode_supplier";
          $hasil = mysqli_query($conn, $tampil);

          while ($data=mysqli_fetch_assoc($hasil)):
          ?><tr>
              <td><?php echo $data['kode_stok']; ?></td>
              <td><?php echo $data['nama_barang']; ?></td>
              <td><?php echo $data['nama_kategori']; ?></td>
              <td><?php echo $data['nama_supplier']; ?></td>
              <td><?php echo $data['stok']; ?></td>
        </tbody>
            
            <?php endwhile; ?>
      </table>
      </section>
</body>
</html>