   <?php
    session_start();
    include "../config/koneksi.php";

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }else{
        header("location: ../login.php");
    }
    $session_id = $_SESSION['username'];
?>

<?php  
  include "../config/koneksi.php";
  if(isset($_POST['simpan_barang'])){ //simpan barang
    $kd  = $_POST['kode'];
    $nm  = $_POST['nama'];
    $ktg = $_POST['kategori'];	
    $brt = $_POST['berat'];
    $stn = $_POST['nama_satuan'];
    $sup = $_POST['nama_supplier'];
    $harga = $_POST['harga'];
     $jual = $_POST['jual'];
    $query = "INSERT INTO tb_barang VALUES ('$kd','$nm','$ktg','$brt','$stn','$sup','$harga','$jual')";
    $sql = mysqli_query($conn, $query);

    
    if($sql){
      echo "<script>location=('barang.php')</script>";
    }else{
      echo "Error: " . $query;
      die();
    }
  }

  elseif(isset($_POST['edit_barang'])){ //edit barang
    $ekd          = $_POST['edit-kode'];
    $enm          = $_POST['edit-nama'];
    $ektg         = $_POST['edit-kategori'];  
    $ebrt         = $_POST['edit-berat'];
    $stn          =  $_POST['edit-satuan'];
    $supplier1    =  $_POST['edit-supplier'];
    $harga_satuan  =  $_POST['edit-harga'];
     $harga_jual  =  $_POST['edit-jual'];
    $query_update = " UPDATE tb_barang SET nama_barang='$enm', id_kategori='$ektg', berat='$ebrt',id='$stn',kode_supplier='$supplier1',harga_satuan='$harga_satuan',harga_jual='$harga_jual' where kode_barang='$ekd'";
    $sql1         = mysqli_query($conn, $query_update);
    if($sql1){
      echo "<script>location=('barang.php')</script>";
    }else{
      echo "Error: " . $query_update;
      die();
    }
  }

  else if (isset($_GET['hapus'])) {   // hapus barang
  $query = "DELETE from tb_barang WHERE kode_barang = '$_GET[hapus]'";
  $sql = mysqli_query($conn, $query);
    if($sql){
        echo "<script>location=('barang.php');</script>";
    }else{
      echo "Error: " .$query;
      die();
    }

  }

  else if(isset($_POST['simpan_kategori'])){ //simpan kategori
    $kd  = $_POST['kode_kategori'];
    $nk  = $_POST['nama_kategori'];
    $query = "INSERT INTO tb_kategori VALUES ('$kd','$nk')";
    $sql = mysqli_query($conn, $query);
    if($sql){
      echo "<script>location=('kategori.php')</script>";
    }else{
      echo "Error: " . $query;
      die();
    }
  }


  else if(isset($_POST['edit_kategori'])) { // edit kategori
    $kd  = $_POST['edit-kode1'];
    $nm  = $_POST['edit-nama2'];
      $query_update = "UPDATE tb_kategori SET nama_kategori = '$nm' WHERE id_kategori = '$kd'";
      $sql_update = mysqli_query($conn,$query_update);
      if($sql_update){
      echo "<script> location=('kategori.php');</script>";
    }else{
      echo "Error: " . $query_update;
      die();
    }
  }

  elseif (isset($_GET['hapus_kategori'])) { // hapus kategori
  $query = "DELETE from tb_kategori WHERE id_kategori = '$_GET[hapus_kategori]'";
  $sql = mysqli_query($conn, $query);
  if($sql){
  echo "<script>location=('kategori.php');</script>";
    }else{
      echo "Error: " .$query;
      die();
    }

  }

  elseif(isset($_POST['simpan_petugas'])){ //simpan karyawan
    $id = NULL;
    $mi  = $_POST['username'];
    $la   = md5($_POST['password']);  
    $nma  = $_POST['level'];
    $query = "INSERT INTO tb_login VALUES ('$id','$mi','$la','$nma')";
    $sql = mysqli_query($conn, $query);
    if($sql){
      echo "<script>location=('user.php')</script>";
    }else{
      echo "Error: " . $query;
      die();
    }
  }

  elseif (isset($_POST['edit_petugas'])) { // edit karyawan

      $id1    =$_POST  ['idlogin'];
      $user  = $_POST['edit-user'];
      $passwod =md5($_POST['edit-password']);
      $nama  = $_POST['edit-level'];
      $query_update = "UPDATE tb_login set username ='$user', password='$passwod', level='$nama' WHERE idlogin = '$id1'";
      $sql_update = mysqli_query($conn,$query_update);
      if($sql_update){
          echo "<script> location=('user.php');</script>";
      }else{
          echo "Error: " . $query_update;
          die();
      }
  }

  elseif (isset($_GET['hapus_petugas'])) { // hapus karyawan
  $query = "DELETE from tb_login WHERE idlogin= '$_GET[hapus_petugas]'";
  $sql = mysqli_query($conn, $query);
  if($sql){
        echo "<script>location=('user.php');</script>";
    }else{
      echo "Error: " .$query;
      die();
    }

  }

  else if(isset($_POST['simpan_register'])) {  // simpan registrasi
   $nik  =$_POST['nik']; 
   $user =$_POST['username'];
   $pw   =$_POST['password'];
   $nm   =$_POST['level'];
    $query = "INSERT INTO tb_login VALUES ('$nik','$user','$pw','$nm')";
    $sql = mysqli_query($conn, $query);
    if($sql){
      echo "<script>alert('Success');location=('../index.php');</script>";
    }else{
      echo "Error: " . $query;
      die();
    }
  }

  else if(isset($_POST['simpan_satuan'])){ //simpan satuan
    $satuan  = $_POST['nama_satuan']; 
    $query   = "INSERT INTO tb_satuan_barang VALUES ('','$satuan')";
    $sql    = mysqli_query($conn, $query);
    if($sql){
      echo "<script>location=('satuan.php')</script>";
    }else{
      echo "Error: " . $query;
      die();
    }
  }


  else if(isset($_POST['edit_satuan'])) { // edit satuan
      $id1    =$_POST  ['id_satuan'];
      $edit  = $_POST['edit-satuan'];   
      $query_update = "UPDATE tb_satuan_barang SET nama_satuan = '$edit' WHERE Id ='$id1'";
      $sql_update = mysqli_query($conn,$query_update);
      if($sql_update){
      echo "<script> location=('satuan.php');</script>";
    }else{
      echo "Error: " . $query_update;
      die();
    }
  }

  elseif (isset($_GET['hapus_satuan'])) { // hapus satuan
  $query = "DELETE from tb_satuan_barang WHERE Id = '$_GET[hapus_satuan]'";
  $sql = mysqli_query($conn, $query);
  if($sql){
        echo "<script>location=('satuan.php');</script>";
    }else{
      echo "Error: " .$query;
      die();
    }

  }
    else if(isset($_POST['simpan_supplier'])){ //simpan supplier
    $kode1    = $_POST['kode'];
    $kode     = $_POST['nama_supplier'];
    $alamat    = $_POST['alamat'];
    $kota      = $_POST['kota'];
    $tlpn      = $_POST['tlpn'];    
    $query  = "INSERT INTO tb_supplier VALUES ('$kode1','$kode','$alamat','$kota','$tlpn')";
    $sql    = mysqli_query($conn, $query);
    if($sql){
      echo "<script>location=('suplier.php')</script>";
    }else{
      echo "Error: " . $query;
      die();
    }
  }


  else if(isset($_POST['edit_supplier'])) { // edit supplier
      $id1       =$_POST  ['edit-kode'];
      $edit1    = $_POST['edit-supplier'];
      $edit2    = $_POST['edit-alamat1'];
      $edit3    = $_POST['edit-kota'];
      $edit4    = $_POST['edit-tlp'];   
      $query_update = "UPDATE tb_supplier SET nama_supplier = '$edit1', alamt_supplier ='$edit2', kota ='$edit3' , tlpn_supplier ='$edit4' WHERE  kode_supplier='$id1'";
      $sql_update = mysqli_query($conn,$query_update);
      if($sql_update){
      echo "<script> location=('suplier.php');</script>";
    }else{
      echo "Error: " . $query_update;
      die();
    }
  }

  elseif (isset($_GET['hapus_supplier'])) { // hapus supplier
  $query = "DELETE from tb_supplier WHERE kode_supplier = '$_GET[hapus_supplier]'";
  $sql = mysqli_query($conn, $query);
  if($sql){
        echo "<script>location=('suplier.php');</script>";
    }else{
      echo "Error: " .$query;
      die();
    }

  }
  else if(isset($_POST['simpan_stok'])){ //simpan stok
    $barang     = $_POST['barang'];
    $kategori   = $_POST['kategori'];
    $nama       = $_POST['supplier'];   
    $query  = "INSERT INTO tb_stok VALUES ('','$barang','$kategori','$nama','0')";
    $sql    = mysqli_query($conn, $query);
    if($sql){
      echo "<script>location=('icomming.php')</script>";
    }else{
      echo "Error: " . $query;
      die();
    }
  }


  else if(isset($_POST['edit_stok'])) { // edit supplier
      $kd    =$_POST['id_satuan'];
      $naba  = $_POST['edit-barang'];
      $kt    = $_POST['edit-kategori'];
      $supplier    = $_POST['edit-supplier'];   
      $query_update = "UPDATE tb_stok SET kode_barang = '$naba',id_kategori='$kt',kode_supplier='$supplier' WHERE  id_stok='$kd'";
      $sql_update = mysqli_query($conn,$query_update);
      if($sql_update){
      echo "<script> location=('icomming.php');</script>";
    }else{
      echo "Error: " . $query_update;
      die();
    }
  }

  elseif (isset($_GET['hapus_stok'])) { // hapus supplier
  $query = "DELETE from tb_stok WHERE id_stok = '$_GET[hapus_stok]'";
  $sql = mysqli_query($conn, $query);
  if($sql){
        echo "<script>location=('icomming.php');</script>";
    }else{
      echo "Error: " .$query;
      die();
      }

  }
  elseif(isset($_POST['simpan_indetitas'])){ //simpan indetitas
    $id       = NULL;
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $alamat   = $_POST['alamat'];
    $tlpn     = $_POST['tlpn'];  
    $nma      = $_POST['keterangan'];
    $no       = $_POST['notif'];
   $query     = "INSERT INTO tb_indetitas VALUES ('$id','$nama','$email','$alamat','$tlpn','$nma','$no')";
    $sql = mysqli_query($conn, $query);
    if($sql){
      echo "<script>location=('indetitas.php')</script>";
    }else{
      echo "Error: " . $query;
      die();
    }
  }
  else if(isset($_POST['edit_indetitas1'])) { // edit indetitas
      $id       = $_POST['id_indetitas'];
      $idet      =$_POST['edit-indetitas'];
       $email   =$_POST['edit-email'];
      $almt     = $_POST['edit-alamat'];
      $tlp      = $_POST['edit-tlpn'];
      $kt       = $_POST['edit-keterangan'];
      $no       = $_POST['edit-notif'];   
      $query_update = "UPDATE tb_indetitas SET nama_indetitas = '$idet',email= '$email', alamat_indetitas='$almt', tlp='$tlp',keterangan='$kt', notifikasi = '$no'  WHERE  Id_indetitas = '$id'";
      $sql_update = mysqli_query($conn,$query_update);
      if($sql_update){
      echo "<script> location=('indetitas.php');</script>";
    }else{
      echo "Error: " . $query_update;
      die();
    }
  }
  elseif (isset($_GET['hapus_indetitas'])) { // hapus indetitas
  $query = "DELETE from tb_indetitas WHERE Id_indetitas = '$_GET[hapus_indetitas]'";
  $sql = mysqli_query($conn, $query);
  if($sql){
        echo "<script>location=('indetitas.php');</script>";
    }else{
      echo "Error: " .$query;
      die();
      }

  }

   else if(isset($_POST['simpan_pelanggan'])){ //simpan pelanggan
    $kode1    = $_POST['kode'];
    $kode     = $_POST['nama_pelanggan'];
    $alamat    = $_POST['alamat'];
    $kota      = $_POST['kota'];
    $email      = $_POST['email'];
    $tlpn      = $_POST['tlpn'];    
    $query  = "INSERT INTO tb_pelanggan VALUES ('$kode1','$kode','$alamat','$email','$kota','$tlpn')";
    $sql    = mysqli_query($conn, $query);
    if($sql){
      echo "<script>location=('pelanggan.php')</script>";
    }else{
      echo "Error: " . $query;
      die();
    }
  }
  else if(isset($_POST['edit_pelanggan'])) { // edit pelanggan
      $id1       =$_POST  ['edit-pelanggan'];
      $edit1    = $_POST['edit-nama'];
      $edit2    = $_POST['edit-alamat'];
      $edit3    = $_POST['edit-kota'];
      $edit4    = $_POST['edit-email'];
      $edit5    = $_POST['edit-tlp'];   
      $query_update = "UPDATE tb_pelanggan SET nama_pelanggan = '$edit1', alamat_pelanggan ='$edit2', kota_pelanggan ='$edit3' , email_pelanggan ='$edit4',tlp_pelanggan ='$edit5' WHERE  kode_pelanggan='$id1'";
      $sql_update = mysqli_query($conn,$query_update);
      if($sql_update){
      echo "<script> location=('pelanggan.php');</script>";
    }else{
      echo "Error: " . $query_update;
      die();
    }
  }

elseif (isset($_GET['hapus_pelanggan'])) { // hapus pelanggan
  $query = "DELETE from tb_pelanggan WHERE kode_pelanggan = '$_GET[hapus_pelanggan]'";
  $sql = mysqli_query($conn, $query);
  if($sql){
        echo "<script>location=('pelanggan.php');</script>";
    }else{
      echo "Error: " .$query;
      die();
      }

    } 

 else if(isset($_POST['add_simpan'])){ //simpan pelanggan
    $id   =$_POST['id'];
    $tgl   = $_POST['tanggal_masuk'];
    $stok    = $_POST['stok'];  
    $query  = "UPDATE tb_stok set tgl_masuk='$tgl', stok='$stok' where kode_stok='$id'";
    $sql    = mysqli_query($conn, $query);
    if($sql){
      echo "<script>location=('stok.php')</script>";
    }else{
      echo "Error: " . $query;
      die();
    }
  }

 

?>



