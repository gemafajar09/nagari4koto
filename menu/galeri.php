<div class="jumbotron">
    <center><h3>Galery</h3></center>

    <div class="row">
    <?php 
    $data = $kon->query("SELECT * FROM tb_galeri");
    foreach($data as $a){ ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <img src="asset/images/<?= $a['foto'] ?>" height="300px">
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>