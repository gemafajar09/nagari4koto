<?php
include "koneksi.php";
$user = $_POST['username'];
$pass = md5($_POST['password']);

$sql	= $kon->query("SELECT * FROM tb_admin WHERE username = '$user'");
$cek = $sql->fetch_assoc();

if ($cek['username'] == $user) {
	if ($cek['password'] == $pass) {
		// var_dump($cek);
		// exit;
		session_start();
		$_SESSION['id']			   = $cek['idadmin'];
		$_SESSION['username']	   = $cek['username'];
		$_SESSION['password']	   = $cek['password'];
		$_SESSION['namalengkap']   = $cek['namalengkap'];

		echo "<script>
			alert('Selamat Datang $_SESSION[namalengkap]');
			window.location='User/index.php';
			</script>";
	} else {
		echo "<script>
                alert('Password atau username anda salah !');
                window.location='login.php';
            </script>";
	}
} else {
	echo "<script>
                alert('Password atau username anda salah !');
                window.location='login.php';
            </script>";
}
