<?php
# Konek ke Web Server Lokal
include "../koneksi/koneksi.php";// nama database, disesuaikan dengan database di MySQL

# Konek ke Web Server Lokal
$konek	= mysql_connect($myHost, $myUser, $myPass);
if (! $konek) {
  echo "Failed Connection !";
}

# Memilih database pd MySQL Server
mysql_select_db($myDbs) or die ("Database not Found !");
?>