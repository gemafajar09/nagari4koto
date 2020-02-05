<?php
include_once "../../koneksi.php";
if (isset($_POST['save'])) {
    $fb   = $_POST['fb'];
    $link = $_POST['link'];
    $idfb = $_POST['idfb'];

    // echo "UPDATE fb set fb='$fb', link='$link' where idfb='$idfb'";
    // exit;
    $save = mysqli_query($kon, "UPDATE fb set fb='$fb', link='$link' where idfb='$idfb'");
    if ($save) {
        echo "<script>
      alert('Edit Data Berhasil');
      window.location='../index.php?module=kontak/fbbawaslu';
        </script>";
    } else {
        echo "<script>alert('Gagal');
        </script>";
    }
}
