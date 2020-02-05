<?php
$seo = $_GET['seo'];
 $data = $kon->query("SELECT * FROM `tb_berita` WHERE judul_seo='$seo'");
 $a = $data->fetch_array();
?>
<div class="jumbotron">
<a href=""><h4><b><?= $a['judul'] ?></b></h4></a>
    <p class="btn btn-success"><i class="fas fa-user"><?= $a['posting_by'] ?></i></p>
    <p>
        <img src="asset/images/<?= $a['gambar'] ?>" width="130px" height="80px" alt="NO Images Source">
        <i><?= $a['isiberita'] ?></i>
    </p>
</div>
<?php
include_once "komentar.php";
?>