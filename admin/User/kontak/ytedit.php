<?php
include_once "../../koneksi.php";
if (isset($_POST['save'])) {
    $youtube    = $_POST['youtube'];
    $link       = $_POST['link'];
    $idyoutube  = $_POST['idyoutube'];

    $save       = mysqli_query($kon, "UPDATE youtube set youtube='$youtube', link='$link' where idyoutube='$idyoutube'");
    if ($save) {
        echo "<script>
        alert('Edit Data Berhasil');
        window.location = '../index.php?module=kontak/youtube';
    </script>";
    } else {
        echo "<script>
        alert('Gagal');
    </script>";
    }
}
