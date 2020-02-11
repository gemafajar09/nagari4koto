<?php
include '../koneksi.php';
?>
<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahkeuangan":

        if (isset($_POST['save1'])) {

          $lokasi_file = $_FILES['fupload']['tmp_name'];
          $nama_file = $_FILES['fupload']['name'];
          if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, "../../asset/files/" . $nama_file);
          }

          $save = mysqli_query($kon, "INSERT INTO tb_keuangan (keuangan) VALUES ('$nama_file')");
          if ($save) {
            echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=keauangan';
            </script>";
            exit;
          } else {
            echo "<script>alert('Gagal');Chmod images and tmp_file_upload now to be writable by the owner, if needed [Seems you already have this in place]. Mentioned in @Dmitry Teplyakov answer.
            </script>";
          }
        }
  ?>
        <section class="content-header">
          <h1>
            Keuangan
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Keuangan</li>
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
                        <label for="des" class="col-sm-2 control-label">File</label>
                        <div class="col-sm-8">
                          <input name="fupload" id="fupload" type="file" class="form-control">
                        </div>
                      </div>



                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save1" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=keuangan" class="btn btn-primary btn-flat">Kembali</a>
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
      case "editkeuangan":
        if (isset($_GET['id'])) {
          $sql = mysqli_query($kon, "SELECT * FROM tb_keuangan where id='$_GET[id]'");
          $data = mysqli_fetch_assoc($sql);
        }
        if (isset($_POST['save'])) {

          $lokasi_file = $_FILES['fupload']['tmp_name'];
          $nama_file = $_FILES['fupload']['name'];
          if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, "../../asset/file/" . $nama_file);
          } else {
            $nama_file = $_POST["fuploadlama"];
          }

          $save = mysqli_query($kon, "UPDATE tb_keuangan set keuangan='$nama_file' where id='$_GET[id]'");
          if ($save) {
            echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=keauangan';
              </script>";
          } else {
            echo "<script>alert('Gagal');
              </script>";
          }
        }
      ?>
        <section class="content-header">
          <h1>
            Keuangan
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit</li>
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

                      <input name="id" type="hidden" id="des" class="form-control" value="<?= $data['id'] ?>">


                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">file</label>
                        <div class="col-sm-8">
                          <input name="fupload" id="fupload" type="file" class="form-control">
                          <input name="fuploadlama" id="fupload" type="hidden" class="form-control" value="<?= $data['gambar'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=tambah_keuangan" class="btn btn-primary btn-flat">Kembali</a>
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
      case "hapuskeuangan":

        if (isset($_GET['id'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM tb_keuangan where id='$_GET[id]'"));

          $del = mysqli_query($kon, "DELETE FROM tb_keuangan where id='$_GET[id]'");
          if ($del) {
            echo "<script>
                  alert('Data Berhasil Dihapus');
                  window.location='index.php?module=keauangan';
                  </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=keauangan';
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