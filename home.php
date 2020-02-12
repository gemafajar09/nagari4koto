<?php
    $data = $kon->query("SELECT * FROM `tb_berita` ORDER BY tgl_posting DESC LIMIT 1");
    $a = $data->fetch_array();
    $berita = substr(strip_tags($a['isiberita']),0 ,350 );
?>
<div class="jumbotron">
    <a href="?page=selanjutnya&seo=<?= $a['judul_seo'] ?>"><h4><b><?= $a['judul'] ?></b></h4></a>
    <p class="btn btn-success"><i class="fas fa-user"><?= $a['posting_by'] ?></i></p>
    <div class="row">
            <div class="col-md-2">
                <img src="asset/images/<?= $a['gambar'] ?>" width="130px" height="80px" alt="NO Images Source">
            </div>
            <div class="col-md-8">
                <i><?= $berita ?>..... <a href="?page=selanjutnya&seo=<?= $a['judul_seo'] ?>">Selengkapnya</a></i>
            </div>
        </div>
</div>
<hr><h3>Berita Terkini</h3><hr>
<?php
    $halaman = 5;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
    $result = $kon->query("SELECT * FROM `tb_berita` ORDER BY tgl_posting DESC");
    $total = mysqli_num_rows($result);
    $pages = ceil($total/$halaman);  
    $data1 = $kon->query("SELECT * FROM `tb_berita` ORDER BY tgl_posting DESC LIMIT $mulai, $halaman");
    $no =$mulai+1;
    
?>
<nav aria-label="Page navigation example" style="position:center">
    <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>  
    <?php for ($i=1; $i<=$pages ; $i++){ ?>
        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php } ?>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>
<?php foreach($data1 as $a){ ?>
<div class="card">
    <div class="card-body">
        <a href="?page=selanjutnya&seo=<?= $a['judul_seo'] ?>"><h5><b><?= $a['judul'] ?></b></h5></a>
        <p class="btn btn-success"><i class="fas fa-user"><?= $a['posting_by'] ?></i></p>
        <div class="row">
            <div class="col-md-2">
                <img src="asset/images/<?= $a['gambar'] ?>" width="130px" height="80px" alt="NO Images Source">
            </div>
            <div class="col-md-8">
                <i><?= $berita ?>..... <a href="?page=selanjutnya&seo=<?= $a['judul_seo'] ?>">Selengkapnya</a></i>
            </div>
        </div>
    </div>
</div>
    <?php } ?>
    <nav aria-label="Page navigation example" style="position:center">
        <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>  
        <?php for ($i=1; $i<=$pages ; $i++){ ?>
            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php } ?>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
