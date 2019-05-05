
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
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Nama kategori</th>
            <th>Berat</th>
            <th>Satuan</th>
            <th>Nama Supplier</th>
          </tr>
        </thead>
        <?php

          include '../config/koneksi.php';

          $tampil = "SELECT b.kode_barang, b.nama_barang, k.nama_kategori, b.berat, s.nama_satuan, r.nama_supplier
           FROM tb_barang b JOIN tb_kategori k ON b.id_kategori = k.id_kategori JOIN tb_satuan_barang s ON b.Id = s.Id 
           JOIN tb_supplier r ON b.kode_supplier = r.kode_supplier";
          $hasil = mysqli_query($conn, $tampil);

          while ($data=mysqli_fetch_assoc($hasil)):
          ?>
            <tr>
              <td><?php echo $data['kode_barang']; ?></td>
              <td><?php echo $data['nama_barang']; ?></td>
              <td><?php echo $data['nama_kategori']; ?></td>
              <td><?php echo $data['berat']; ?></td>
              <td><?php echo $data['nama_satuan']; ?></td>
              <td><?php echo $data['nama_supplier']; ?></td>
        </tbody>
            <?php endwhile; ?>
      </table>
      </section>
</body>
</html>