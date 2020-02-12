<?php
$data = $kon->query("SELECT * FROM tb_profil WHERE kategori='sejarah' LIMIT 1");
$a = $data->fetch_array();
?>
<div class="jumbotron">
    <center>
        <h3>Sejarah</h3>
    </center>
        <?= $a['deskripsi'] ?>
</div>
