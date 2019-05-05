<?php
include '../pages/header.php';
$id = $_GET['hapus'];
// mengambil id yang telah dipilih 
$hapus=mysqli_query($conn,"delete from tb_detail_jual where id_detail='$id'");
//menghapus data yang dipilih dari database 
if ($hapus)//jika berhasil dihapus
{
        {?><script language="javascript">
      alert("Batal Transaksi");
       window.location = "Transaksi3.php"
      </script><?php }
  
        }
else //jika gagal
{
        {?><script language="javascript">
      alert("Failture");
        window.location = "Transaksi3.php"
      </script><?php }
  
        }
?>