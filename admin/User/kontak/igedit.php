<?php
include_once "../../koneksi.php";
if (isset($_POST['save'])) {
    $ig   = $_POST['ig'];
    $link = $_POST['link'];
    $idig = $_POST['idig'];

    // echo "UPDATE ig set ig='$ig', link='$link' where idig='$idig'";
    // exit;
    $save = mysqli_query($kon, "UPDATE ig set ig='$ig', link='$link' where idig='$idig'");
    if ($save) {
        echo "<script>
          alert('Edit Data Berhasil');
          window.location='../index.php?module=kontak/igbawaslu';
            </script>";
    } else {
        echo "<script>alert('Gagal');
            </script>";
    }
}
