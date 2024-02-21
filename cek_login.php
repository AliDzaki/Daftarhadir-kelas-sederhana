<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from user where nama_pengguna='$username' and pasword='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);


 
// cek apakah username dan password di temukan pada database
if($cek > 0){
  
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['role']=="Absensi"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "Absensi";
		// alihkan ke halaman dashboard admin
		header("location:Adm/index.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['role']=="siswa"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "siswa";
		
		// alihkan ke halaman dashboard pegawai
		header("location:User/index.php");
 
	// cek jika user login sebagai pengurus
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan1=gagal1");
	}	
}else{
	header("location:index.php?pesan1=gagal1");
}


 
?>