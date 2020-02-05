<?php
  $berita = mysqli_fetch_assoc(mysqli_query($kon, "SELECT COUNT(*) AS jberita FROM tb_berita"));
  $pengumuman = mysqli_fetch_assoc(mysqli_query($kon, "SELECT COUNT(*) AS jpengumuman FROM tb_pengumuman"));
  $agenda = mysqli_fetch_assoc(mysqli_query($kon, "SELECT COUNT(*) AS jagenda FROM tb_agenda"));
  $album = mysqli_fetch_assoc(mysqli_query($kon, "SELECT COUNT(*) AS jalbum FROM tb_album"));
  $carrier = mysqli_fetch_assoc(mysqli_query($kon, "SELECT COUNT(*) AS jcarrier FROM carrier"));
  $testimoni = mysqli_fetch_assoc(mysqli_query($kon, "SELECT COUNT(*) AS jtestimoni FROM testimoni"));

 ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">

                <div class="inner">
                  <h3><?= $berita['jberita'] ?></h3>
                  <p>Berita</p>
                </div>
                <div class="icon">
                  <i class="fa fa-question-circle"></i>
                </div>
                <a href="?module=berita" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">

                <div class="inner">
                  <h3><?= $pengumuman['jpengumuman'] ?></h3>
                  <p>Pengumuman</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <a href="?module=pengumuman" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">

                <div class="inner">
                  <h3><?= $agenda['jagenda'] ?></h3>
                  <p>Agenda</p>
                </div>
                <div class="icon">
                  <i class="fa fa-newspaper-o"></i>
                </div>
                <a href="?module=agenda" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">

                <div class="inner">
                  <h3><?= $album['jalbum'] ?></h3>
                  <p>Album</p>
                </div>
                <div class="icon">
                  <i class="fa fa-newspaper-o"></i>
                </div>
                <a href="?module=albumbawaslu" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
		</div>

    <?php 
      $tahun = date('Y');
      $sql = mysqli_query($kon, "SELECT MONTH(tanggal) as bulan, SUM(hits) AS tot FROM statistik WHERE YEAR(tanggal)='$tahun' GROUP BY bulan");

      $statistik = '';
      while($pecah = mysqli_fetch_assoc($sql)){

        $bulan = getBulan($pecah['bulan']);

        $statistik .= "{bulan:'".$bulan."', tot:".$pecah["tot"]."},";
      }

     ?>

    <div class="row">
        <div class="col-lg-12 col-xs-12">
          <div class="chart" id="bar-chart" style="height: 300px; width: 100%;"></div>
        </div>
    </div>

	</section>
</div>

<link rel="stylesheet" href="assets/a/morris/morris.css">
<script src="assets/a/jquery.min.js"></script>
<script src="assets/a/raphael.min.js"></script>
<script src="assets/a/morris/morris.min.js"></script>

    <script>
      $(function () {
        "use strict";

            var bar = new Morris.Bar({
            element: 'bar-chart',
            resize: true,
            data: [ <?php echo $statistik ?> ],
            xkey: ['bulan'],
            ykeys: ['tot'],
            labels: ['Total Pengunjung'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
          });
      });
    </script>
    
