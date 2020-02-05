<?php
include '../koneksi.php';
?>
<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahkota":

        if (isset($_POST['save1'])) {
          $save = mysqli_query($kon, "INSERT INTO kota (idkota,namakota) VALUES ('','$_POST[namakota]')");
          if ($save) {
            echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=kontak/kota';
            </script>";
            exit;
          } else {
            echo "<script>alert('Gagal');
            </script>";
          }
        }
  ?>
        <section class="content-header">
          <h1>
            Kota
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Kota</li>
          </ol>
        </section>
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header with-border">

                </div>
                <!-- form start -->
                <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="col-sm-12">

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Kota</label>
                        <div class="col-sm-8">
                          <input name="namakota" type="text" class="form-control">
                        </div>
                      </div>



                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save1" class="btn btn-primary btn-flat">Simpan</button>
                        </div>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </section>


      <?php
        break;
      case "editkota":
        if (isset($_GET['idkota'])) {
          $sql = mysqli_query($kon, "SELECT * FROM kota where idkota='$_GET[idkota]'");
          $data = mysqli_fetch_assoc($sql);
        }
        if (isset($_POST['save'])) {

          $save = mysqli_query($kon, "UPDATE kota set namakota='$_POST[namakota]' where idkota='$_GET[idkota]'");
          if ($save) {
            echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=kontak/kota';
              </script>";
          } else {
            echo "<script>alert('Gagal');
              </script>";
          }
        }
      ?>
        <section class="content-header">
          <h1>
            Kota
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Kota</li>
          </ol>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header with-border">

                </div>

                <!-- form start -->
                <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Kota</label>
                        <div class="col-sm-8">
                          <input name="idkota" type="hidden" id="des" class="form-control" value="<?= $data['idkota'] ?>">
                          <input name="namakota" id="des" class="form-control" value="<?= $data['namakota'] ?>">
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=kontak/kota" class="btn btn-primary btn-flat">Kembali</a>
                        </div>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      <?php
        break;
      case "hapuskota":

        if (isset($_GET['idkota'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM kota where idkota='$_GET[idkota]'"));

          $del = mysqli_query($kon, "DELETE FROM kota where idkota='$_GET[idkota]'");
          if ($del) {
            echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=kontak/kota';
    				  </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=kontak/kota';
              </script>";
          }
        }
      ?>
  <?php
        break;
    }
  }
  ?>
</div>