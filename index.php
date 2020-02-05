<?php
include "admin/koneksi.php";
include "menu/tgl_indo.php";

    $ip = $_SERVER['REMOTE_ADDR'];
    $tanggal = date("Ymd");
    $waktu   = time();
          
         $s = $kon->query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
         
         if(mysqli_num_rows($s) == 0){
            $kon->query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
         }
         else{
            $kon->query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
         }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="asset/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="visitor/kalender.css">
    <title>Nagari 4 Koto Hilie</title>
</head>
<style>
.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('asset/load/load.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
    animation: mymove 1.5s infinite alternate;
}
</style>
<body>
<div class="loader" id="loader"></div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="asset/images/hilie.png" width="60">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?page=menu/visi">Visi & Misi</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Sejarah</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Tugas & Wewenang</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Struktur Organisasi</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=menu/agenda">Agenda</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#">Galery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Kontak</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">PPID</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="info" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Informasi</a>
        <div class="dropdown-menu" aria-labelledby="info">
          <a class="dropdown-item" href="?page=menu/visi">Visi & Misi</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Sejarah</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Tugas & Wewenang</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Struktur Organisasi</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!-- Slider -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="asset/images/slide1.jpg" height="400px" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="asset/images/slide2.jpg" height="400px" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- content -->
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-md-8">
        <?php
        if(!empty($_GET["page"])){
            include_once($_GET["page"].".php");
        }else{
            include "home.php";
        }
        ?>
        </div>
        <div class="col-md-4">
            <?php 
                include_once "menu/menu.php";
            ?>
        </div>
    </div>
</div>

<footer style="background-color:gray;">
        <div class="row">
          <div class="col-md-12">
              <input type="hidden" id="tanggal" value="<?= date('Y-m-d') ?>">
          </div>
        </div>
</footer>
<!-- script -->
<script src="asset/js/jquery.js"></script>
<script src="asset/bootstrap/js/bootstrap.min.js"></script>
<script>
setInterval(kunjungan, 5);
function kunjungan() {
  var tanggal = document.getElementById('tanggal').value;
   $.ajax({
      type: 'POST',
      url: 'visitor/tampil_visitor.php',
      data: 'tanggal='+ tanggal,
      success: function(data){
       $('#kunjungan').html(data);
       console.log(tanggal)
      // alert(tanggal)
      },
      error : function(){
        alert('Kesalahan Dalam Menambil data')
      }
   }) 
}


$(document).ready(function(){
loading()
function loading() {
var time = setTimeout(show, 1000);
}
function show() {
document.getElementById("loader").style.display = "none";

}

})
</script>
</body>
</html>