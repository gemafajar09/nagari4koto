<?php
$data = $kon->query("SELECT * FROM tb_profil LIMIT 1");
$a = $data->fetch_array();
?>
<div class="jumbotron">
    <center>
        <?= $a['deskripsi'] ?>
    </center>
</div>

<?php
include_once "komentar.php";
?>