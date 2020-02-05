<?php
include '../../koneksi.php';
?>
<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahalamat":

        if (isset($_POST['save1'])) {
          $save = mysqli_query($kon, "INSERT INTO alamat (idalamat,alamat) VALUES ('','$_POST[alamat]')");
          if ($save) {
            echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=kontak/alamatbawaslu';
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
            Alamat
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Alamat</li>
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
                        <label for="des" class="col-sm-2 control-label">Alamat Bawaslu</label>
                        <div class="col-sm-8">
                          <input name="alamat" type="text" class="form-control">
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
      case "editalamat":
        if (isset($_GET['idalamat'])) {
          $sql = mysqli_query($kon, "SELECT * FROM alamat where idalamat='$_GET[idalamat]'");
          $data = mysqli_fetch_assoc($sql);
        }
        if (isset($_POST['save'])) {

          $save = mysqli_query($kon, "UPDATE alamat set alamat='$_POST[alamat]' where idalamat='$_GET[idalamat]'");
          if ($save) {
            echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=kontak/alamatbawaslu';
              </script>";
          } else {
            echo "<script>alert('Gagal');
              </script>";
          }
        }
      ?>
        <section class="content-header">
          <h1>
            Alamat
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Alamat</li>
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
                        <label for="des" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-8">
                          <input name="idalamat" type="hidden" id="des" class="form-control" value="<?= $data['idalamat'] ?>">
                          <input name="alamat" id="des" class="form-control" value="<?= $data['alamat'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=kontak/alamatbawaslu" class="btn btn-primary btn-flat">Kembali</a>
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
      case "hapusalamat":

        if (isset($_GET['idalamat'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM alamat where idalamat='$_GET[idalamat]'"));

          $del = mysqli_query($kon, "DELETE FROM alamat where idalamat='$_GET[idalamat]'");
          if ($del) {
            echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=kontak/alamatbawaslu';
    				  </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=kontak/alamatbawaslu';
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