<?php
include_once "../../koneksi.php";
if (isset($_POST['save'])) {
    $kat       = $_POST['kategori'];
    $id_profil = $_POST['id_profil'];

    // echo "UPDATE tb_profil set kategori='$kat', deskripsi='$_POST[deskripsi]' where id_profil='$id_profil'";
    // exit;
    $save = mysqli_query($kon, "UPDATE tb_profil set kategori='$kat', deskripsi='$_POST[deskripsi]' where id_profil='$id_profil'");
    if ($save) {
        echo "<script>
      alert('Edit Data Berhasil');
      window.location='../index.php?module=profil/profilbawaslu';
        </script>";
    } else {
        echo "<script>alert('Gagal');
        </script>";
    }
}
