<div class="row">
    <div class="col-md-12">

        <!-- <center>
            <canvas id="canvas" width="200" height="200" style="background-color:transparent"></canvas>
        </center> -->
        <div class="card">
            <div class="card-header">
                <i>Jumlah Kunjungan</i>
            </div>
            <div class="card-body">
                <div id="kunjungan"></div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <i>Peta Desa</i>
            </div>
            <div class="card-body">
            <center>
            <table class="table-responsive">
                <tr>
                    <td>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255264.37751727895!2d100.34403322022385!3d-1.4696356090874505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd3484cd12f42d3%3A0x6c02aaf6fcb8e1c6!2sIv%20Koto%20Hilie%2C%20Batang%20Kapas%2C%20Kabupaten%20Pesisir%20Selatan%2C%20Sumatera%20Barat!5e0!3m2!1sid!2sid!4v1580784318649!5m2!1sid!2sid" width="380px" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </td>
                </tr>
            </table>
            
            </center>
            
            </div>
        </div>
        <div class="box">
            <box class="body">
                
                <div id="idx-calendar">
                    <div id="calendar-control">
                        <div id="monthNow">Januari 2014</div>
                        <div id="nextMonth"></div>
                        <div id="prevMonth"></div>
                    </div>
                    <div id="dayNames">
                        <ul></ul>
                    </div>
                    <div id="daysNum"></div>
                </div>
                    <hr>
                    <link href="kalender.css" type="text/css" rel="stylesheet">
                <?php 
                    include "visitor/jam.php";
                    include "visitor/kalender.php";
                ?>
            </box>
        </div>
        <div class="card">
            <div class="card-header">
                <i>Tautan</i>
            </div>
            <div class="card-body">
                <?php
                    $data = $kon->query("SELECT * FROM tb_tautan");
                    foreach($data as $a)
                    { ?>
                        <a href="<?= $a['link'] ?>" class="btn btn-success btn-block"><?= $a['judul'] ?></a>
                <?php } ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <i>Kontak</i>
            </div>
            <div class="card-body">
<div class="row">
<?php $data = $kon->query("SELECT fb.link as fb,ig.link as ig,twitter.link as tw,youtube.link as yt FROM fb,ig,twitter,youtube");
$a = $data->fetch_array();
?>
    <div class="col-md-3">
        <a href="<?= $a['tw'] ?>" style="padding: 20px;font-size: 30px;width: 50px;text-align: center;text-decoration: none;margin: 5px 2px;" class="fa fa-twitter"></a>
    </div>
    <div class="col-md-3">
        <a href="<?= $a['fb'] ?>" style="padding: 20px;font-size: 30px;width: 50px;text-align: center;text-decoration: none;margin: 5px 2px;" class="fa fa-facebook"></a>
    </div>
    <div class="col-md-3">
        <a href="<?= $a['ig'] ?>" style="padding: 20px;font-size: 30px;width: 50px;text-align: center;text-decoration: none;margin: 5px 2px;" class="fa fa-instagram"></a>                
    </div>
    <div class="col-md-3">
        <a href="<?= $a['yt'] ?>" style="padding: 20px;font-size: 30px;width: 50px;text-align: center;text-decoration: none;margin: 5px 2px;" class="fa fa-google"></a>                
    </div>
</div>
            </div>
        </div>
    </div>
</div>