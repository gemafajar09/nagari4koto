<?php
include_once "../../koneksi.php";
if (isset($_POST['save'])) {
    $twitter   = $_POST['twitter'];
    $link      = $_POST['link'];
    $idtwitter = $_POST['idtwitter'];

    $save = mysqli_query($kon, "UPDATE twitter set twitter='$twitter', link='$link' where idtwitter='$idtwitter'");
    if ($save) {
        echo "<script>
      alert('Edit Data Berhasil');
      window.location='../index.php?module=kontak/twitter';
        </script>";
    } else {
        echo "<script>alert('Gagal');
        </script>";
    }
}
