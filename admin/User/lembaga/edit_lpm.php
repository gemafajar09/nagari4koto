<?php
include_once "../../koneksi.php";
if (isset($_POST['save'])) {
    $kat       = $_POST['kategori'];
    $id = $_POST['id_profil'];

    // echo "UPDATE tb_profil set kategori='$kat', deskripsi='$_POST[deskripsi]' where id_profil='$id_profil'";
    // exit;
    $save = mysqli_query($kon, "UPDATE lpm set kategori='$kat', deskripsi='$_POST[deskripsi]' where id='$id'");
    if ($save) {
        echo "<script>
      alert('Edit Data Berhasil');
      window.location='../index.php?module=lembaga/lpm';
        </script>";
    } else {
        echo "<script>alert('Gagal');
        </script>";
    }
}
