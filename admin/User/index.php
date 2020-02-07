<?php
@session_start();
include "../koneksi.php";
// include "../../config/my_fungsi.php";

$logohitam = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM logo WHERE kategori='HITAM'"));
$logoputih = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM logo WHERE kategori='PUTIH'"));
error_reporting(0);
?>
<?php
if (!$_SESSION['id']) {
  header('Location: ../login.php');
} else {

?>

  <!-- /*Create Nopen rianto - date 2017-06-02 */ -->
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../../img/icon.png" />
    <title>Administrator</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/datatables.min.css" />
    <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="../assets/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../assets/select2/dist/css/select2.min.css">

  </head>

  <body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
      <div class="logo">
        <img src="../../img/logo/<?= $logohitam['img_logo'] ?>" style="margin-left: 30px; margin-top: 5px; width: 150px;">
        <span class="nm-sek"></span>
      </div>
      <header class="main-header">
        <!-- Logo -->
        <div href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Adm</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Selamat Datang</b></span>
        </div>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->


              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../assets/images/user.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['namalengkap']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../assets/images/user.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['namalengkap']; ?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">

                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="index.php" class="btn btn-default btn-flat"><i class="fa fa-user"> Profil</i></a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out"> Keluar</i></a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="margin-top: 60px;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../assets/images/user.png" class="img-rounded" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['namalengkap']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li>
              <a href="?module=home">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Kontak</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li>
                  <a href="?module=kontak/alamatbawaslu">
                    <i class="fa fa-map-marker"></i> <span>Alamat Bawaslu</span>
                  </a>
                </li>

                <li>
                  <a href="?module=kontak/notelp">
                    <i class="fa fa-phone"></i> <span>No Telp</span>
                  </a>
                </li>

                <li>
                  <a href="?module=kontak/emailbawaslu">
                    <i class="fa fa-envelope-o"></i> <span>Email</span>
                  </a>
                </li>

                <li>
                  <a href="?module=kontak/fbbawaslu">
                    <i class="fa fa-facebook"></i> <span>Facebook</span>
                  </a>
                </li>

                <li>
                  <a href="?module=kontak/igbawaslu">
                    <i class="fa fa-instagram"></i> <span>Instagram</span>
                  </a>
                </li>

                <li>
                  <a href="?module=kontak/youtube">
                    <i class="fa fa-youtube"></i> <span>Youtube</span>
                  </a>
                </li>

                <li>
                  <a href="?module=kontak/twitter">
                    <i class="fa fa-twitter"></i> <span>Twitter</span>
                  </a>
                </li>

                <li>
                  <a href="?module=kontak/kota">
                    <i class="fa fa-building"></i> <span>Kota</span>
                  </a>
                </li>

              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Galeri</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="?module=galeri/albumbawaslu">
                    <i class="fa fa-image"></i> <span>Album</span>
                  </a>
                </li>

                <li>
                  <a href="?module=galeri/galeribawaslu">
                    <i class="fa fa-image"></i> <span>Foto</span>
                  </a>
                </li>
              </ul>
            </li>


            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Profil Bawaslu</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="?module=profil/profilbawaslu">
                    <i class="fa fa-info"></i> <span>Profil</span>
                  </a>
                </li>

                <li>
                  <a href="?module=profil/org">
                    <i class="fa fa-info"></i> <span>Struktur Organisasi</span>
                  </a>
                </li>

                <li>
                  <a href="?module=profil/komisioner">
                    <i class="fa fa-user"></i> <span>Komisioner</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Informasi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="?module=informasi/agenda">
                    <i class="fa fa-files-o"></i> <span>Agenda</span>
                  </a>
                </li>

                <!-- <li>
                  <a href="?module=informasi/event">
                    <i class="fa fa-info"></i> <span>Jadwal Event</span>
                  </a>
                </li> -->

                <li>
                  <a href="?module=informasi/pengumuman">
                    <i class="fa fa-thumb-tack"></i> <span>Informasi Bawaslu</span>
                  </a>
                </li>

                <li>
                  <a href="?module=informasi/informasipublik">
                    <i class="fa fa-thumb-tack"></i> <span>Informasi Publik</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Lembaga Masyarakat</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li>
                  <a href="?module=lemmas/lpmbawaslu">
                    <i class="fa fa-user"></i> <span>LPM</span>
                  </a>
                </li>

                <li>
                  <a href="?module=lemmas/notelp">
                    <i class="fa fa-user"></i> <span>Karang Taruna</span>
                  </a>
                </li>

                <li>
                  <a href="?module=lemmas/emailbawaslu">
                    <i class="fa fa-user"></i> <span>PKK</span>
                  </a>
                </li>

              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Data Desa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <li>
                  <a href="?module=alamatbawaslu">
                    <i class="fa fa-file"></i> <span>Data Wilayah Administratif</span>
                  </a>
                </li>

                <li>
                  <a href="?module=notelp">
                    <i class="fa fa-file"></i> <span>Data Pendidikan</span>
                  </a>
                </li>

                <li>
                  <a href="?module=emailbawaslu">
                    <i class="fa fa-file"></i> <span>Data Pekerjaan</span>
                  </a>
                </li>

                <li>
                  <a href="?module=emailbawaslu">
                    <i class="fa fa-file"></i> <span>Data Jenis Kelamin</span>
                  </a>
                </li>

                <li>
                  <a href="?module=emailbawaslu">
                    <i class="fa fa-file"></i> <span>Data Golongan Darah</span>
                  </a>
                </li>

                <li>
                  <a href="?module=emailbawaslu">
                    <i class="fa fa-file"></i> <span>Data Kelompok Umur</span>
                  </a>
                </li>

                <li>
                  <a href="?module=emailbawaslu">
                    <i class="fa fa-file"></i> <span>Data Perkawinan</span>
                  </a>
                </li>

              </ul>
            </li>

            <li>
              <a href="?module=berita/berita">
                <i class="fa fa-files-o"></i> <span>Berita</span>
              </a>
            </li>


            <li>
              <a href="?module=ppid/ppidbawaslu">
                <i class="fa fa-thumb-tack"></i> <span>PPID</span>
              </a>
            </li>




            <li>
              <a href="?module=video">
                <i class="fa fa-toggle-right"></i> <span>Video</span>
              </a>
            </li>



            <li>
              <a href="?module=tautan/tautan">
                <i class="fa fa-tag"></i> <span>Tautan</span>
              </a>
            </li>

            <!-- <li>
              <a href="?module=bukusakubawaslu">
                <i class="fa fa-book"></i> <span>Buku Saku Bawaslu </span>
              </a>
            </li>

            <li>
              <a href="?module=perbawalusterbaru">
                <i class="fa fa-book"></i> <span>Perbawaslu Terbaru </span>
              </a>
            </li> -->

            <li>
              <a href="?module=slider/sliderbawaslu">
                <i class="fa fa-image"></i> <span>Slider </span>
              </a>
            </li>

            <li>
              <a href="?module=logo">
                <i class="fa fa-image"></i> <span>Logo </span>
              </a>
            </li>

            <li>
              <a href="logout.php">
                <i class="fa fa-sign-out"></i> <span>Logout</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <content>
        <?php include "content.php"; ?>
      </content>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b>
        </div>
        &copy; Copyright <?php echo date('Y');  ?> CV. Mediatama Web Indonesia
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark" style="top:50px;">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
          </div>
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../assets/js/jquery-1.10.2.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../assets/js/datatables.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/js/backtoTop.js"></script>
    <script src="../assets/ckeditor/ckeditor.js"></script>
    <script src="../assets/select2/dist/js/select2.full.min.js"></script>
    <script>
      $(function() {
        $('.textarea').wysihtml5();
        $('.select2').select2();
        $('#datepicker').datepicker({
          autoclose: true
        });

        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });

        CKEDITOR.replace('editor');
      });
    </script>
  </body>

  </html>
<?php
}
?>