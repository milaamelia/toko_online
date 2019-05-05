<?php
include '../config/koneksi.php';
	function from_local($from, $to, $subject, $message, $sender, $password)
	{
		$currentDir = getcwd();

		chdir('send');
		$kirim_email = shell_exec('sendEmail.exe -f '.$from.' -t '.$to.' -u '.escapeshellarg($subject).' -m '.escapeshellarg($message).' -s smtp.gmail.com:587 -xu '.$sender.' -xp '.escapeshellarg($password).' -o message-content-type=html message-charset=utf-8 tls=yes');
		chdir($currentDir);
		if ($kirim_email) {
			return true;
		}
		else {
			return false;
		}
	}
	$query1 = mysqli_query($conn, "SELECT * FROM tb_indetitas WHERE notifikasi= 'true'");
	$query = mysqli_query($conn, "SELECT * FROM tb_stok INNER JOIN tb_barang ON tb_barang.kode_barang=tb_stok.kode_barang WHERE stok <= 3");
	$message = "Stok yang kurang dari 3 (";
	while($stok = mysqli_fetch_array($query)) {
		$message.= $stok['nama_barang'].",";
	}
	$message.= ")";
	While($email =mysqli_fetch_array($query1)){
		if (from_local('inventoryibazaar21@gmail.com', $email['email'],'Hello Ibazaar',$message,'inventoryibazaar21@gmail.com','milaamelia')) {
		
		}
	}
	

?>	