<?php
include '../koneksi.php';
?>
<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahnotelp":

        if (isset($_POST['save1'])) {
          $save = mysqli_query($kon, "INSERT INTO notelp (telp,ket,nama) VALUES ('$_POST[telp]','$_POST[ket]','$_POST[nama]')");
          if ($save) {
            echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=kontak/notelp';
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
            No Telp
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah No Telp</li>
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
                        <label for="des" class="col-sm-2 control-label">No Telp.</label>
                        <div class="col-sm-8">
                          <input name="telp" type="number" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-8">
                          <input name="ket" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-8">
                          <input name="nama" type="text" class="form-control">
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
      case "editnotelp":
        if (isset($_GET['idtelp'])) {
          $sql = mysqli_query($kon, "SELECT * FROM notelp where idtelp='$_GET[idtelp]'");
          $data = mysqli_fetch_assoc($sql);
        }
        if (isset($_POST['save'])) {

          $save = mysqli_query($kon, "UPDATE notelp set telp='$_POST[telp]',ket='$_POST[ket]',nama='$_POST[nama]' where idtelp='$_GET[idtelp]'");
          if ($save) {
            echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=kontak/notelp';
              </script>";
          } else {
            echo "<script>alert('Gagal');
              </script>";
          }
        }
      ?>
        <section class="content-header">
          <h1>
            No Telp
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit No Telp</li>
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
                        <label for="des" class="col-sm-2 control-label">No Telp</label>
                        <div class="col-sm-8">
                          <input name="idtelp" type="hidden" id="des" class="form-control" value="<?= $data['idtelp'] ?>">
                          <input name="telp" id="des" class="form-control" value="<?= $data['telp'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-8">

                          <input name="ket" id="des" class="form-control" value="<?= $data['ket'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-8">

                          <input name="nama" id="des" class="form-control" value="<?= $data['nama'] ?>">
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=kontak/notelp" class="btn btn-primary btn-flat">Kembali</a>
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
      case "hapusnotelp":

        if (isset($_GET['idtelp'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM notelp where idtelp='$_GET[idtelp]'"));

          $del = mysqli_query($kon, "DELETE FROM notelp where idtelp='$_GET[idtelp]'");
          if ($del) {
            echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=kontak/notelp';
    				  </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=kontak/notelp';
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