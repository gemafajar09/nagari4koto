<?php
$data = $kon->query("SELECT * FROM lpm WHERE kategori='pkk' LIMIT 1");
$a = $data->fetch_array();
?>
<div class="jumbotron">
    <center>
    	<h3>PKK</h3>
        <?= $a['deskripsi'] ?>
    </center>
</div>

<?php
include_once "komentar.php";
?>