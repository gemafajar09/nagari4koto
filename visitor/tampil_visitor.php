<?php
include_once "../admin/koneksi.php";
// $tanggal = $_POST['tanggal'];
// echo $tanggal; exit;
$tanggal = date('Y-m-d');
$tgl2 = date('Y-m-d', strtotime('-1 days', strtotime($tanggal)));
if(isset($_GET['tanggal']))
{
    $tanggal = $_GET['tanggal'];
    
}
$data = $kon->query("SELECT count(ip) as ip, sum(hits) as onlinee FROM `statistik` WHERE tanggal='$tanggal'");
$data1 = $kon->query("SELECT sum(hits) as onn FROM `statistik` WHERE tanggal='$tgl2'");

$count = mysqli_fetch_array($data);
$id = $count['ip'] ;
$online = $count['onlinee'];
$countt = mysqli_fetch_array($data1);
$on = $countt['onn']
?>
<div class="row">
    <div class="col-md-4">
        <b style="font-size:11px; color:red; text-align:center" class="fa fa-bullseye">Dilihat kemarin</b>
        <p style="text-align:center;"><?= $on ?></p>
    </div>
    <div class="col-md-4">
        <b style="font-size:11px; color:blue; text-align:center" class="fa fa-bullseye">Dilihat sekarang</b>
        <p style="text-align:center;"><?= $online ?></p>
    </div>
    <div class="col-md-4">
        <b style="font-size:11px; color:green; text-align:center" class="fa fa-bullseye">Online</b>
        <p style="text-align:center;"><?= $id ?></p>
    </div>
</div>