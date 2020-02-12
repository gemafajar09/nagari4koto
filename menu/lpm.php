<?php
$data = $kon->query("SELECT * FROM lpm WHERE kategori='lpm' LIMIT 1");
$a = $data->fetch_array();
?>
<div class="jumbotron">
    <center>
    	<h3>LPM</h3>
    </center>
        <?= $a['deskripsi'] ?>
</div>